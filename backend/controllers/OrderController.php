<?php

namespace backend\controllers;

use backend\models\Deliver;
use backend\models\OrderDetail;
use backend\models\Payment;
use backend\models\Quanhuyen;
use backend\models\Tinhthanhpho;
use backend\models\Xaphuongthitran;
use common\models\User;
use phpDocumentor\Reflection\Types\Parent_;
use Yii;
use backend\models\Order;
use backend\models\search\Order as OrderSearch;
use backend\models\search\OrderDetail as OrderDetailSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * OrderController implements the CRUD actions for Order model.
 */
class OrderController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Order models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new OrderSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Order model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $searchModel = new OrderDetailSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $id);
        return $this->renderAjax('view', [
            'model' => $this->findModel($id),
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Order model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Order();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->order_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Order model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $searchModel = new User();

        $model = $this->findModel($id);
        $payment = new Payment();
        $payment = ArrayHelper::map($payment->getAllPayment(),'pay_id','pay_name');

        $deliver = new Deliver();
        $deliver = ArrayHelper::map($deliver->getAllDeliver(),'deliver_id','deliver_name');

        $province = new Tinhthanhpho();
        $province = ArrayHelper::map($province->getAllProvince(),'matp','name');

        $dictrict = new Quanhuyen();
        $dictrict = ArrayHelper::map($dictrict->getAllDictrict(),'maqh','name');

        $ward = new Xaphuongthitran();
        $ward = ArrayHelper::map($ward->getAllWards(),'xaid','name');
        $model->updated_at= time();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            return $this->redirect(['index', 'id' => $model->order_id]);
        }

        return $this->render('update', [
            'model' => $model,
            'payment' =>$payment,
            'deliver' => $deliver,
            'province'=> $province,
            'dictrict' => $dictrict,
            'ward'=> $ward,
            'searchModel' => $searchModel,
        ]);
    }

    /**
     * Deletes an existing Order model.
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
     * Finds the Order model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Order the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Order::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function getStatus(){

    }
}
