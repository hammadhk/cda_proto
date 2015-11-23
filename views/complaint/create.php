<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Complaint */

$this->title = Yii::t('app', 'Create Complaint');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Complaints'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="complaint-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
