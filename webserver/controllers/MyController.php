<?php
namespace webserver\controllers;

use yii\web\Controller;

class MyController extends Controller
{
    public function actionIndex()
    {
        $component = \Yii::$app->request->property1;
        var_dump($component);
    }
}