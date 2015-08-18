<?php

namespace app\modules\content\controllers;


class AdminController extends \yii\web\Controller
{


    public function actionIndex()
    {

        return $this->render('index', []);
    }

}