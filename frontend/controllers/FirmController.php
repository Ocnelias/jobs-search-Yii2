<?php

namespace frontend\controllers;

use Yii;
use common\models\Firm;
use common\models\FirmSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\web\UploadedFile;

/**
 * FirmController implements the CRUD actions for Firm model.
 */
class FirmController extends Controller {

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
     * Lists all Firm models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new FirmSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Firm model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Firm model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        if (!\Yii::$app->user->can('createFirm')) {
            throw new ForbiddenHttpException('Access denied');
        }
        $model = new Firm();
        $model->scenario = 'create';

        if ($model->load(Yii::$app->request->post())) {
            $model->user_id = '' . Yii::$app->user->id . '';
            $model->created_at = '' . Yii::$app->formatter->asTimestamp(date('Y-d-m h:i:s')) . '';

		//$model->imageFile = UploadedFile::getInstance($model, 'imageFile');

            if ($model->validate()) {
              
			//  $model->logo->saveAs('uploads/' . $model->logo->baseName . '.' . $model->logo->extension);


              //  $model->logo = $filePath;

                if ($model->save(false)) {

                    return $this->redirect(['view', 'id' => $model->id]);
                }
            
			}
			
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Firm model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        $model->scenario = 'update';
        
        if (\Yii::$app->user->can('update') or \Yii::$app->user->can('updateOwnFirm', ['firm' => $model])) {


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
     * Deletes an existing Firm model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    /* public function actionDelete($id) {
      if (!\Yii::$app->user->can('createFirm')) {
      throw new \yii\web\ForbiddenHttpException('Access denied');
      }
      $this->findModel($id)->delete();

      return $this->redirect(['index']);
      } */

    /**
     * Finds the Firm model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Firm the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Firm::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
