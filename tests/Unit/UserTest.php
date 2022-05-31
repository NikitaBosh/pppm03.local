<?php

namespace Tests\Unit;

use Tests\Browser\Helpers\AuthHelper;
use Tests\TestCase;

class UserTest extends TestCase
{
   public function test_open_application()
    {
        $response = $this->actingAs(AuthHelper::getUserWithRole('admin'))
            ->get('/admin/users');

        $response->assertStatus(200);
    }
}
