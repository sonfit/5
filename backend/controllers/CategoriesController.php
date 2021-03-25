<?php

namespace backend\controllers;

use Yii;
use backend\models\Categories;
use backend\models\search\Categories as CategoriesSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\behaviors\SluggableBehavior;

/**
 * CategoriesController implements the CRUD actions for Categories model.
 */
class CategoriesController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'allow'=> true,
                        'roles' =>['@'],
                        'matchCallback'=>function($rule,$action){
                            $control = Yii::$app->controller->id;
                            $control = substr($control,0,4);
                            $action = Yii::$app->controller->action->id;
                            $role = $action.'-'.$control;
                            if(Yii::$app->user->can('index-cate')){
                                return true;
                            }
                        }
                    ]
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
        ];
    }

    /**
     * Lists all Categories models.
     * @return mixed
     */
    public function actionIndex()
    {
//        echo $a = Yii::$app->controller->id;
//        echo substr(Yii::$app->controller->id,0,4);die;
        $searchModel = new CategoriesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Categories model.
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
     * Creates a new Categories model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Categories();
        if ($model->load(Yii::$app->request->post())  ) {
            $model->created_at = time();
            $model->updated_at= time();
            if($model->save()){
                Yii::$app->session->addFlash('success','Thêm sản phẩm thành công');
                return $this->redirect(['index']);
            }else{
                Yii::$app->session->addFlash('danger','Thêm sản phẩm thất bại');
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Categories model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())  ) {
            $model->updated_at= time();
            if($model->save()){
                Yii::$app->session->addFlash('success','Thêm sản phẩm thành công');
                return $this->redirect(['index']);
            }else{
                Yii::$app->session->addFlash('danger','Thêm sản phẩm thất bại');
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Categories model.
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
     * Finds the Categories model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Categories the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Categories::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
