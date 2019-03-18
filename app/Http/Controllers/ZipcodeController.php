<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

class ZipcodeController extends BaseController
{
    public function test() {
            echo
        Form::open(array('url' => 'zipcode')) .
        Form::text('zipcode', Input::get('zipcode')) .
        Form::submit('go!') .
        Form::close();

    if (Input::get('zipcode'))
    {
        ZipCode::setCountry('US');
        ZipCode::setQueryParameter('geonames_username', 'demo');
        $client = ZipCode::find(Input::get('zipcode'))->toArray();
        $lat = $client['addresses'][0]['latitude'];
        $lon = $client['addresses'][0]['longitude'];
        echo '<pre>';
        var_dump($lat, $lon);
        echo '</pre>';
    }
    }
}
