<?php

use yii\bootstrap\Html;

/* @var $this yii\web\View */
/* @var $merchant \robokassa\Merchant */
?>
<h1>PaymentIFrame::widget()</h1>

<p>
    <?= Html::a('IFrame', ['iframe/iframe'], ['class' => 'btn btn-default']) ?>
    Inline IFrame.
    <code>
        PaymentIFrame::widget();
    </code>
</p>
<p>
    <?= Html::a('Form', ['iframe/form'], ['class' => 'btn btn-default']) ?>
    IFrame in controller action.
    <code>
        return $this->renderContent(PaymentIFrame::widget());
    </code>
</p>
