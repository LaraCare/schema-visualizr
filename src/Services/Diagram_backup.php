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

    public function generate0(): string
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

    public function generate(): string
    {
        $classes = $this->parser->getModelClasses();

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

        foreach ($classes as $class) {
            $uml .= "class {$class->getShortName()} {\n";
            foreach ($class->getProperties() as $property) {
                $uml .= "    +{$property->getName()}\n";
            }
            $uml .= "}\n\n";
        }

        // If you want to add relationships dynamically, you could parse them here
        // Example (static relationships for now):
        // $uml .= "ClassA -- ClassB : has\n";

        return $uml;
    }
}
