<?php

Route::group(['namespace'=>'shurjopay\ShurjopayLaravelPackage\Http\Controllers'],function(){
	Route::get('shurjopay','ShurjopayController@index')->name('shurjopay');
    Route::get('shurjopay_multivendor','ShurjopayController@multi_list')->name('shurjopay_multi_list');
    Route::get('shurjopay_multivendor_setup','ShurjopayController@multi_setup')->name('shurjopay_multi');
    Route::post('shurjopay','ShurjopayController@send');
    Route::post('shurjopay_multi','ShurjopayController@send_multi')->name('shurjopay_multi_save');
 Route::get("token",'ShurjopayController@getToken')->name("token");
    //mowmita
    Route::get("response",'ShurjopayController@return')->name("response");
});


