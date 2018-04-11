<?php
namespace webserver\models\iot;

use yii\db\ActiveRecord;

class Camera extends ActiveRecord
{
    public static function tableName()
    {
        return 'user_headhuntings';
    }
}