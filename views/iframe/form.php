<?php

use robokassa\PaymentOptions;
use robokassa\widgets\PaymentIFrame;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;

/* @var $this yii\web\View */
/* @var $merchant \robokassa\Merchant */
/* @var $model \app\models\Invoice */
?>

<h1>IFrame in action</h1>

<p>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'sum')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Pay', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</p>
