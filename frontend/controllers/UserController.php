<?php

namespace frontend\controllers;

use Yii;
use common\models\User;
use common\models\UserSearch;
use common\models\Category;
use common\models\City;
use common\models\Experience;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\web\UploadedFile;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller {

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
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new UserSearch();
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
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        // $model = $this->findModel($id);
         
            //  if (\Yii::$app->user->can('createFirm') or \Yii::$app->user->can('updateOwnResume', ['user' => $model])) { 
            return $this->render('view', [
                        'model' => $this->findModel($id),
            ]);
       // } else {
        //    throw new ForbiddenHttpException('Access denied. Only employers can see resumes');
       // }
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new User();
        $experience = new Experience();
        
        $model->scenario = 'create';
        
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->id]);
//        } else {
//            return $this->render('create', [
//                        'model' => $model,
//                         'experience' => $experience,
//                
//            ]);
//        }
  
            if ($model->load(Yii::$app->request->post()) && $experience->load(Yii::$app->request->post())) {
            $isValid = $model->validate();
            $isValid = $experience->validate() && $isValid;
            if ($isValid) {
                $model->save(false);
                $experience->save(false);
                return $this->redirect(['user/view', 'id' => $id]);
            }
        }
        
        return $this->render('create', [
               'model' => $model,
              'experience' => $experience,
        ]); 
        
        
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
       $model = $this->findModel($id);

        if (\Yii::$app->user->can('update') or \Yii::$app->user->can('updateOwnResume', ['user' => $model])) {


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
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    // public function actionDelete($id)
    // {
    //    $this->findModel($id)->delete();
    //    return $this->redirect(['index']);
    // }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
