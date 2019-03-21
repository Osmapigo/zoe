<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;
use PragmaRX\ZipCode\ZipCode;

class ZipcodeController extends Controller
{
    private $a = 1;

    public function home()
    {
        $this->setClientMissingCoordinates();
        return view('home', ['agents' => []]);
    }

    public function compareDistances()
    {
        $agentsData = $this->getAgentClients(request('agent1'), request('zipcode1'), request('agent2'), request('zipcode2'));
        return view('clientList', $agentsData);
    }

    public function getAgentClients($agentOneName, $agentOneZip, $agentTwoName, $agentTwoZip)
    {
        $mixedClients = [];
        $agentOne = [
            'name' => $agentOneName,
            'coordinates' => $this->getCoordinatesByZipCode($agentOneZip),
        ];
        $agentTwo = [
            'name' => $agentTwoName,
            'coordinates' => $this->getCoordinatesByZipCode($agentTwoZip),
        ];

        $clients = Client::where('latitude', '!=', null)->get();
        foreach ($clients as $key => $client) {
            $distanceAgentOne = $this->getDistanceBetweenCoordinates($agentOne['coordinates'], $client->toArray());
            $distanceAgentTwo = $this->getDistanceBetweenCoordinates($agentTwo['coordinates'], $client->toArray());
            if ((float)$distanceAgentOne < (float)$distanceAgentTwo) {
                $agentName = $agentOne['name'];
            } else {
                $agentName = $agentTwo['name'];
            }
            $mixedClients[] = [
                'agentName' => $agentName,
                'clientName' => $client->name,
                'clientZip' => $client->zip_code
            ];
        }

        return ['clients' => $mixedClients];
    }

    public function getCoordinatesByZipCode($zipCode)
    {
        $coordinates = ['longitude' => null, 'latitude' => null];
        $zipcode = new ZipCode();
        $zipcode->setCountry('US');
        $zipcode->setQueryParameter('geonames_username', 'demo');
        $data = $zipcode->find($zipCode);
        if (!empty($data['addresses'])) {
            $address = $data['addresses'][0];
            $coordinates = ['longitude' => $address['longitude'], 'latitude' => $address['latitude']];
        }

        return $coordinates;
    }

    private function setClientMissingCoordinates()
    {
        $clients = Client::whereLatitude(null)->get();
        foreach ($clients as $key => $client) {
            $coordinates = $this->getCoordinatesByZipCode($client->zip_code);
            $client->longitude = $coordinates['longitude'];
            $client->latitude = $coordinates['latitude'];
            $client->save();
        }
    }

    public function getDistanceBetweenCoordinates($agent, $client)
    {
        $earthRadius = 6371;
        $dLat = $this->degToRad($client['latitude'] - $agent['latitude']);
        $dLon = $this->degToRad($client['longitude'] - $agent['longitude']);
        $a = 
            sin($dLat/2) * sin($dLat/2) +
            cos($this->degToRad($agent['latitude'])) * cos($this->degToRad($client['latitude'])) * 
            sin($dLon/2) * sin($dLon/2);
        return $earthRadius * 2 * atan2(sqrt($a), sqrt(1-$a));
    }

    private function degToRad($deg)
    {
        return $deg * pi() / 180;
    }
}
