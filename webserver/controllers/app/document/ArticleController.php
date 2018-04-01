<?php
namespace webserver\controllers\app\document;

use webserver\models\app\document\Article;
use yii\filters\auth\QueryParamAuth;
use yii\helpers\ArrayHelper;
use yii\rest\ActiveController;
use yii\rest\Serializer;

class ArticleController extends ActiveController
{
    public $modelClass = Article::class;

    public $serializer = [
        'class'=>Serializer::class,
        'collectionEnvelope'=>'lists',
    ];

    public function behaviors()
    {
        return ArrayHelper::merge(parent::behaviors(),[
            'authenticatior'=>['class'=>QueryParamAuth::class]
        ]);
    }

    public function actionSearch()
    {
        $lists = Article::find()->where(['like','title',\Yii::$app->request->get('title')])->all();
        return $lists;
    }
    
}