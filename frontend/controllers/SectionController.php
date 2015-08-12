<?php

namespace frontend\controllers;

use app\models\Section;
use app\models\SectionForm;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\core\TreeSection;


/**
 * Controller for admin layout
 * Class SectionController
 * @package frontend\controllers
 */
class SectionController extends Controller
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

        $tree = TreeSection::build();
        return $this->render('index', [
            'tree' => $tree
        ]);
    }


    public function actionEdit() {

        $id = Yii::$app->request->get('id');

        $this->getView()->title = 'Section Edit';

        $section = Section::get( $id );

        $form = new SectionForm();

        $form->title = $section->title;
        $form->alias = $section->alias;
        $form->parent = $section->parent;

        if ( $form->load( \Yii::$app->request->post() ) && $form->validate() ) {

            $section->title = $form->title;
            $section->alias = $form->alias;
            $section->parent = $form->parent;

            if ( !($id = $section->save()) ) {
                $error = !$id ? $section->errors : '';
                foreach( $error as $field => $msg )
                    Yii::$app->session->setFlash( 'error', implode( '\n', $msg ) );
            } else {
                return $this->redirect( ['index'] );
            }

        }

        return $this->render('edit', [
            'form' => $form,
            'section' => $section
        ]);
    }


}