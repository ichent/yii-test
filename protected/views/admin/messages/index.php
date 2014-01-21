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
    $this->widget('zii.widgets.CListView', array(
	    'dataProvider' => $dataProvider,
	    'itemView' => '_view',
    ));
?>
