<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::any(
    '/zipcode',
    'ZipcodeController@test'
);

// Route::get('/zipcode', function() {

//     echo
//         Form::open(array('url' => 'zipcode')) .
//         Form::text('zipcode', Input::get('zipcode')) .
//         Form::submit('go!') .
//         Form::close();

//     if (Input::get('zipcode'))
//     {
//         ZipCode::setCountry('US');
//         ZipCode::setQueryParameter('geonames_username', 'demo');
//         $client = ZipCode::find(Input::get('zipcode'))->toArray();
//         $lat = $client['addresses'][0]['latitude'];
//         $lon = $client['addresses'][0]['longitude'];
//         echo '<pre>';
//         var_dump($lat, $lon);
//         echo '</pre>';
//     }

// });
