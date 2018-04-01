<?php
namespace webserver\controllers;

use common\models\User;
use webserver\models\WebserverLoginForm;
use yii\rest\ActiveController;

class LoginController extends ActiveController
{
    public $modelClass = User::class;

    public function actionSign()
    {
        $model = new WebserverLoginForm();
        $model->username = \Yii::$app->request->post('username');
        $model->password = \Yii::$app->request->post('password');
        if ($model->login())
        {
            return ['access_token'=>$model->login()];
        }else
        {
            //$model->validate();
            return $model->getErrors();
        }
    }
}