<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Patentevents */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="patentevents-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'eventAbstract')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'eventContent')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'eventNote')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'eventFileLinks')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'patentID')->textInput() ?>

    <?= $form->field($model, 'eventCreatedDatetime')->textInput() ?>

    <?= $form->field($model, 'eventDeadline')->textInput() ?>

    <?= $form->field($model, 'eventCreator')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'eventSatus')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'eventSatusUpdatedDatetime')->textInput() ?>

    <?= $form->field($model, 'eventSatusUpdatedByWho')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
