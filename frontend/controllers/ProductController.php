<?php

namespace frontend\controllers;
use backend\models\Product;
use yii\web\Controller;


/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller
{

    public function actionView($slug)
    {

        $model = Product::findOne(['prod_slug'=>$slug]);
        return $this->render('view', [
            'model' => $model,
        ]);
    }


}
