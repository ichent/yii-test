<?
    /* @var $this MessagesController */
    /* @var $model Message */

    $this->breadcrumbs = array(
        'Сообщения' => array('index'),
        $model->id,
    );

    $this->menu = array(
        array('label' => 'Список сообщений', 'url' => array('index')),
        array('label' => 'Добавить сообщение', 'url' => array('create')),
        array('label' => 'Редактировать сообщение', 'url' => array('update', 'id'=>$model->id)),
        array('label' => 'Удалить сообщение', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Вы действительно хотите удалить сообщение?')),
    );
?>

<h1>Детальная сообщения #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'text',
		'user_id',
		'date_create',
	),
)); ?>
