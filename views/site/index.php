<?php

/* @var $this yii\web\View */
/* @var $merchant \robokassa\Merchant */

$this->title = 'Yii2 ROBOKASSA';
?>
<div class="site-index">
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
</div>
