<?php
/**
 * @var $patentModelObject app\models\patents
 * @var $patentClientLiaisonStringValue
 * @var $patentPMStringValue
 * @var $patentAgentStringValue
 */
?>

<h1 style="color: red;">阳光惠远客户服务中心警告邮件</h1>
<h2>邓总，<?= $patentClientLiaisonStringValue ?>，<?= $patentPMStringValue ?>,
    <?= $patentAgentStringValue ?>您好！</h2>
<p>
    有专利信息被删除，请注意！<br>
    以下是被删除的专利信息：<br>
    <?= $patentModelObject->patentTitle; ?>  <br>
    <?= $patentModelObject->patentApplicationCode;?>  <br>
    <?= $patentModelObject->patentEACNumber;?>  <br>
    <?= $patentModelObject->patentID;?>  <br>
    <?= $patentModelObject->patentApplicant;?>  <br>

    此致，<br>
    敬礼！<br>
    阳光惠远客户服务中心<br>
    <?= date('Y-m-d H:i',time()); ?>
</p>