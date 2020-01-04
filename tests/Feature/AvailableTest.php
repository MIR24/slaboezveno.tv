<?php

namespace Tests\Feature;

use Tests\TestCase;

class AvailableTest extends TestCase
{
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
