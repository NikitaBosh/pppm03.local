<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Browser\Helpers\AuthHelper;

class FileTest extends DuskTestCase
{
    /**
     * Тест открытия приложения.
     *
     * @return void
     */
    public function testFileViewAny()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(AuthHelper::getUserWithRole('admin'))
                    ->visit('/files')
                    ->assertTitle('Медиатека')
                    ->assertSee('Пользователи')
                    ->assertSee('Добавить новый файл')
                    ->assertSee('Скачать')
                    ->assertSee('Просмотр')
                    ->assertSee('Редактировать')
                    ->assertSee('Удалить');
        });
    }

    /**
     * Тест добавления.
     *
     * @return void
     */
    public function testCreate()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(AuthHelper::getUserWithRole('admin'))
                    ->visit('/files/create')
                    ->assertTitle('Медиатека')
                    ->assertSee('Тип')
                    ->assertSee('Автор')
                    ->assertSee('Категория')
                    ->assertSee('Открытый доступ')
                    ->assertSee('Сохранить')
                    ->assertEnabled('file')
                    ->assertEnabled('type')
                    ->assertEnabled('author')
                    ->assertEnabled('category_id')
                    ->assertEnabled('isPublic');
        });
    }

    /**
     * Тест просмотра.
     *
     * @return void
     */
    public function testShow()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(AuthHelper::getUserWithRole('admin'))
                    ->visit('/files/1')
                    ->assertTitle('Медиатека')
                    ->assertSee('Детали')
                    ->assertSee('Название и формат')
                    ->assertSee('Тип')
                    ->assertSee('Автор')
                    ->assertSee('Категория')
                    ->assertSee('Размер')
                    ->assertSee('Последняя модификация')
                    ->assertSee('Удалить')
                    ->assertSee('Скачать');
        });
    }

    /**
     * Тест редактирования.
     *
     * @return void
     */
    public function testEdit()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(AuthHelper::getUserWithRole('admin'))
                    ->visit('/files/1/edit')
                    ->assertTitle('Медиатека')
                    ->assertSee('Тип')
                    ->assertSee('Автор')
                    ->assertSee('Категория')
                    ->assertSee('Открытый доступ')
                    ->assertSee('Сохранить')
                    ->assertEnabled('file')
                    ->assertEnabled('type')
                    ->assertEnabled('author')
                    ->assertEnabled('category_id')
                    ->assertEnabled('isPublic');
        });
    }

    /**
     * Тест удаления.
     *
     * @return void
     */
    public function testDelete()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(AuthHelper::getUserWithRole('admin'))
                    ->visit('/files')
                    ->assertTitle('Медиатека')
                    ->assertSee('Пользователи')
                    ->assertSee('Добавить новый файл')
                    ->assertSee('Скачать')
                    ->assertSee('Просмотр')
                    ->assertSee('Редактировать')
                    ->assertSee('Удалить');
        });
    }

    public function testDownload()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(AuthHelper::getUserWithRole('admin'))
                    ->visit('/files')
                    ->assertTitle('Медиатека')
                    ->assertSee('Пользователи')
                    ->assertSee('Добавить новый файл')
                    ->assertSee('Скачать')
                    ->assertSee('Просмотр')
                    ->assertSee('Редактировать')
                    ->assertSee('Удалить');
        });
    }
}
