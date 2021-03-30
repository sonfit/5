<?php

namespace frontend\controllers;
use backend\models\Categories;
use yii\web\Controller;
use backend\models\Brand;


/**
 * ProductController implements the CRUD actions for Product model.
 */
class CategoriesController extends Controller
{

    public function actionView($slug)
    {
        $model = Categories::findOne(['cate_slug'=>$slug]);
        return $this->render('view', [
            'model' => $model,
        ]);
    }


}
