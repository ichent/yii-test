<?php
/* @var $this UserController */

$this->breadcrumbs=array(
	'User'=>array('/user'),
	'Messages',
);
?>
<? if ($is_visible) { ?>
    Messages
<? } else { ?>
    You need to login
<? } ?>