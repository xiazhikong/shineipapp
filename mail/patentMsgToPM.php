<?php
/**
 * @var $model app\models\patents
 * @var $patentPMStringValue
 */
?>

<h1>阳光惠远客户服务中心</h1>
<h2>亲爱的<strong><?= $patentPMStringValue  ?></strong>同事， 您好！</h2>
<p>
    您负责的专利<strong>《<?= $model->patentTitle ?>》</strong>，近日有了新动态，敬请关注！<br>


                                             此致，<br>
                                                     敬礼！<br>
                                            阳光惠远客户服务中心<br>
                                        <?= date('Y-m-d H:i',time()); ?>
</p>