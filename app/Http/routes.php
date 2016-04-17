<?php


Route::group(['middleware' => ['web']], function () {

    Route::get('about','pageStructureController@navbarTop');

    Route::get('signIn','pageStructureController@signIn');

    Route::get('signUp','pageStructureController@signUp');

    Route::get('passwordRetrieval', 'pageStructureController@passwordRetrieval');

    //Route::get('profileMessages', 'pageStructureController@profileMessages');

    Route::get('/','lisController@mapListings');

    Route::get('addListing', 'pageStructureController@addListing');

    Route::get('profileSearches', 'pageStructureController@profileSearches');

    Route::get('profileSearches/{searchId}', 'lisController@getSearchListings');

    Route::get('addSearches', 'pageStructureController@searches');

    Route::get('mapListing','lisController@mapListings');

    Route::get('profile','lisController@mainProfileActiveListings');

    Route::get('profileView/{userId}','lisController@viewForeignProfile');

    Route::get('profileFavourites', 'lisController@getFavouriteListings');

    Route::get('profileFavourites/{listingId}', 'lisController@addToFavourites');
    //Route::get('profileFavourites/{userId}', 'lisController@getFavouriteListings');

    Route::post('profileFavourites', 'lisController@removeFromFavourites');

    Route::post('profilePostings', 'lisController@removeFromListings');

    Route::post('profileSearches', 'lisController@removeSearches');

    Route::get('profileSettings', 'userController@profileSettingPagePopulation');

    Route::post('profileSettings/resetPassword', 'userController@updatePassword');

    Route::post('profileSettings/resetName', 'userController@updateName');

    Route::post('profileSettings/resetPhoneNumber', 'userController@updatePhoneNumber');

    Route::get('profilePostings', 'lisController@getProfileListings');

    Route::get('profileProperties', 'lisController@getProfileProperties');

    Route::post('profileProperties', 'lisController@removeProperties');

    Route::get('ListingByProperty/{locationId}', 'lisController@getPropertyListings');

    Route::get('listingsList/{order}', 'lisController@allListings');

    Route::get('houseTemplate/{listingId}', 'lisController@singleListingInfo');

    Route::get('handleRemoval', 'postingModification@makeInactive');

    Route::post('signUp', 'userController@add');

    Route::post('signIn', 'Auth\AuthController@authenticate');
    
    Route::get('addProperty', 'pageStructureController@addProperty');

    Route::get('getProperyPageFromHouseId/{ListingId}', 'lisController@getProperyFromListing');



    // Add listing POST request
    Route::post('addProperty', 'propertyController@add');
    Route::post('addListing', 'ListingController@addListing');


    Route::post('/updateSidebar', 'ListingController@updateSidebar');
    
    
    Route::post('/searchFilter', 'ListingController@searchFilters');

    Route::post('/saveFilter', 'ListingController@saveFilter');
    Route::post('/getSavedSearch', 'ListingController@getFilter');
    Route::post('/getCitiesFromCountry', 'ListingController@getCitiesFromCountry');
    Route::get('/logout', function()
    {
        Auth::logout();
        Session::flush();
        return Redirect::to('/');
    });

    Route::post('profileSettings/updateImage', 'userController@updateImage');



});
?>