<?php 

namespace LaraCare\SchemaVisualizr\Parsers;

use Illuminate\Support\Facades\File;
use ReflectionClass;

class ModelParser
{
    public function getModelClasses(): array
    {
        $models = [];

        $modelPath = app_path('Models');
        $files = File::allFiles($modelPath);

        foreach ($files as $file) {
            $class = $this->getFullClassName($file->getRealPath());
            if (class_exists($class)) {
                $models[] = new ReflectionClass($class);
            }
        }

        return $models;
    }

    protected function getFullClassName($filePath): string
    {
        $content = file_get_contents($filePath);
        preg_match('/namespace\s+(.+?);/', $content, $matches);
        $namespace = $matches[1];
        $className = basename($filePath, '.php');
        return "$namespace\\$className";
    }
}
