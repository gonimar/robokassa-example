<?php

use robokassa\PaymentOptions;
use robokassa\widgets\PaymentIFrame;

/* @var $this yii\web\View */
/* @var $merchant \robokassa\Merchant */
?>

<h1>PaymentIFrame::widget()</h1>

<p>
<?= PaymentIFrame::widget([
    'merchant' => $merchant,
    'paymentOptions' => new PaymentOptions([
        'outSum' => 100,
        'invId' => 1,
        'description' => 'Description',
        'culture' => 'en',
        'params' => [
            'user_id' => 1,
            'login' => 'user1',
        ],
    ]),
]) ?>
</p>
