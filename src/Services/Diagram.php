<?php

namespace LaraCare\SchemaVisualizr\Services;

use LaraCare\SchemaVisualizr\Parsers\ModelParser;
use ReflectionClass;
use Illuminate\Support\Facades\File;

class Diagram
{
    protected $parser;

    public function __construct(ModelParser $parser)
    {
        $this->parser = $parser;
    }

    /**
     * Generate UML class diagram for models and migrations.
     */
    public function generate(): string
    {
        $classes = $this->parser->getModelClasses();
        $models = [];
        $relations = [];

        // Mermaid header
        $uml = <<<EOT
%%{
init: {
    'theme': 'base',
    'themeVariables': {
        'primaryColor': '#257abbff',
        'primaryTextColor': '#fff',
        'primaryBorderColor': '#ffdbdbff',
        'lineColor': '#fff6e4ff',
        'secondaryColor': '#006100',
        'tertiaryColor': '#fff'
    },
    'fontFamily': 'monospace'
}
}%%
classDiagram

EOT;

        /**
         * STEP 1: Extract from MODELS
         */
        foreach ($classes as $class) {
            $modelName = $class->getShortName();
            $modelFqn  = $class->getName();

            if (!is_subclass_of($modelFqn, \Illuminate\Database\Eloquent\Model::class)) {
                continue;
            }

            $model = new $modelFqn();
            $fillable = $model->getFillable();

            $models[$modelName] = [
                'attributes' => $fillable,
                'relations' => [],
            ];

            // Reflect relationships
            $reflection = new ReflectionClass($modelFqn);
            foreach ($reflection->getMethods() as $method) {
                if ($method->class !== $modelFqn) continue;

                if ($method->getNumberOfParameters() === 0) {
                    try {
                        $result = $method->invoke($model);
                        if ($result instanceof \Illuminate\Database\Eloquent\Relations\Relation) {
                            $relationType = class_basename(get_class($result));
                            $related = class_basename(get_class($result->getRelated()));

                            $relations[] = [
                                'from' => $modelName,
                                'to' => $related,
                                'type' => $relationType,
                            ];
                        }
                    } catch (\Throwable $e) {
                        // Skip uninvokable methods safely
                    }
                }
            }
        }

        /**
         * STEP 2: Extract from MIGRATIONS
         */
        $migrationFiles = File::allFiles(database_path('migrations'));
        foreach ($migrationFiles as $file) {
            $content = File::get($file->getPathname());

            // Match table name
            if (preg_match("/Schema::create\(['\"](\w+)['\"]/", $content, $matches)) {
                $tableName = $matches[1];
                $className = ucfirst(\Illuminate\Support\Str::singular($tableName));

                if (!isset($models[$className])) {
                    $models[$className] = ['attributes' => [], 'relations' => []];
                }

                // Extract column names
                preg_match_all("/->([a-zA-Z_]+)\(['\"](\w+)['\"]/", $content, $cols);
                if (!empty($cols[2])) {
                    foreach ($cols[2] as $col) {
                        if (!in_array($col, $models[$className]['attributes'])) {
                            $models[$className]['attributes'][] = $col;
                        }
                    }
                }

                // Detect foreign keys
                preg_match_all("/->foreignId\(['\"](\w+_id)['\"]\)->constrained\(['\"]?(\w+)?['\"]?\)?/", $content, $fks);
                if (!empty($fks[1])) {
                    foreach ($fks[1] as $i => $fkColumn) {
                        $relatedTable = $fks[2][$i] ?: \Illuminate\Support\Str::plural(str_replace('_id', '', $fkColumn));
                        $relatedClass = ucfirst(\Illuminate\Support\Str::singular($relatedTable));

                        $relations[] = [
                            'from' => $className,
                            'to' => $relatedClass,
                            'type' => 'BelongsTo',
                        ];
                    }
                }
            }
        }

        /**
         * STEP 3: Generate CLASS BLOCKS
         */
        foreach ($models as $model => $data) {
            $uml .= "class {$model} {\n";
            $attrs = $data['attributes'] ?? [];

            if (!empty($attrs)) {
                foreach ($attrs as $attr) {
                    $uml .= "    +{$attr}: string\n";
                }
            } else {
                $uml .= "    +[no attributes]\n";
            }

            $uml .= "}\n\n";
        }

        /**
         * STEP 4: Generate RELATIONSHIPS
         */
        foreach ($relations as $relation) {
            $arrow = match ($relation['type']) {
                'HasOne', 'HasMany' => "{$relation['from']} --> {$relation['to']} : {$relation['type']}",
                'BelongsTo' => "{$relation['from']} --> {$relation['to']} : {$relation['type']}",
                'BelongsToMany' => "{$relation['from']} -- {$relation['to']} : {$relation['type']}",
                default => "{$relation['from']} ..> {$relation['to']} : {$relation['type']}",
            };
            $uml .= $arrow . "\n";
        }

        return $uml;
    }
}
