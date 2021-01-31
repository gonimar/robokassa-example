<?php

namespace app\controllers;

use yii\web\Controller;

class BasicController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}
