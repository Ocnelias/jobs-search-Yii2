<?php

namespace frontend\controllers;

use Yii;
use common\models\Firm;
use common\models\Job;
use common\models\JobSearch;
use common\models\City;
use common\models\Category;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;
use yii\web\HttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * JobController implements the CRUD actions for Job model.
 */
class JobController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['create', 'update'],
                'rules' => [
                        [
                        'allow' => true,
                        'actions' => ['create', 'update'],
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Job models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new JobSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $category = new Category();
        $city = new City();
       

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'category' => $category,
                    'city' => $city,
        ]);
    }

    /**
     * Displays a single Job model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Job model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
		$countUserFirm = Firm::find()->where('user_id='.\Yii::$app->user->id.'')->count();
		if ($countUserFirm==0){
		//throw new HttpException(404 ,'Add your firm first. ');
		throw new ForbiddenHttpException('Add your firm first');
		}

        if (!\Yii::$app->user->can('createFirm')) {
            throw new ForbiddenHttpException('Access denied');
        }

        $model = new Job();
        $model->scenario = 'create';
 
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Job model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        $model->scenario = 'update';
        
        if (\Yii::$app->user->can('update') or \Yii::$app->user->can('updateOwn', ['firm' => $model])) {


            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('update', [
                            'model' => $model,
                ]);
            }
        } else {

            throw new ForbiddenHttpException('Access denied');
        }
    }

    /**
     * Deletes an existing Job model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    /*  public function actionDelete($id)
      {
      $this->findModel($id)->delete();

      return $this->redirect(['index']);
      }
     */

    /**
     * Finds the Job model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Job the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Job::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
