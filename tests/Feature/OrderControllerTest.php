<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OrderControllerTest extends TestCase
{

    public function testGetOrders() {
        $response = $this->get('/orders');
        $response->assertStatus(200);
    }
}
