<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Patents */

$this->title = 'Create Patents';
$this->params['breadcrumbs'][] = ['label' => 'Patents', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patents-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
