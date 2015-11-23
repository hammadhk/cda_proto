<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Complaint */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Complaints'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="complaint-view">

    <p>
        <?php echo ($model->status_id != 2) ? Html::a(Yii::t('app', 'Mark Fixed'), ['mark-fixed', 'id' => $model->id], ['class' => 'btn btn-primary']):''; ?>
    </p>

    <?php echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'complainant.cnic',
            'complainant.name',
            'registration_time',
			'status.value',
            'description:ntext',
        ],
    ]) ?>

</div>
