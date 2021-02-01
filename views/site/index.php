<?php

/* @var $this yii\web\View */
/* @var $merchant \robokassa\Merchant */

$this->title = 'Yii2 ROBOKASSA';
?>
<div class="site-index">
    <p>
        <strong>Basic</strong> - GET request (\robokassa\Merchant::getPaymentUrl($options))
    </p>
    <p>
        <strong>IFrame</strong> - POST request (\robokassa\widgets\PaymentIFrame), for receipt
    </p>
</div>
