<?php
$userData = $_SESSION['auth'];
/**
 * @param int $num
 * @return string
 */
function getAction(int $num): string
{
    //$message = '';
    switch ($num) {
        case ($num < 18):
            $message = 'Акция такая-то для всех моложе 18';
            break;
        case ($num > 50):
            $message = 'Акция другая для всех старше 50';
            break;
        default:
            $message = 'Для Bас акций нет.';
    }
    return $message;
}

?>
<div class="col">
    <div class="alert alert-info"><?= getAction($userData['age']) ?></div>
    <a href="/auth/index.php?do=logout" class="stretched-link">Выйти</a>
    <ul class="list-group mt-3">
        <li class="list-group-item"><b>Логин:</b> <?= $userData['login'] ?></li>
        <li class="list-group-item"><b>Имя:</b> <?= $userData['name'] ?></li>
        <li class="list-group-item"><b>Пароль:</b> <?= $userData['password'] ?></li>
        <li class="list-group-item"><b>Возраст:</b> <?= $userData['age'] ?></li>
    </ul>
</div>

