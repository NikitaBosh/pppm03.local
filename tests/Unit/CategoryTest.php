<?php

namespace Tests\Unit;

use Tests\TestCase;
use Tests\Browser\Helpers\AuthHelper;

class CategoryTest extends TestCase
{
    public function test_open_application()
    {
        $response = $this->actingAs(AuthHelper::getUserWithRole('admin'))
            ->get('/admin/categories');

        $response->assertStatus(200);
    }
}
