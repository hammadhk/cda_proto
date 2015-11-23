<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Complaint */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="complaint-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cnic')->textInput() ?>

    <?= $form->field($model, 'name')->textInput() ?>

    <?= $form->field($model, 'phone')->textInput() ?>

    <?= $form->field($model, 'house')->textInput() ?>

    <?= $form->field($model, 'street')->textInput() ?>

    <?= $form->field($model, 'sector')->textInput() ?>

    <?= $form->field($model, 'complaint')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Create'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
