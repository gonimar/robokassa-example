<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model \app\models\Invoice */
?>
<h1>Merchant::payment()</h1>
<h1>\robokassa\Merchant::getPaymentUrl($options)</h1>
<p>$options</p>
<code>
    [
    'outSum' => 100,
    'invId' => 1,
    'description' => 'Description',
    'culture' => 'en',
    'params' => [
    'user_id' => 1,
    'login' => 'user1',
    ],
    ]
</code>
<p>Out:</p>
<code>
    <?= $merchant->getPaymentUrl(new \robokassa\PaymentOptions([
        'outSum' => 100,
        'invId' => 1,
        'description' => 'Description',
        'culture' => 'en',
        'params' => [
            'user_id' => 1,
            'login' => 'user1',
        ],
    ])) ?>
</code>
<div class="invoice-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'sum')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Pay', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
