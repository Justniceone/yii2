<?php
namespace webserver\controllers;

use webserver\models\Tag;
use yii\rest\ActiveController;

class TagController extends ActiveController
{
    public $modelClass = Tag::class;
}