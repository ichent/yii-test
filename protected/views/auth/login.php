<?php
/* @var $this AuthController */

$this->breadcrumbs=array(
	'Авторизация',
);
?>

<form action="index.php?r=auth/login" method="post">
    Логин <input type="text" name="name" />
    Пароль <input type="password" name="pass" />
    <input type="submit" value="Войти" />
</form>