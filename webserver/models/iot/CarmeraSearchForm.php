<?php
namespace webserver\models\iot;

use yii\base\Model;
use yii\data\ActiveDataProvider;

class CarmeraSearchForm extends Model
{
    public $company;
    public $status;
    public $is_service;

    public function rules()
    {
        return [
            [['status','is_service'], 'each' , 'rule' => ['integer'] ],//不输入不会进行验证
            ['company','string']
        ];
    }

    public function ActiveDataProvide()
    {
        return new ActiveDataProvider(
            [
                'query' => $this->getQuery(),
                'pagination' => [
                    'pageSize' => 10,
                ],
            ]
        );
    }

    public function getQuery()
    {
        $query =  Camera::find();
        if ($this->validate())
        {
            $query->andFilterWhere(['like','company',$this->company]);
            $query->andFilterWhere(['in','status',$this->status]);
            $query->andFilterWhere(['in','is_service',$this->is_service]);
        }else
        {
            var_dump($this->getErrors());die;
        }
        return $query;
    }
}