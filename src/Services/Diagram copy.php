<?php

namespace LaraCare\SchemaVisualizr\Services;

use LaraCare\SchemaVisualizr\Parsers\ModelParser;
use ReflectionClass;

class Diagram
{
    protected $parser;

    public function __construct(ModelParser $parser)
    {
        $this->parser = $parser;
    }

    /**
     * Generate UML class diagram for models with attributes and relationships.
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
        'lineColor': '#835700ff',
        'secondaryColor': '#006100',
        'tertiaryColor': '#fff'
    },
    'fontFamily': 'monospace'
}
}%%
classDiagram

EOT;

        // Step 1: Extract attributes and relationships
        foreach ($classes as $class) {
            $modelName = $class->getShortName();
            $modelFqn  = $class->getName();

            // Skip if not Eloquent model
            if (!is_subclass_of($modelFqn, \Illuminate\Database\Eloquent\Model::class)) {
                continue;
            }

            $model = new $modelFqn();
            $fillable = $model->getFillable();

            // Store attributes
            $models[$modelName] = $fillable;

            // Use reflection to detect relationships
            $reflection = new ReflectionClass($modelFqn);
            foreach ($reflection->getMethods() as $method) {
                if ($method->class !== $modelFqn) {
                    continue;
                }

                if ($method->getNumberOfParameters() === 0) {
                    try {
                        $result = $method->invoke($model);
                        if ($result instanceof \Illuminate\Database\Eloquent\Relations\Relation) {
                            $relationType = class_basename(get_class($result)); // HasOne, BelongsTo...
                            $related = class_basename(get_class($result->getRelated()));

                            $relations[] = [
                                'from' => $modelName,
                                'to' => $related,
                                'type' => $relationType,
                            ];
                        }
                    } catch (\Throwable $e) {
                        // Skip methods that cannot be invoked safely
                    }
                }
            }
        }

        // Step 2: Generate class blocks
        foreach ($models as $model => $attributes) {
            $uml .= "class {$model} {\n";
            if (!empty($attributes)) {
                foreach ($attributes as $attr) {
                    $uml .= "    +{$attr}: string\n";
                }
            } else {
                $uml .= "    +[no fillable attributes]\n";
            }
            $uml .= "}\n\n";
        }

        // Step 3: Generate relationships
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
