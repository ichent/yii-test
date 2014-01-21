<?php
/* @var $this UserController */

$this->breadcrumbs=array(
	'Пользователь'=>array('/user/profile'),
	'Сообщения',
);
?>

<? if ($isUserAuthorized) { ?>
    <? $this->renderPartial('_form_message', array('model'=>$model)); ?>
    <? $this->widget('zii.widgets.CListView', array(
        'dataProvider'=>$dataProvider,
        'itemView'=>'_message',
    )); ?>
<? } else { ?>
    Необходимо авторизоваться
<? } ?>