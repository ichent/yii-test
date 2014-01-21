<?
    /* @var $this MessagesController */
    /* @var $model Message */

    $this->breadcrumbs = array(
        'Сообщения' => array('index'),
        'Добавление',
    );

    $this->menu = array(
        array('label' => 'Список сообщений', 'url' => array('index')),
    );
?>

<h1>Создание сообщения</h1>

<? $this->renderPartial('_form', array('model' => $model)); ?>