<?php 

use Illuminate\Support\Facades\Route;
use LaraCare\SchemaVisualizr\Services\Diagram;

Route::get('/class-diagram', function () {
    $diagram = app(Diagram::class);
    $uml = $diagram->generate();

    return view('schema-visualizr::diagram', ['uml' => $uml]);
});
