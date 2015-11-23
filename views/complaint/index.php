<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ComplaintSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Complaints');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="complaint-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Complaint'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
			array('attribute' => 'name', 'value' => 'complainant.name'),
			array('attribute' => 'cnic', 'value' => 'complainant.cnic'),
            'registration_time',
            array('attribute' => 'status', 'value' => 'status.value'),

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
