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
        // Поиск с учетом фильтра, если задан
        $criteria = array();
        $selectedUserId = '';
        if (isset($_POST['User']) && isset($_POST['User']['id'])) {
            $criteria = array('criteria' => array(
                'condition' => 'user_id=' . intval($_POST['User']['id'])
            ));

            $selectedUserId = intval($_POST['User']['id']);
        }

        $dataProvider = new CActiveDataProvider('Message', $criteria);

        // Формирует данные юзеров для фильтра
        $listUsers = array();
        $users = User::model()->findAll();

        if ($users && count($users) > 0) {
            foreach ($users as $user) {
                $listUsers[$user->id] = $user->name;
            }
        }

        $this->render('index', array(
            'dataProvider' => $dataProvider,
            'selectedUserId' => $selectedUserId,
            'listUsers' => $listUsers
        ));
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
     * @param integer $id ID сообщения
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Метод редактирования сообщения.
     * @param integer $id ID сообщения
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
     * Метод удаления сообщения.
     * @param integer $id the ID сообщения
     */
    public function actionDelete($id) {
        $this->loadModel($id)->delete();

        $this->redirect('index.php?r=admin/messages');
    }


    /**
     * Возвращает сообщение по его ID.
     * @param integer $id ID сообщения
     * @return Message
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Message::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'Страница не найдена.');

        return $model;
    }
}