<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Clients */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="clients-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'clientUsername')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'clientPassword')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'clientOrgnization')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'clientName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'clientEmail')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'clientCellPhone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'clientLandline')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ClientAddress')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'clientLiaison')->textInput(['maxlength' => true]) ?>

    <?//= $form->field($model, 'clientCreateDate')->textInput() ?>

    <?= $form->field($model, 'clientNote')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
