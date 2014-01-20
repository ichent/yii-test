<?php

class UserController extends Controller
{
	public function actionMessages()
	{
        $data = CAuth::getUserAuthorizationInfo();

        $data['dataProvider'] = new CActiveDataProvider('Message');
        $this->render('messages', $data);
	}

	public function actionProfile()
	{
        if (isset($_POST['User'])) {
            $model = User::model()->findByPk(CAuth::getIdOfCurrentUser());
            $model->attributes = $_POST['User'];

            if ($model->save())
                $this->redirect('index.php?r=user/profile');
        }

        $data = CAuth::getUserAuthorizationInfo();

        if ($data['isUserAuthorized']) {
            $data['model'] = User::model()->findByPk(CAuth::getIdOfCurrentUser());
        }

		$this->render('profile', $data);
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}