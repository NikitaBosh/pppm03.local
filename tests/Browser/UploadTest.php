<?php

namespace Tests\Browser;

use Tests\Browser\Helpers\AuthHelper;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class UploadTest extends DuskTestCase
{
    /**
     * Тест открытия приложения.
     *
     * @return void
     */
    public function testUserViewAny()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(AuthHelper::getUserWithRole('admin'))
                    ->visit('/upload')
                    ->assertTitle('Медиатека')
                    ->assertSee('Скачать')
                    ->assertSee('Просмотреть')
                    ->assertSee('Удалить');
        });
    }

    public function testShow()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(AuthHelper::getUserWithRole('admin'))
                    ->visit('/upload/show/1640345075_День%20дорожной%20безопасности.docx')
                    ->assertTitle('Медиатека')
                    ->assertSee('Детали')
                    ->assertSee('Название и формат')
                    ->assertSee('Размер (МБ)')
                    ->assertSee('Последняя модификация')
                    ->assertSee('Удалить')
                    ->assertSee('Скачать');
        });
    }

    public function testDelete()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(AuthHelper::getUserWithRole('admin'))
                    ->visit('/upload')
                    ->assertTitle('Медиатека')
                    ->assertSee('Скачать')
                    ->assertSee('Просмотреть')
                    ->assertSee('Удалить')
                    ->assertDontSee('Токарев');
        });
    }
}
