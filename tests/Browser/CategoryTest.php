<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Browser\Helpers\AuthHelper;

class CategoryTest extends DuskTestCase
{ 
    /**
     * Тест открытия приложения.
     *
     * @return void
     */
    public function testCategoryViewAny()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(AuthHelper::getUserWithRole('admin'))
                    ->visit('/admin/categories')
                    ->assertTitle('Медиатека')
                    ->assertSee('Список категорий')
                    ->assertSee('Название')
                    ->assertSee('Действия')
                    ->assertSee('Просмотр')
                    ->assertSee('Редактировать')
                    ->assertSee('Удалить')
                    ->assertSee('Добавить категорию');
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
                    ->visit('/admin/categories/create')
                    ->assertTitle('Медиатека')
                    ->assertSee('Добавить категорию')
                    ->assertSee('Название категории')
                    ->assertSee('Сохранить')
                    ->assertSee('Отмена')
                    ->assertEnabled('name');
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
                    ->visit('/admin/categories/1')
                    ->assertTitle('Медиатека')
                    ->assertSee('Категория')
                    ->assertSee('Дата категории')
                    ->assertSee('Дата редактирования категории')
                    ->assertSee('Редактировать')
                    ->assertSee('Отмена');
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
                    ->visit('/admin/categories/1/edit')
                    ->assertTitle('Медиатека')
                    ->assertSee('Редактировать категорию')
                    ->assertSee('Название категории')
                    ->assertSee('Сохранить')
                    ->assertSee('Отмена')
                    ->assertEnabled('name');
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
                    ->visit('/admin/categories')
                    ->assertTitle('Медиатека')
                    ->assertSee('Список категорий')
                    ->assertSee('Название')
                    ->assertSee('Действия')
                    ->assertSee('Просмотр')
                    ->assertSee('Редактировать')
                    ->assertSee('Удалить')
                    ->assertSee('Добавить категорию');
        });
    }
}
