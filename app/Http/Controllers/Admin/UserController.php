<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Requests\User\UserStore;
use App\Http\Requests\User\UserUpdate;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Просмотр списка ресурсов
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $user = Auth::user();
            // вывод данных
            $items = User::paginate(7);
            return view('admin.index', compact('items'));
    }

    /**
     * Вызов формы создания ресурса
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // текущий авторизованный пользователь
        $user = Auth::user();

        // проверка прав пользователя
        if ($user->can('create', User::class)) {
            // вывод формы для создания пользователя
            return view('admin.create');
        } else {
            // запрет действия с выводом сообщения об ошибке доступа
            return redirect()->route('admin.index')
                    ->withErrors(['msg' => 'Ошибка доступа']);
        }
    }

    /**
     * Сохранение нового ресурса
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStore $request)
    {
        // User::create($request->all());
        // не подходит, так как надо создать хеш пароля
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => bcrypt($request->password),
        ]);

        // сохраняем запись
        $user->save;

        return redirect()->route('admin.index');
    }

    /**
     * Просмотр одного ресурса
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // текущий авторизованный пользователь
        $user = Auth::user();

        $item = User::findOrFail($id);

        if ($user->can('view', $item)) {
            return view('admin.show', compact('item'));
        } else {
            return redirect()->route('admin.index')
                    ->withErrors(['msg' => 'Ошибка доступа']);
        }
    }

    /**
     * Вызов формы редактирования ресурса
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // текущий авторизованный пользователь
        $user = Auth::user();

        $item = User::findOrFail($id);

        if ($user->can('update', $item)) {
            return view('admin.edit', compact('item'));
        } else {
            return redirect()->route('admin.index')
                    ->withErrors(['msg' => 'Ошибка доступа']);
        }
    }

    /**
     * Обновление данных ресурса
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdate $request, $id)
    {
        $item = User::findOrFail($id);

        $item->name = $request['name'];
        $item->email = $request['email'];
        $item->role = $request['role'];
        if ($request['password'] != null) {
            $item->password = bcrypt($request['password']);
        }
        $item->save();

        return redirect()->route('admin.index');
    }

    /**
     * Удаление ресурса
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // текущий авторизованный пользователь
        $user = Auth::user();

        $item = User::findOrFail($id);

        if ($user->can('delete', $item)) {
            $item->delete();
            return redirect()->route('admin.index');
        } else {
            return redirect()->route('admin.index')
                    ->withErrors(['msg' => 'Ошибка доступа']);
        }
    }
}
