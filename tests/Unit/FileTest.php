<?php

namespace Tests\Unit;

use Tests\Browser\Helpers\AuthHelper;
use Tests\TestCase;

class FileTest extends TestCase
{
   public function test_open_application()
    {
        $response = $this->actingAs(AuthHelper::getUserWithRole('admin'))
            ->get('/files');

        $response->assertStatus(200);
    }
}
