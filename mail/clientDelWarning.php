<?php
/**
 * @var $clientModelObject app\models\clients
 */
?>

<h1 style="color: red;">阳光惠远客户服务中心警告邮件</h1>
<h2>邓总，赵总，您好！</h2>
<p>
    有客户信息被删除，请注意！<br>
    以下是被删除的客户信息：<br>
    <?= $clientModelObject->clientName; ?>  <br>
    <?= $clientModelObject->clientCellPhone;?>  <br>
    <?= $clientModelObject->clientEmail;?>  <br>
    <?= $clientModelObject->clientOrgnization;?>  <br>
    <?= $clientModelObject->ClientAddress;?>  <br>

    此致，<br>
    敬礼！<br>
    阳光惠远客户服务中心<br>
    <?= date('Y-m-d H:i',time()); ?>
</p>