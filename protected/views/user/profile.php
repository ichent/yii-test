<?php
/* @var $this UserController */

$this->breadcrumbs=array(
	'User'=>array('/user'),
	'Profile',
);
?>

<? if ($isUserAuthorized) { ?>
    <?php $this->renderPartial('_form', array('model'=>$model)); ?>
<? } else { ?>
    You need to login
<? } ?>