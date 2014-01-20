<?php
/* @var $this UserController */

$this->breadcrumbs=array(
	'User'=>array('/user'),
	'Messages',
);
?>

<? if ($isUserAuthorized) { ?>
    <?php $this->widget('zii.widgets.CListView', array(
        'dataProvider'=>$dataProvider,
        'itemView'=>'_message',
    )); ?>
<? } else { ?>
    You need to login
<? } ?>