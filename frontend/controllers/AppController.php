<?php
/**
 * Created by PhpStorm.
 */

namespace frontend\controllers;

use Yii;
use yii\web\Controller;

class AppController extends Controller
{
    /**
     * @return \yii\console\Request|\yii\web\Request
     */
    protected function getRequest()
    {
        return Yii::$app->getRequest();
    }
}
