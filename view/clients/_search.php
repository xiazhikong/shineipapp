<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ClientsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="clients-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'clientID') ?>

    <?= $form->field($model, 'clientUsername') ?>

    <?= $form->field($model, 'clientPassword') ?>

    <?= $form->field($model, 'clientOrgnization') ?>

    <?= $form->field($model, 'clientName') ?>

    <?php // echo $form->field($model, 'clientEmail') ?>

    <?php // echo $form->field($model, 'clientCellPhone') ?>

    <?php // echo $form->field($model, 'clientLandline') ?>

    <?php // echo $form->field($model, 'ClientAddress') ?>

    <?php // echo $form->field($model, 'clientLiaison') ?>

    <?php // echo $form->field($model, 'clientCreateDate') ?>

    <?php // echo $form->field($model, 'clientNote') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
