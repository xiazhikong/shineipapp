<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Patentevents */

$this->title = 'Create Patentevents';
$this->params['breadcrumbs'][] = ['label' => 'Patentevents', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patentevents-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
