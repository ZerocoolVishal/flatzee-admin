<?php

namespace app\controllers;

use app\models\Property;
use app\models\User;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\Appointment;
use app\models\Users;
use app\models\Enquiries;

class SiteController extends Controller
{

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {

        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {

        if(Yii::$app->user->isGuest) {
            $this->redirect(['site/login']);
        }

        /** Tables Data */
        $data['appointments'] = Appointment::find()->orderBy(['timestamp' => SORT_DESC])->limit(10)->all();
        $data['enquiries'] = Enquiries::find()->orderBy(['timestamp' => SORT_DESC])->limit(10)->all();

        /** Card Data */
        $data['appointmentsCount'] = Appointment::find()->where(['seen' => 0])->count();
        $data['totalProperties'] = Property::find()->count();
        $data['totalUsers'] = Users::find()->count();
        $data['conversion'] = floor(Appointment::find()->where(['status' => 4])->count() / Appointment::find()->count() * 100);

        return $this->render('index', $data);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->renderPartial('login2', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Enquiries action
     *
     * @return string
     */
    public function actionEnquiries()
    {
        $data['enquiries'] = Enquiries::find()->orderBy(['timestamp' => SORT_DESC])->all();

        return $this->render('enquiries', $data);
    }
}
