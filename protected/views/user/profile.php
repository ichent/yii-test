<?php
/* @var $this UserController */

$this->breadcrumbs=array(
	'User'=>array('/user'),
	'Profile',
);
?>
<? if ($is_visible) { ?>
    Profile
<? } else { ?>
    You need to login
<? } ?>