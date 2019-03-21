<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Http\Controllers\ZipcodeController;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ZipcodeTest extends TestCase
{
    /** @test */
    public function calculateDistanceBetweenCoordinates()
    {
        $agent = [
            'latitude' => '33.65876',
            'longitude' => '-112.3214'
        ];
        $client = [
            'latitude' => '32.473',
            'longitude' => '-84.9795'
        ];
        $expectedResult = (float)2543.90;
        $zipController = new ZipcodeController();
        $distance = $zipController->getDistanceBetweenCoordinates($agent, $client);
        $this->assertEquals($expectedResult, round($distance, 2));
    }

    /** @test */
    public function getCoordinatesByZipCode()
    {
        $zipCode = '90210';
        $zipController = new ZipcodeController();
        $coordinates = $zipController->getCoordinatesByZipCode($zipCode);
        $this->assertEquals('-118.4065', $coordinates['longitude']);
        $this->assertEquals('34.0901', $coordinates['latitude']);
    }

    /** @test */
    public function getAgentClients()
    {
        $zipController = new ZipcodeController();
        $agents = $zipController->getAgentClients('Oscar', '10021', 'Manuel', '85373');
        $this->assertEquals('Manuel', $agents['clients'][0]['agentName']);
        $this->assertEquals('Michael', $agents['clients'][0]['clientName']);
        $this->assertEquals('Oscar', $agents['clients'][13]['agentName']);
        $this->assertEquals('Douglas', $agents['clients'][13]['clientName']);
    }
}
