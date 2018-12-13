<?php

namespace app\controllers;

use Yii;
use app\models\Property;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Bedroom;
use app\models\UploadForm;
use yii\web\UploadedFile;

/**
 * PropertyController implements the CRUD actions for Property model.
 */
class PropertyController extends Controller
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

    /**
     * @param $action
     * @return bool
     */
    public function beforeAction($action)
    {
        if(Yii::$app->user->isGuest) {
            $this->redirect(['site/login']);
        }
        return true;
    }

    /**
     * Lists all Property models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Property::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Property model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Property model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Property();

        $request = Yii::$app->request->post();

        if(isset($request['Property']['title']))
        {
            $request['Property']['slug'] = strtolower(str_replace(' ', '-', $request['Property']['title']));
        }

        if ($model->load($request) && $model->save()) {

            for($i = 0; $i < $model->no_of_bedrooms; $i++) {
                $bedroom = new Bedroom();
                $bedroom->property_id = $model->id;
                $bedroom->save();
            }

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Property model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $request = Yii::$app->request->post();

        if(isset($request['Property']['title']))
        {
            $request['Property']['slug'] = strtolower(str_replace(' ', '-', $request['Property']['title']));
        }

        if ($model->load($request) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Property model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Property model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Property the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Property::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionBedroom_amenity_form()
    {
        $request = Yii::$app->request->get();

        $model = new \app\models\BedroomAmenities();

        if(isset($request['bedroom_id'])) {

            if ($model->load(Yii::$app->request->post())) {
                if ($model->validate()) {
                    $model->save();
                    return $this->redirect(['property/']);
                }
            }

            $model->bedroom_id = $request['bedroom_id'];

            return $this->render('bedroom_create', [
                'model' => $model,
            ]);

        }
    }

    /**
     * @param $id
     * @return string|\yii\web\Response
     * @throws \yii\base\Exception
     */
    public function actionUploadImage($id)
    {
        $model = new UploadForm();

        if (Yii::$app->request->isPost) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if ($model->upload($id)) {
                return $this->redirect(["view", 'id' => $id]);
            }
        }

        return $this->render('upload_image', ['model' => $model]);

    }
}
