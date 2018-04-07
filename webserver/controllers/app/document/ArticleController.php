<?php
namespace webserver\controllers\app\document;

use common\models\User;
use webserver\components\MyBehavior;
use webserver\components\MyBehaviorAttach;
use webserver\models\app\document\Article;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBasicAuth;
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

    /**
     * QueryParamAuth 授权
     */
 /*   public function behaviors()
    {
        return ArrayHelper::merge(parent::behaviors(),[
            'authenticatior'=>['class'=>QueryParamAuth::class]
        ]);
    }*/

    /**
     * @return array|\yii\db\ActiveRecord[] httpAuth授权
     */

 /*   public function behaviors()
        {
            return ArrayHelper::merge(parent::behaviors(),[
                'authenticatior'=>[
                    'class'=>HttpBasicAuth::class,
                    'auth'=>function($username,$password){
                        return User::find()->where(['username'=>$username,'password'=>$password])->one();
                    }
                ],
            ]);
        }*/

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => CompositeAuth::className(),
            'authMethods' => [
                //HttpBasicAuth::className(),
                //HttpBearerAuth::className(),
                //QueryParamAuth::className(),
            ]
        ];
        return $behaviors;
    }

    public function actionSearch()
    {
        $lists = Article::find()->where(['like','title',\Yii::$app->request->get('title')])->all();
        return $lists;
    }

}