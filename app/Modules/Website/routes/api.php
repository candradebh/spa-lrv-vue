<?php

Route::group(array('module' => 'Website', 'middleware' => ['api'], 'namespace' => 'App\Modules\Website\Controllers'), function() {

    Route::resource('Website', 'WebsiteController');
    
});	
