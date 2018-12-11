<?php

namespace app\controllers;

use Yii;
use app\models\BackendUser;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BackendUserController implements the CRUD actions for BackendUser model.
 */
class BackendUserController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function beforeAction($action)
    {
        if(Yii::$app->user->isGuest) {
            $this->redirect(['site/login']);
        }
        return true;
    }

    /**
     * Lists all BackendUser models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => BackendUser::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single BackendUser model.
     * @param integer $id
     * @param string $username
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id, $username)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $username),
        ]);
    }

    /**
     * Creates a new BackendUser model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new BackendUser();

        $request = Yii::$app->request->post();
        
        if(isset($request['BackendUser'])) {
            $request['BackendUser']['password'] = md5($request['BackendUser']['password']);
            $request['BackendUser']['authKey'] = md5($request['BackendUser']['password'].$request['BackendUser']['username']);
            $request['BackendUser']['accessToken'] = md5($request['BackendUser']['password'].$request['BackendUser']['username']);
        }

        if ($model->load($request) && $model->save()) {
            //return $this->redirect(['view', 'id' => $model->id, 'username' => $model->username]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing BackendUser model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param string $username
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id, $username)
    {
        $model = $this->findModel($id, $username);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'username' => $model->username]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing BackendUser model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param string $username
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id, $username)
    {
        $this->findModel($id, $username)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the BackendUser model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param string $username
     * @return BackendUser the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $username)
    {
        if (($model = BackendUser::findOne(['id' => $id, 'username' => $username])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
