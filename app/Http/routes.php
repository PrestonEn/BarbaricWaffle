<?php

Route::get('about','pageStructureController@navbarTop');

Route::get('signIn','pageStructureController@signIn');

Route::get('signUp','pageStructureController@signUp');

Route::get('mapListing','pageStructureController@mapListing');

Route::get('profile','pageStructureController@profile');

Route::get('/','pageStructureController@portalPage');

?>