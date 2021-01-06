<div class="col">
    <form method="POST" action="/auth/index.php">
        <h3>Вход</h3>
        <div class="mb-3">
            <input type="text" class="form-control" placeholder="Ваш логин" name="login">
        </div>
        <div class="mb-3">
            <input type="password" class="form-control" name="password" placeholder="Ваш пароль">
        </div>
        <button type="submit" class="btn btn-success">Войти</button>
    </form>
</div>
<div class="col">
    <h3>Регистрация</h3>
    <form method="POST" action="/register/index.php">
        <div class="mb-3">
            <input type="text" class="form-control" placeholder="Введите логин" name="login">
        </div>
        <div class="mb-3">
            <input type="text" class="form-control" placeholder="Введите имя" name="name">
        </div>
        <div class="mb-3">
            <input type="password" class="form-control" placeholder="Введите пароль" name="password">
        </div>
        <div class="mb-3">
            <input type="number" class="form-control" placeholder="Введите возраст" name="age">
        </div>
        <button type="submit" class="btn btn-success">Зарегистрироваться</button>
    </form>
</div>