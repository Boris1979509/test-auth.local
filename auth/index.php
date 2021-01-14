<?php
session_start();

/* Logout */
if ($_GET['do'] === 'logout') {
    unset($_SESSION['auth']);
    redirectWith(['success' => 'Вы успешно вышли.']);
}

if (isset($_SESSION['auth'])) {
    header('Location: /');
    exit();
}

/**
 * @param array $message
 * @param string $url
 */
function redirectWith(array $message, string $url = '/'): void
{
    $_SESSION['message'] = $message;
    header('Location: ' . $url);
    exit();
}

/**
 * @param array $user
 * @return mixed
 */
function getUserVerify(array $user)
{
    if (file_exists(DB_FILE)) {
        $data = json_decode(file_get_contents(DB_FILE), TRUE, 512, JSON_THROW_ON_ERROR);
        foreach ($data as $index => $item) {
            if ($user['login'] === $item['login'] && password_verify($user['password'], $item['password'])) {
                return $item;
            }
        }
        return false;
    }
    return false;
}

/* Login */
if (!empty($_POST)) {
    if ($_POST['password'] && $_POST['login']) {
        $login = trim(filter_var($_POST['login'], FILTER_SANITIZE_STRING));
        $password = trim(filter_var($_POST['password'], FILTER_SANITIZE_STRING));

        if ($data = getUserVerify(['login' => $login, 'password' => $password])) {
            $data['password'] = $password;
            $_SESSION['auth'] = $data;
            redirectWith(['success' => 'Добро пожаловать, <b>' . $login . '</b>!']);
        }

        redirectWith(['error' => 'Пользователь не найден.']);
    } else {
        redirectWith(['error' => 'Вам необходимо заполнить все поля формы.']);
    }
}


