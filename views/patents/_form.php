<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Patents */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="patents-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'patentApplicant')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'patentEACNumber')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'patentApplicationCode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'patentType')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'patentPendingEvents')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'patentTitle')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'patentContact')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'patentNote')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'patentAgent')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'patentProcessManager')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'clientID')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
