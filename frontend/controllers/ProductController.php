<?php

namespace frontend\controllers;
use backend\models\Categories;
use backend\models\Product;
use yii\data\ActiveDataProvider;
use yii\data\Pagination;
use yii\web\Controller;


/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller
{
    public function actionIndex(){
        return $this->render('index');
    }

    public function actionView($slug)
    {
        $model = Product::findOne(['prod_slug'=>$slug]);
        return $this->render('view', [
            'model' => $model,
        ]);
    }
    public function actionCategories($slug){
        return $this->render('categories');
    }


}
