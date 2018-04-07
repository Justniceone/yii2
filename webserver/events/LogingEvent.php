<?php
namespace webserver\events;

use yii\base\Event;

class LogingEvent extends Event
{
    public $user_id = 0;
    public function logMessage(Event $event)
    {
        //记录登录日志
        \Yii::info('用户id=登录了'.$event->user_id);
        echo 1;
    }

    public function sendMessage()
    {
        echo '发送短信成功';
    }

    public function sendEmail()
    {
        echo '发送邮件成功';
    }
}