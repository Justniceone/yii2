<?php

namespace webserver\controllers;

use webserver\components\MyBehavior;
use webserver\events\LogingEvent;
use yii\web\Controller;

class TestController extends Controller
{
    const EVENT_USER_LOGIN = 'login';

    public function init()
    {
        parent::init();
        $this->on(self::EVENT_USER_LOGIN, [LogingEvent::class, 'logMessage']);
        $this->on(self::EVENT_USER_LOGIN, [LogingEvent::class, 'sendMessage']);
        $this->on(self::EVENT_USER_LOGIN, [LogingEvent::class, 'sendEmail']);
    }

    public function actionTest()
    {
        $mybehavior = new MyBehavior();
        $this->attachBehavior('Mybehavior', $mybehavior);
        echo $this->prop;
        echo $this->method();
    }

    public function actionTest2($name='')
    {
        if ($name == 'xp') {
            $event = new LogingEvent();
            $event->user_id = 1;
            $this->trigger(self::EVENT_USER_LOGIN, $event);
        }
    }
}