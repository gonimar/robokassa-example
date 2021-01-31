<?php

namespace app\controllers;

use app\models\Invoice;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class BasicController extends Controller
{
    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'result' => [
                'class' => '\robokassa\ResultAction',
                'callback' => [$this, 'resultCallback'],
            ],
            'success' => [
                'class' => '\robokassa\SuccessAction',
                'callback' => [$this, 'successCallback'],
            ],
            'fail' => [
                'class' => '\robokassa\FailAction',
                'callback' => [$this, 'failCallback'],
            ],
        ];
    }

    public function actionIndex()
    {
        $model = new Invoice();
        $model->status = Invoice::STATUS_PENDING;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            /** @var \robokassa\Merchant $merchant */
            $merchant = Yii::$app->get('merchant');
            return $merchant->payment(new \robokassa\PaymentOptions([
                'outSum' => $model->sum,
                'description' => 'Пополнение счета',
                // 'incCurrLabel' => '',
                'invId' => $model->id,
                'culture' => 'ru',
                'encoding' => Yii::$app->charset,
                //'email' => Yii::$app->user->identity->email,
                // 'expirationDate' => '', // ISO 8601 (YYYY-MM-DDThh:mm:ss.fffffffZZZZZ)
                // 'outSumCurrency' => 'USD',
                'userIP' => Yii::$app->request->userIP,
                // Дополнительные пользовательские параметры (shp_)
                'params' => [
                    'user_id' => 1,
                    'login' => 'user1',
                ],
            ]));
        }

        return $this->render('index', [
            'merchant' => Yii::$app->get('merchant'),
            'model' => $model,
        ]);
    }

    /**
     * Finds the Invoice model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Invoice the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Invoice::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
