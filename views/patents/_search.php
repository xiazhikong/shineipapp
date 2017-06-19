<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PatentsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="patents-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'patentID') ?>

    <?= $form->field($model, 'patentApplicant') ?>

    <?= $form->field($model, 'patentEACNumber') ?>

    <?= $form->field($model, 'patentApplicationCode') ?>

    <?= $form->field($model, 'patentType') ?>

    <?php // echo $form->field($model, 'patentPendingEvents') ?>

    <?php // echo $form->field($model, 'patentTitle') ?>

    <?php // echo $form->field($model, 'patentContact') ?>

    <?php // echo $form->field($model, 'patentNote') ?>

    <?php // echo $form->field($model, 'patentAgent') ?>

    <?php // echo $form->field($model, 'patentProcessManager') ?>

    <?php // echo $form->field($model, 'clientID') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
