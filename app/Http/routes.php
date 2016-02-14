<?php

Route::get('about','pageStructureController@navbarTop');

Route::get('signIn','pageStructureController@signIn');

Route::get('signUp','pageStructureController@signUp');

Route::get('mapListing','pageStructureController@mapListing');

Route::get('profile','pageStructureController@profile');

Route::get('profileFavourites', 'pageStructureController@profileFavourites');

Route::get('profileEdit', 'pageStructureController@profileEdit');

Route::get('/','pageStructureController@portalPage');

?>