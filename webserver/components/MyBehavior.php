<?php
namespace webserver\components;

use yii\base\Behavior;

class MyBehavior extends Behavior
{
    public $prop = '这是mybehavior类的属性';

    public function method()
    {
        echo '这是mybehavior类的方法';
    }
}