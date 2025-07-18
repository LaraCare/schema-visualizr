<?php 

use Illuminate\Support\Facades\Route;
use LaraCare\SchemaVisualizr\Services\Diagram;

Route::get('/class-diagram', function () {
    $diagram = app(Diagram::class);
    $uml = $diagram->generate();

    return view('schema-visualizr::diagram', ['uml' => $uml]);
});
Route::get('/sv', function () {
    return view('schema-visualizr::layouts.app');
});
