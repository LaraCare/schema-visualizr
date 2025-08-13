<?php 

use Illuminate\Support\Facades\Route;
use LaraCare\SchemaVisualizr\Services\Diagram;

Route::get('/class-diagram', function () {
    $diagram = app(Diagram::class);
    $uml = $diagram->generate();

    return view('schema-visualizr::diagram', ['uml' => $uml]);
});
    
Route::prefix('svr')->group(function () {

    // Main app view
    Route::get('/', fn () => view('schema-visualizr::layouts.app'));

    // Diagrams routes
    Route::prefix('diagrams')->group(function () {

        // Diagrams index
        Route::get('/', fn () => view('schema-visualizr::diagram.index'))
            ->name('diagrams.index');

        // Class diagram
        Route::get('/class', function () {
            $diagram = app(Diagram::class);
            $uml = $diagram->generate();
            return view('schema-visualizr::diagram.class', compact('uml'));
        })->name('diagrams.class');
    });

    // Contact page
    Route::get('/contact', fn () => view('schema-visualizr::contact'))
        ->name('svr.contact');
});
