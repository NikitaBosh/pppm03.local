<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Browser\Helpers\AuthHelper;

class UserTest extends DuskTestCase
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
                    ->visit('/admin/users')
                    ->assertTitle('Медиатека')
                    ->assertSee('Пользователи')
                    ->assertSee('Добавить пользователя')
                    ->assertSee('Просмотр')
                    ->assertSee('Редактирование')
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
                    ->visit('/admin/users/create')
                    ->assertTitle('Медиатека')
                    ->assertSee('Добавление пользователя')
                    ->assertSee('ФИО')
                    ->assertSee('E-mail')
                    ->assertSee('Пароль')
                    ->assertSee('Роль')
                    ->assertSee('Сохранить')
                    ->assertEnabled('name')
                    ->assertEnabled('email')
                    ->assertEnabled('password')
                    ->assertEnabled('role');
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
                    ->visit('/admin/users/1')
                    ->assertTitle('Медиатека')
                    ->assertSee('Детали')
                    ->assertSee('ФИО')
                    ->assertSee('E-mail')
                    ->assertSee('Роль')
                    ->assertSee('Дата создания')
                    ->assertSee('Обновлено по адресу')
                    ->assertSee('Удалить')
                    ->assertSee('Редактировать');
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
                    ->visit('/admin/users/1/edit')
                    ->assertTitle('Медиатека')
                    ->assertSee('Редактировать')
                    ->assertSee('ФИО')
                    ->assertSee('E-mail')
                    ->assertSee('Пароль')
                    ->assertSee('Роль')
                    ->assertSee('Сохранить')
                    ->assertEnabled('name')
                    ->assertEnabled('email')
                    ->assertEnabled('password')
                    ->assertEnabled('role');
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
                    ->visit('/admin/users')
                    ->assertTitle('Медиатека')
                    ->assertSee('Пользователи')
                    ->assertSee('Добавить пользователя')
                    ->assertSee('Просмотр')
                    ->assertSee('Редактирование')
                    ->assertSee('Удалить')
                    ->assertDontSee('Токарев');
        });
    }
}
