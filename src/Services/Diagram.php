<?php 

namespace LaraCare\SchemaVisualizr\Services;

use LaraCare\SchemaVisualizr\Parsers\ModelParser;

class Diagram
{
    protected $parser;

    public function __construct(ModelParser $parser)
    {
        $this->parser = $parser;
    }

    public function generate(): string
    {
        $classes = $this->parser->getModelClasses();
        $uml = "@startuml\n";

        foreach ($classes as $class) {
            $uml .= "class {$class->getShortName()} {\n";
            foreach ($class->getProperties() as $property) {
                $uml .= "  + {$property->getName()}\n";
            }
            $uml .= "}\n";
        }

        $uml .= "@enduml";
        return $uml;
    }
}
