<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PatenteventsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="patentevents-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'eventID') ?>

    <?= $form->field($model, 'eventAbstract') ?>

    <?= $form->field($model, 'eventContent') ?>

    <?= $form->field($model, 'eventNote') ?>

    <?= $form->field($model, 'eventFileLinks') ?>

    <?php // echo $form->field($model, 'patentID') ?>

    <?php // echo $form->field($model, 'eventCreatedDatetime') ?>

    <?php // echo $form->field($model, 'eventDeadline') ?>

    <?php // echo $form->field($model, 'eventCreator') ?>

    <?php // echo $form->field($model, 'eventSatus') ?>

    <?php // echo $form->field($model, 'eventSatusUpdatedDatetime') ?>

    <?php // echo $form->field($model, 'eventSatusUpdatedByWho') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
