<?php

class MessagesController extends Controller {

    public $layout = '//layouts/admin_column2';

    protected function beforeAction($action) {
        if (!CAuth::isCurrentUserAdmin()) {
            throw new CHttpException(403, 'У Вас нет прав для просмотра этого раздела.');
            return false;
        }

        return true;
    }

    /**
     * Метод по умолчанию, также отображает список сообщений.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Message');
        $this->render('index', array('dataProvider' => $dataProvider));
    }

    /**
     * Отображает форму для добавления Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new User;

        if (isset($_POST['User'])) {
            $model->attributes = $_POST['User'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('create', array(
            'model' => $model
        ));
    }

	public function actionAdd()
	{
		$this->render('add');
	}

	public function actionEdit()
	{
		$this->render('edit');
	}

	public function actionSave()
	{
		$this->render('save');
	}

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Users the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Message::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'Страница не найдена.');

        return $model;
    }
}