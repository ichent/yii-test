<?php
/* @var $this AuthController */

$this->breadcrumbs=array(
	'Auth',
);
?>

<form action="index.php?r=auth/login" method="post">
    Логин <input type="text" name="name" />
    Пароль <input type="text" name="pass" />
    <input type="submit" />
</form>