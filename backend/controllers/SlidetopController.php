<?php

namespace backend\controllers;

use Yii;
use backend\models\Homepages;
use backend\models\search\Homepages as HomepagesSearch;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\Html;

/**
 * SlidetopController implements the CRUD actions for Homepages model.
 */
class SlidetopController extends Controller
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
     * Lists all Homepages models.
     * @return mixed
     */
    public function actionIndex()
    {
        $data = new Homepages();
        $data = $data->getSlide();
        $data = json_decode($data,true);
        $data = array('dataArr'=>$data);

        $searchModel = new HomepagesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index1', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'dataArr'=>$data
        ]);

    }

    /**
     * Displays a single Homepages model.
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
     * Creates a new Homepages model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {

        $model = new Homepages();
        $url = Url::home();

        $post = Yii::$app->request->post();
        $data = new Homepages();
        $data = $data->getSlide();

        //giải mã Json
        $data = json_decode($data,true);
        if($data == null){
            echo 'Dư liệu trống';
            $data = array();
        }

        if($post){
            $model->file = UploadedFile::getInstance($model,'file');
            if($model->file){
                $model->file->saveAs('../../uploads/banner/'.$model->file->name);
                $model->file = $model->file->name;
            }
            // Lấy dữ liệu từ view
            $slide_title = $post['slide_title'];
            $slide_des = $post['slide_des'];
            $slide_button_link = $post['slide_button_link'];
            $slide_button_text = $post['slide_button_text'];
            $slide_image = $model->file;

            $slide = array(
                'slide_title' =>$slide_title,
                'slide_des' =>$slide_des,
                'slide_button_link' =>$slide_button_link,
                'slide_button_text' =>$slide_button_text,
                'slide_image' =>$slide_image,
            );
            array_push($data,$slide);
            // Mã hóa Json
            $data = json_encode($data);
            if($model->save(false)){
                return $this->redirect(['index']);
            }else{
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
     * Updates an existing Homepages model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $post = Yii::$app->request->post();
        $data = new Homepages();
        $data = $data->getSlide();

        //giải mã Json
        $data = json_decode($data,true);
        if($data == null){
            $data = array();
        }

        if($post) {
            $model->file = UploadedFile::getInstance($model, 'file');
            if ($model->file) {
                $model->file->saveAs('../../uploads/banner/' . $model->file->name);
                $model->file = $model->file->name;
            }
            // Lấy dữ liệu từ view
            $model->slide_title = $post['slide_title'];
            $model->slide_des = $post['slide_des'];
            $model->slide_button_link = $post['slide_button_link'];
            $model->slide_button_text = $post['slide_button_text'];
            $model->file = 'localhost/5/uploads/banner/' . $model->file;

            $slide = array(
                'slide_title' => $model->slide_title,
                'slide_des' => $model->slide_des,
                'slide_button_link' => $model->slide_button_link,
                'slide_button_text' => $model->slide_button_text,
                'slide_image' =>   $model->file,
            );
            array_push($data, $slide);
            // Mã hóa Json
            $data = json_encode($data);
            $model->home_value = $data;
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->home_id]);
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Homepages model.
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
     * Finds the Homepages model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Homepages the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Homepages::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
