<?php
/**
 * @var $model app\models\patentevents
 */
?>

<h1>阳光惠远客户服务中心</h1>
<h2>亲爱的<strong><?= $model->eventCreator  ?></strong>同事， 您好！</h2>
<p>
    您创建的专利事件<strong>《<?= $model->eventAbstract ?>》</strong>，近日有了新动态，敬请关注！<br>
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


                                             此致，<br>
                                                     敬礼！<br>
                                            阳光惠远客户服务中心<br>
                                        <?= date('Y-m-d H:i',time()); ?>
</p>