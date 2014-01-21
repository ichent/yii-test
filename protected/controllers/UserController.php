<?php

class UserController extends Controller
{
    /**
     * Метод показа сообщений пользователя
     * и добавление нового сообщения
     */
    public function actionMessages()
	{
        $data = CAuth::getUserAuthorizationInfo();

        // Добавляет новое сообщение, если пришел запрос
        if ($data['isUserAuthorized'] && isset($_POST['Message'])) {
            $model = new Message();
            $model->attributes = $_POST['Message'];
            $model->setAttribute('user_id', CAuth::getIdOfCurrentUser());
            $model->setAttribute('date_create', date('Y-m-d H:i:s'));

            if ($model->save())
                $this->redirect('index.php?r=user/messages');
        }

        // Вывод сообщений текущего пользователя
        $data['dataProvider'] = new CActiveDataProvider('Message', array(
            'criteria' => array(
                'condition' => 'user_id=' . CAuth::getIdOfCurrentUser(),
                'order' => 'date_create DESC'
            )
        ));

        $data['model'] = new Message();

        $this->render('messages', $data);
	}

    /**
     * Метод показа профиля пользователя
     */
    public function actionProfile()
	{
        $data = CAuth::getUserAuthorizationInfo();

        // Обновляет данные пользователя, если пришел запрос
        if ($data['isUserAuthorized'] && isset($_POST['User'])) {
            $model = User::model()->findByPk(CAuth::getIdOfCurrentUser());
            $model->attributes = $_POST['User'];

            if ($model->save())
                $this->redirect('index.php?r=user/profile');
        }

        if ($data['isUserAuthorized']) {
            $data['model'] = User::model()->findByPk(CAuth::getIdOfCurrentUser());
        }

		$this->render('profile', $data);
	}
}