<?
    /* @var $this UsersController */
    /* @var $dataProvider CActiveDataProvider */

    $this->breadcrumbs = array('Пользователи');

    $this->menu = array(
        array('label' => 'Добавить пользователя', 'url' => array('create'))
    );
?>

<h1>Пользователи</h1>

<?
    $this->widget('zii.widgets.CListView', array(
	    'dataProvider' => $dataProvider,
	    'itemView' => '_view',
    ));
?>
