<?
    /* @var $this MessagesController */
    /* @var $dataProvider CActiveDataProvider */

    $this->breadcrumbs = array(
        'Сообщения',
    );

    $this->menu = array(
        array('label' => 'Добавить сообщение', 'url' => array('create'))
    );
?>

<h1>Сообщения</h1>

<?
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'user-form',
        'enableAjaxValidation' => false,
    ));
?>

<div class="row">
    Пользователь
    <?php echo CHtml::dropDownList('User[id]', $selectedUserId, $listUsers); ?>
    <?php echo CHtml::submitButton('Найти'); ?>
</div>

<? $this->endWidget(); ?>

<?
    $this->widget('zii.widgets.CListView', array(
	    'dataProvider' => $dataProvider,
	    'itemView' => '_view',
    ));
?>