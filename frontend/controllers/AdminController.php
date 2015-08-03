<?php

namespace frontend\controllers;

use app\models\Section;
use app\models\TreeSection;
use Yii;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;


/**
 * Controller for admin layout
 * Class AdminController
 * @package frontend\controllers
 */
class AdminController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
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
        $this->layout = 'admin';
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

    public function actionIndex()
    {

        $section = Section::getByAlias( 'root' );

        // gen test tree
        if ( !$section ) {
            $root = Section::create( 'root', 0 );
            $a = Section::create( 'a', $root );
            $a1 = Section::create( 'a1', $a );
            $a2 = Section::create( 'a2', $a );
            $a3 = Section::create( 'a3', $a );
            $b = Section::create( 'b', $root );
            $b1 = Section::create( 'b1', $b );
            $b2 = Section::create( 'b2', $b );
        }



        return $this->render('index');
    }


    public function actionSection() {
        return $this->actionIndex();
    }


    public function actionTemplate() {
        return $this->actionIndex();
    }


    public function actionNews() {
        return $this->render('news');
    }


    public function actionCatalog() {
        return $this->actionIndex();
    }

}