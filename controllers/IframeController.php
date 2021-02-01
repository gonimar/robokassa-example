<?php

namespace app\controllers;

use app\models\Invoice;
use robokassa\PaymentOptions;
use robokassa\widgets\PaymentIFrame;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class IframeController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionIframe()
    {
        return $this->render('iframe', [
            'merchant' => Yii::$app->get('merchant'),
        ]);
    }

    public function actionForm()
    {
        $model = new Invoice();
        $model->status = Invoice::STATUS_PENDING;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            /** @var \robokassa\Merchant $merchant */
            $merchant = Yii::$app->get('merchant');
            return $this->renderContent(PaymentIFrame::widget([
                'merchant' => $merchant,
                'paymentOptions' => new PaymentOptions([
                    'outSum' => $model->sum,
                    'invId' => $model->id,
                    'description' => 'Description',
                    'culture' => 'en',
                    'params' => [
                        'user_id' => 1,
                        'login' => 'user1',
                    ],
                ]),
            ]));
        }

        return $this->render('form', [
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
