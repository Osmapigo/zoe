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
        $this->assertArrayHasKey('agentOne', $agents);
        $this->assertArrayHasKey('agentTwo', $agents);
        $this->assertEquals('Douglas', $agents['agentOne']['clients'][0]['name']);
        $this->assertEquals('Kimberly', $agents['agentOne']['clients'][8]['name']);
        $this->assertEquals('Michael', $agents['agentTwo']['clients'][0]['name']);
        $this->assertEquals('Mary Sue', $agents['agentTwo']['clients'][17]['name']);
        // dd(json_encode($agents));
    }
}
