<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\client;
use PragmaRX\ZipCode\ZipCode;

class ZipcodeController extends Controller
{

    public function home() {
        $this->setClientMissingCoordinates();
        return view('home');
    }

    public function compareDistances()
    {
        $agentOne = [
            'name' => request('agent1'),
            'coordinates' => $this->getCoordinatesByZipCode(request('zipcode1')),
            'clients' => []
        ];
        $agentTwo = [
            'name' => request('agent2'),
            'coordinates' => $this->getCoordinatesByZipCode(request('zipcode2')),
            'clients' => []
        ];
        $clients = client::where('latitude', '!=', null)->get();
        foreach ($clients as $key => $client) {
            $distanceAgentOne = $this->getDistanceBetweenCoordinates($agentOne['coordinates'], $client);
            $distanceAgentTwo = $this->getDistanceBetweenCoordinates($agentTwo['coordinates'], $client);
            if ((float)$distanceAgentOne < (float)$distanceAgentTwo) {
                $agentOne['clients'][] = $client;
            } else {
                $agentTwo['clients'][] = $client;
            }
        }
        return view('clientList', ['agentOne' => $agentOne, 'agentTwo' => $agentTwo]);
    }


    private function getCoordinatesByZipCode($zipCode)
    {
        $zipcode = new ZipCode();
        $zipcode->setCountry('US');
        $zipcode->setQueryParameter('geonames_username', 'demo');
        $data = $zipcode->find($zipCode);
        if (!empty($data['addresses'])) {
            return ['longitude' => $data['addresses'][0]['longitude'], 'latitude' => $data['addresses'][0]['latitude']];
        }
    }

    private function setClientMissingCoordinates()
    {
        $clients = client::whereLatitude(null)->get();
        foreach ($clients as $key => $client) {
            $coordinates = $this->getCoordinatesByZipCode($client->zip_code);
            $client->longitude = $coordinates['longitude'];
            $client->latitude = $coordinates['latitude'];
            $client->save();
        }
    }

    private function getDistanceBetweenCoordinates($agent, $client)
    {
        $earthRadius = 6371;
        $dLat = $this->degToRad($client->latitude - $agent['latitude']);
        $dLon = $this->degToRad($client->longitude - $agent['longitude']);
        $a = 
            sin($dLat/2) * sin($dLat/2) +
            cos($this->degToRad($agent['latitude'])) * cos($this->degToRad($client->latitude)) * 
            sin($dLon/2) * sin($dLon/2);
        return $earthRadius * 2 * atan2(sqrt($a), sqrt(1-$a));
    }

    private function degToRad($deg)
    {
        return $deg * pi() / 180;
    }
}