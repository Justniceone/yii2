<?php
namespace webserver\componnents;

use yii\base\Behavior;

class MyBehavior extends Behavior
{
    public $property1 = [1,2,3,];

    public function getProperty1()
    {
        return $this->property1;
    }
}