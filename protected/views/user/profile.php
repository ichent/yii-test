<?php
/* @var $this UserController */

$this->breadcrumbs=array(
	'Профиль',
);
?>

<? if ($isUserAuthorized) { ?>
    <?php $this->renderPartial('_form_profile', array('model'=>$model)); ?>
<? } else { ?>
    You need to login
<? } ?>