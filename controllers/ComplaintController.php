<?php

namespace app\controllers;

use Yii;
use app\models\Complaint;
use app\models\ComplaintSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\ComplaintCompleteForm;
use app\models\Complainant;

/**
 * ComplaintController implements the CRUD actions for Complaint model.
 */
class ComplaintController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
            'access' => [
				'class' => \yii\filters\AccessControl::className(),
				'only' => ['index', 'create', 'update', 'markFixed'],
				'rules' => [
					[
						'allow' => true,
						'roles' => ['@']
			        ]		
			    ],
	        ],
        ];
    }

    /**
     * Lists all Complaint models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ComplaintSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Complaint model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Complaint model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ComplaintCompleteForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
        	
        	//create entries into the DB
        	
        	//check if comlainant already exists
        	$complainant = $model->getComplainant();
        	if($complainant == null){
	        	$complainant = new Complainant();
	        	$complainant->cnic = $model->cnic;
	        	$complainant->name = $model->name;
	        	$complainant->phone = $model->phone;
	        	$complainant->address_house_number = $model->house;
	        	$complainant->address_street_number = $model->street;
	        	$complainant->address_sector_id = $model->sector;
	        	$complainant->save();
	        	$complainant->id = $complainant->getPrimaryKey();
        	}
        	
        	$complaint = new Complaint();
        	$complaint->complainant_id = $complainant->id;
        	$complaint->description = $model->complaint;
        	$complaint->save();
        	
            return $this->redirect(['view', 'id' => $complaint->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Complaint model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Mark Status as complete.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionMarkFixed($id)
    {
        $model = $this->findModel($id);

        $model->status_id = 2;
        $model->updateAttributes(['status_id']);
        return $this->redirect(['view', 'id' => $model->id]);
    }

    /**
     * Deletes an existing Complaint model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
    	//Don't let it delete
        //$this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Complaint model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Complaint the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Complaint::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
