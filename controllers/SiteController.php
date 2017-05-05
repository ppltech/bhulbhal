<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\UmsUser;
use yii\web\Session;

class SiteController extends Controller
{
    /**
     * @inheritdoc
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
     * @inheritdoc
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
    	$this->layout='login';
    	$model = new UmsUser();
    	
    	if ($model->load(Yii::$app->request->post())) {
    		if($this->loginCheck($model->username,$model->password)){
    			return $this->redirect(Yii::$app->request->baseUrl.'/dashboard');
    		}else{
    			return $this->redirect('Yii::$app->request->baseUrl');
    		}
    	} else {
    		return $this->render('index');
    	}
        
    }
    
    private function loginCheck($usernae,$password){
    	$model=UmsUser::find()->joinWith('umsUserRoleMaps')->where(['username'=>$usernae])->one();
    	if($model!=''){
    		if($model->password==md5($password)){
    			$session = new Session();
    			$session->open();
    			//
    			$session['loggedUser']=$model;
    			return true;
    		}
    	}else{
    		return false;
    	}
    }

    
    /**
     * Login action.
     *
     * @return string
     
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }
*/
    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogoff(){
    	$session = new Session();
    	$session->open();
    	$session['loggedUser']='';
    	return $this->redirect(Yii::$app->request->baseUrl.'/site');
    }
    public function actionLogout()
    {
    	$this->layout='ums';
        //Yii::$app->user->logout();
        //
    	
    	return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
