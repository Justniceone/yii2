<?php
namespace webserver\models\app\document;

use yii\db\ActiveRecord;
use yii\helpers\Url;
use yii\web\Link;
use yii\web\Linkable;

class Article extends ActiveRecord implements Linkable
{
    public function rules()
    {
        return [
            [['category_id','title','content','author'],'required']
        ];
    }

    public function fields()
    {
        return [
                '分类'=>'category_id',
                '标题'=>'title',
                '内容'=>'content',
                '作者'=>'author',
                '点击量'=>'view',
                '发布时间'=>'publish_at',
                '其他'=>function($model)
                    {
                        return $model->id;
                    }
        ];
    }

    public function getLinks()
    {
        return [
            Link::REL_SELF=>Url::to(['article/view','id'=>$this->id],true),
            'update'=>Url::to(['article/update','id'=>$this->id],true)
        ];
    }
}