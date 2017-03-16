<?php

Route::group(array(
                'module' => 'Website',
                'middleware' => ['web'],
                'namespace' => 'App\Modules\Website\Controllers'
                ), function() {



    Route::prefix('website')->group(function (){
        Route::resource('/', 'WebsiteController');
        Route::resource('services','ServicesController');
        Route::resource('products','ProductsController');
        Route::resource('contacts','ContactsController');
    });
    
});	
