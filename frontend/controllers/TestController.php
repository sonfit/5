<?php

namespace frontend\controllers;
use yii\web\Controller;

class TestController extends Controller
{
    public function actionindex()
    {
//        echo 'tets';
        return $this->render('index');
    }

}
