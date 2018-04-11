<?php
namespace webserver\controllers\iot;

use webserver\models\iot\Camera;
use webserver\models\iot\CarmeraSearchForm;
use yii\rest\ActiveController;
use yii\web\Response;

class CameraController extends ActiveController
{
    public $modelClass = Camera::class;

    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'items',
    ];

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['contentNegotiator']['formats']['text/html'] = Response::FORMAT_JSON;
        return $behaviors;
    }
    public function actions()
    {
        $actions = parent::actions();
        unset($actions['index']);
        return $actions;
    }
    public function actionIndex()
    {
        $params = \Yii::$app->getRequest()->getQueryParams();
        $form = new CarmeraSearchForm();
        $form->load($params,'');
        //var_dump($form);die;
        return $form->ActiveDataProvide();
    }
}