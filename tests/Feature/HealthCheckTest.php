<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HealthCheckTest extends TestCase
{
    /**
     * Health checker test.
     *
     * @return void
     */
    public function testHealth()
    {
        $response = $this->get('/health');
        $response->assertStatus(200);
    }

}
