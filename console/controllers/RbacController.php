<?php
namespace console\controllers;
use Yii;

use yii\console\Controller;

class RbacController extends Controller
{
    public  function actionInit(){
        $auth = \Yii::$app->authManager;

        $createCate = $auth->createPermission('create-cate');
//        $createCate->description = 'Create a category';
//        $auth->add($createCate);

        $viewCate = $auth->createPermission('view-cate');
//        $viewCate->description = 'View a category';
//        $auth->add($viewCate);
//
        $updateCate = $auth->createPermission('update-cate');
//        $updateCate->description = 'Update a category';
//        $auth->add($updateCate);
//
        $indexCate = $auth->createPermission('index-cate');
//        $indexCate->description = 'Index a category';
//        $auth->add($indexCate);
//
        $deleteCate = $auth->createPermission('delete-cate');
//        $deleteCate->description = 'Delete a category';
//        $auth->add($deleteCate);

        //Thêm nhóm quyền
        $cateManage = $auth->createRole('manage-cate');
//        $auth->add($cateManage);

        //Gán quyền cho nhóm
//        $auth->addChild($cateManage,$indexCate);
//        $auth->addChild($cateManage,$createCate);
//        $auth->addChild($cateManage,$viewCate);
//        $auth->addChild($cateManage,$updateCate);
//        $auth->addChild($cateManage,$deleteCate);



        $createProd = $auth->createPermission('create-prod');
        $createProd->description = 'Create a product';
//        $auth->add($createProd);

        $viewProd = $auth->createPermission('view-prod');
        $viewCate->description = 'View a product';
//        $auth->add($viewProd);
//
        $updateProd = $auth->createPermission('update-prod');
        $updateProd->description = 'Update a product';
//        $auth->add($updateProd);
//
        $indexProd = $auth->createPermission('index-prod');
        $indexProd->description = 'Index a product';
//        $auth->add($indexProd);
//
        $deleteProd = $auth->createPermission('delete-prod');
        $deleteProd->description = 'Delete a product';
//        $auth->add($deleteProd);

        //Thêm nhóm quyền
        $prodManage = $auth->createRole('manage-prod');
//        $auth->add($prodManage);
        $admin = $auth->createRole('admin');
//        $auth->add($admin);

        //Gán quyền cho nhóm
//        $auth->addChild($prodManage,$indexProd);
//        $auth->addChild($prodManage,$createProd);
//        $auth->addChild($prodManage,$viewProd);
//        $auth->addChild($prodManage,$updateProd);
//        $auth->addChild($prodManage,$deleteProd);
//        $auth->addChild($admin,$prodManage);
//        $auth->addChild($admin,$cateManage);


        //Gán cho người dùng
        $auth->assign($cateManage,5);
        $auth->assign($prodManage,4);
        $auth->assign($admin,3);

    }

}
?>
