<?php

Route::get('about','pageStructureController@navbarTop');

Route::get('signIn','pageStructureController@signIn');

Route::get('signUp','pageStructureController@signUp');

Route::get('passwordRetrieval', 'pageStructureController@passwordRetrieval');

Route::get('profileMessages', 'pageStructureController@profileMessages');

Route::get('/','lisController@mapListings');

Route::get('addListing', 'pageStructureController@addListing');

Route::get('profileSearches', 'pageStructureController@profileSearches');

Route::get('addSearches', 'pageStructureController@searches');



Route::get('mapListing','lisController@mapListings');

Route::get('profile/{userId}','lisController@mainProfileActiveListings');

Route::get('profileView/{userId}','lisController@viewForeignProfile');

Route::get('profileFavourites/{userId}', 'lisController@getFavouriteListings');

Route::get('profileSettings/{userId}', 'userController@profileSettingPagePopulation');

Route::get('profilePostings/{userId}', 'lisController@getProfileListings');

Route::get('houseTemplate/{listingId}', 'lisController@singleListingInfo');

Route::get('listingsList/{order}', 'lisController@allListings');


Route::get('handleRemoval', 'postingModification@makeInactive');


Route::post('/register', 'userController@add');

?>