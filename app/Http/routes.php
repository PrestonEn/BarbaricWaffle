<?php

Route::group(['middleware' => ['web']], function () {

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

    Route::post('profileSettings/{userId}/resetPassword', 'userController@updatePassword');

    Route::post('profileSettings/{userId}/resetName', 'userController@updateName');

    Route::post('profileSettings/{userId}/resetPhoneNumber', 'userController@updatePhoneNumber');

    Route::get('profilePostings/{userId}', 'lisController@getProfileListings');

    Route::get('profileProperties/{userId}', 'lisController@getProfileProperties');

    Route::get('ListingByProperty/{locationId}', 'lisController@getPropertyListings');

    Route::get('houseTemplate/{listingId}', 'lisController@singleListingInfo');

    Route::get('listingsList/{order}', 'lisController@allListings');


    Route::get('handleRemoval', 'postingModification@makeInactive');

    Route::post('signUp', 'userController@add');

    Route::post('signIn', 'Auth\AuthController@authenticate');
    
    // Add listing POST request
    Route::post('/addListing', 'ListingController@addListing');

    Route::post('/updateSidebar', 'ListingController@updateSidebar');

    Route::get('/logout', function()
    {
        Auth::logout();
        Session::flush();
        return Redirect::to('/');
    });
});
?>