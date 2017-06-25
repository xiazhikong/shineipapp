<?php
/**
 * @var $patentEventObject app\models\patentevents
 * @var $patentPMStringValue
 * @var $patentAgentStringValue
 * @var $patentEventCreatorStringValue
 */
?>

<h1 style="color: red;">阳光惠远客户服务中心警告邮件</h1>
<h2><?= $patentPMStringValue ?>，<?= $patentAgentStringValue ?>，<?= $patentEventCreatorStringValue ?>,您好！</h2>
<p>
    有专利事件被删除，请注意！<br>
    以下是被删除的事件信息：<br>
    事件创建人：<?= $patentEventObject->eventCreator ?> <br>
    事件创建时间：<?= $patentEventObject->eventCreatedDatetime ?> <br>
    摘要：<?= $patentEventObject->eventAbstract ?> <br>
    内容：<?= $patentEventObject->eventContent ?> <br>
    备注：<?= $patentEventObject->eventNote ?> <br>
    此动态到期日：<?= $patentEventObject->eventDeadline ?> <br>
    最近一次更新此事件的人员：<?= $patentEventObject->eventSatusUpdatedByWho ?> <br>
    最近一次更新时间：<?= $patentEventObject->eventSatusUpdatedDatetime ?> <br>
    附件链接：<?= $patentEventObject->eventFileLinks ?> <br>

    此致，<br>
    敬礼！<br>
    阳光惠远客户服务中心<br>
    <?= date('Y-m-d H:i',time()); ?>
</p>