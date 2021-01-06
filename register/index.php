<?php
session_start();

if (isset($_SESSION['auth'])) {
    header('Location: /');
    exit;
}

include_once('../const.php'); // Const

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
 * @param array $data
 * @param string $key
 * @param string $value
 * @return bool
 */
function searchUserData(array $data, string $key, string $value): bool
{
    if (is_array($data)) {
        foreach ($data as $index => $item) {
            if ($value === $item[$key]) {
                return true;
            }
        }
    }
    return false;
}

/* Register */
if (!empty($request = $_POST)) {
    $message = [];
    $userData = [];
    foreach ($request as $key => $value) {
        if ($value !== '') {
            $userData[$key] = trim(filter_var($value, FILTER_SANITIZE_STRING));
        } else {
            $message['error'] = 'Вам необходимо заполнить все поля формы.';
            redirectWith($message);
        }
    }
    $userData['password'] = password_hash($userData['password'], PASSWORD_DEFAULT); // hash

    if (file_exists(DB_FILE)) {
        $data = json_decode(file_get_contents(DB_FILE), TRUE, 512, JSON_THROW_ON_ERROR);
        if (true === searchUserData($data, 'login', $userData['login'])) {
            $message['error'] = 'Пользователь с такими данными уже существует.';
            redirectWith($message);
        }
    }

    try {
        $data[] = $userData;
        file_put_contents(DB_FILE, json_encode($data, JSON_THROW_ON_ERROR | JSON_UNESCAPED_UNICODE));
    } catch (Exception $er) {
        echo $er->getMessage();
    }
    // Success
    $message['success'] = 'вы успешно зарегистрировались.';
    redirectWith($message);

}
/*==================================================================*/
redirectWith(['error' => 'Вам необходимо заполнить все поля формы.']);


