<?php
/**
 * @var $model app\models\patents
 * @var $patentAgentStringValue
 */
?>

<h1>阳光惠远客户服务中心</h1>
<h2>亲爱的<strong><?= $patentAgentStringValue  ?></strong>同事， 您好！</h2>
<p>
    最新创建了一个案子，专利<strong>《<?= $model->patentTitle ?>》</strong>，敬请关注！<br>


    此致，<br>
    敬礼！<br>
    阳光惠远客户服务中心<br>
    <?= date('Y-m-d H:i',time()); ?>
</p>