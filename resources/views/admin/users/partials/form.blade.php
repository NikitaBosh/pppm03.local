<div class="form-group">
    <label for="name">ФИО</label>
    <input type="text" class="form-control" id="name" name="name" value="{{ $item->name ?? old('name')}}">
</div>
<div class="form-group">
    <label for="email">E-mail</label>
    <input type="text" class="form-control" id="email" name="email" value="{{ $item->email ?? old('email')}}">
</div>
<div class="form-group">
    <label for="password">Пароль</label>
    <input type="text" class="form-control" id="password" name="password">
</div>
<div class="form-group">
    <label for="role">Роль</label>
    <select class="form-control" id="role" name="role">
        <option value="user" {{ (($item->role ?? old('role')) == "user") ? "selected" : "" }}>Пользователь</option>
    </select>
</div>

<button type="submit" id="save" class="btn btn-primary">Сохранить</button>
