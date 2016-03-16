<?php

Route::get('about','pageStructureController@navbarTop');

Route::get('signIn','pageStructureController@signIn');

Route::get('signUp','pageStructureController@signUp');

Route::get('mapListing','pageStructureController@mapListing');

Route::get('profile/{userId}','lisController@mainProfileActiveListings');

Route::get('profileFavourites/{userId}', 'lisController@getFavouriteListings');

Route::get('profileSettings/{userId}', 'userController@profileSettingPagePopulation');

Route::get('profilePostings/{userId}', 'lisController@getProfileListings');

Route::get('addListing', 'pageStructureController@addListing');

Route::get('houseTemplate/{listingId}', 'lisController@singleListingInfo');

Route::get('profileSearches', 'pageStructureController@profileSearches');

Route::get('listingsList/{order}', 'lisController@allListings');

Route::get('passwordRetrieval', 'pageStructureController@passwordRetrieval');

Route::get('profileMessages', 'pageStructureController@profileMessages');

Route::get('/','pageStructureController@mapListing');

?>