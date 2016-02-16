<?php

Route::get('about','pageStructureController@navbarTop');

Route::get('signIn','pageStructureController@signIn');

Route::get('signUp','pageStructureController@signUp');

Route::get('mapListing','pageStructureController@mapListing');

Route::get('profile','pageStructureController@profile');

Route::get('profileFavourites', 'pageStructureController@profileFavourites');

Route::get('profileSettings', 'pageStructureController@profileSettings');

Route::get('profilePostings', 'pageStructureController@profilePostings');

Route::get('/','pageStructureController@portalPage');

?>