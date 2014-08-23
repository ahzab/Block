<?php

Route::group(array('prefix' => Localization::setLocale()), function ()
{
    Route::resource('admin/block/block', '\Lavalite\Block\Controllers\BlockAdminController');

    Route::get('block', 'Lavalite\Block\Controllers\PublicController@list');
    Route::get('block/{slug?}', 'Lavalite\Block\Controllers\PublicController@show');
});
