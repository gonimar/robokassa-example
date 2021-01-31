<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;

class IframeController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index', [
            'merchant' => Yii::$app->get('merchant'),
        ]);
    }

}
