<?php

Route::get('about','pageStructureController@navbarTop');

Route::get('signIn','pageStructureController@signIn');

Route::get('signUp','pageStructureController@signUp');

Route::get('mapListing','pageStructureController@mapListing');

Route::get('profile/{userId}','lisController@mainProfileActiveListings');

Route::get('profileFavourites', 'pageStructureController@profileFavourites');

Route::get('profileSettings', 'pageStructureController@profileSettings');

Route::get('profilePostings/{userId}', 'lisController@getProfileListings');

Route::get('addListing', 'pageStructureController@addListing');

Route::get('houseTemplate', 'pageStructureController@houseTemplate');

Route::get('profileSearches', 'pageStructureController@profileSearches');

Route::get('listingsList', 'lisController@allListings');

Route::get('passwordRetrieval', 'pageStructureController@passwordRetrieval');

Route::get('profileMessages', 'pageStructureController@profileMessages');

Route::get('/','pageStructureController@mapListing');

Route::post('/register', array('uses'=>'ListingController@add'));

?>