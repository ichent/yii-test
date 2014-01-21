<?
    /* @var $this UsersController */
    /* @var $model Users */

    $this->breadcrumbs = array(
        'Пользователи' => array('index'),
        $model->name,
    );

    $this->menu=array(
        array('label' => 'Список пользователей', 'url' => array('index')),
        array('label' => 'Добавить пользователя', 'url' => array('create')),
        array('label' => 'Редактировать пользователя', 'url' => array('update', 'id'=>$model->id)),
        array('label' => 'Удалить пользователя', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Вы действительно хотите удалить пользователя?')),
    );
?>

<h1>Детальная пользователя #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'pass',
		'is_admin',
	),
)); ?>
