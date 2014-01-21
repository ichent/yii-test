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
     * Метод создания нового сообщения.
     */
    public function actionCreate() {
        $model = new Message;

        if (isset($_POST['Message'])) {
            $model->attributes = $_POST['Message'];
            $model->setAttribute('user_id', CAuth::getIdOfCurrentUser());
            $model->setAttribute('date_create', date('Y-m-d H:i:s'));

            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('create', array(
            'model' => $model
        ));
    }

    /**
     * Метод детальной сообщения.
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Метод редактирования сообщения.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        if (isset($_POST['Message'])) {
            $model->attributes = $_POST['Message'];
            if ($model->save())
                $this->redirect(array('view','id' => $model->id));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $this->loadModel($id)->delete();

        $this->redirect('index.php?r=admin/messages');
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