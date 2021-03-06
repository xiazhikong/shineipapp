<?php
/**
 * @var $model app\models\clients
 * @var $clientLiaisonStringValue
 */
?>

<h1>阳光惠远客户服务中心通知邮件</h1>
<h2>亲爱的<strong>邓总、赵总、<?= $clientLiaisonStringValue  ?>同事</strong>， 您好！</h2>
<p>
    有客户信息被变动，请注意！<br>
    以下是客户信息：<br>
    <?= $model->clientName; ?>  <br>
    <?= $model->clientCellPhone;?>  <br>
    <?= $model->clientEmail;?>  <br>
    <?= $model->clientOrgnization;?>  <br>
    <?= $model->ClientAddress;?>  <br>

    此致，<br>
    敬礼！<br>
    阳光惠远客户服务中心<br>
    <?= date('Y-m-d H:i',time()); ?>
</p>