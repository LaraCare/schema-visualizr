<?php

namespace LaraCare\SchemaVisualizr\Commands;

use Illuminate\Console\Command;
use LaraCare\SchemaVisualizr\Services\Diagram;

class VisualizrCommand extends Command
{
    protected $signature = 'visualizr:generate';
    protected $description = 'Generate UML Class Diagram from Laravel Models';

    public function handle()
    {
        $this->info("Parsing models...");

        $diagram = app(Diagram::class);
        $result = $diagram->generate();

        file_put_contents(base_path('uml-class-diagram.puml'), $result);
        $this->info("UML Class Diagram generated as uml-class-diagram.puml");
    }
}
