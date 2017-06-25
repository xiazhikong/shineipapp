<?php
/**
 * @var $model app\models\patentevents
 * @var $patentClientStringValue
 */
?>

<h2>阳光惠远客户服务中心通知邮件</h2>
<h3>尊敬的<strong><?= $patentClientStringValue  ?></strong>老师， 您好！</h3>
<p>
    您的专利<strong>《<?= $model->patent->patentTitle ?>》</strong>，近日有了新动态，敬请关注！<br>
    该动态内容如下：<br>
    事件创建人：<?= $model->eventCreator ?> <br>
    事件创建时间：<?= $model->eventCreatedDatetime ?> <br>
    摘要：<?= $model->eventAbstract ?> <br>
    内容：<?= $model->eventContent ?> <br>
    备注：<?= $model->eventNote ?> <br>
    此动态到期日：<?= $model->eventDeadline ?> <br>
    最近一次更新此事件的人员：<?= $model->eventSatusUpdatedByWho ?> <br>
    最近一次更新时间：<?= $model->eventSatusUpdatedDatetime ?> <br>
    附件链接：<?= $model->eventFileLinks ?> <br>

    <strong>
    哈尔滨市阳光惠远知识产权代理有限公司竭诚为您服务！<br>
    地址：黑龙江省哈尔滨市松北区科技一街99号18号楼E501室，<br>
    电话：0451-88084686<br>
    </strong>

                                             此致，<br>
                                                     敬礼！<br>
                                            阳光惠远客户服务中心<br>
                                        <?= date('Y-m-d H:i',time()); ?>
</p>