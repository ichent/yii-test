<?php

/**
 * Класс для авторизации пользователя
 */
class AuthController extends Controller
{
    /**
     * Метод для входа в систему
     */
    public function actionLogin()
	{
        if (isset($_POST['name']) && isset($_POST['pass'])) {
            $name = $_POST['name'];
            $pass = $_POST['pass'];

            $user = User::model()->findByAttributes(array('name' => $name, 'pass' => $pass));

            if ($user && count($user) == 1) {
                Yii::app()->session['user'] = array(
                    'name' => $user->name,
                    'is_admin' => $user->is_admin,
                    'id' => $user->id
                );

                $this->redirect('index.php?r=/user/profile');
            }
        }

		$this->render('login');
	}

    /**
     * Метод для выхода из системы
     */
    public function actionLogout()
    {
        if (isset(Yii::app()->session['user'])) {
            unset(Yii::app()->session['user']);
        }

        $this->redirect('index.php');
    }
}