<?php

class ProductController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view', 'search', 'detail'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'actions' => array('admin', 'delete', 'deleteImage'),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $criteria = new CDbCriteria;
        $criteria->join = 'LEFT JOIN product_image C ON t.imageId=C.imageId';
        $criteria->condition = 'C.productId = ' . $id;
        $listImage = Image::model()->findAll($criteria);
        $this->render('view', array(
            'model' => $this->loadModel($id),
            'listImage' => $listImage,
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Product;
        $modelImage = new Image;
        $modelProductImage = new ProductImage;
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Product'])) {
            $model->attributes = $_POST['Product'];
            if ($model->save()) {

                $modelImage->attributes = $_POST['Image'];
                $images = CUploadedFile::getInstancesByName('images');
                if (isset($images) && count($images) > 0) {
                    foreach ($images as $image => $pic) {
                        if ($pic->saveAs(Yii::getPathOfAlias('webroot') . '/anhUpload/' . $pic->name)) {
                            $modelImage->setIsNewRecord(true);
                            $modelImage->imageId = null;
                            $modelImage->imageName = $pic->name;
                            $modelImage->imageUrl = 'anhUpload/' . $pic->name;
                            if (empty($imagesProduct)) {
                                $imagesProduct = 'anhUpload/' . $pic->name;
                            }
                            $modelImage->createDate = date("Y-m-d H:i:s");
                            $modelImage->save();
                        }
                        $modelProductImage->productId = $model->productId;
                        $modelProductImage->setIsNewRecord(true);
                        $modelProductImage->id = null;
                        $modelProductImage->imageId = $modelImage->getPrimaryKey();
                        $modelProductImage->save();
                    }
                }
                $model->findByPk($model->productId);
                $model->image = $imagesProduct;
                $model->save();
                $this->redirect(array('view', 'id' => $model->productId));
            }
        }

        $this->render('create', array(
            'model' => $model,
            'modelImage' => $modelImage,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);
        $criteria = new CDbCriteria;
        $criteria->join = 'LEFT JOIN product_image C ON t.imageId=C.imageId';
        $criteria->condition = 'C.productId = ' . $id;
        $modelImage = Image::model()->findAll($criteria);
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        if (isset($_POST['Product'])) {
            $modelImage = new Image;
            $modelProductImage = new ProductImage;
            $model->attributes = $_POST['Product'];
            if ($model->save()) {
                $modelImage->attributes = $_POST['Image'];
                $images = CUploadedFile::getInstancesByName('images');
                if (isset($images) && count($images) > 0) {
                    foreach ($images as $image => $pic) {
                        if ($pic->saveAs(Yii::getPathOfAlias('webroot') . '/anhUpload/' . $pic->name)) {
                            $modelImage->setIsNewRecord(true);
                            $modelImage->imageId = null;
                            $modelImage->imageName = $pic->name;
                            $modelImage->imageUrl = 'anhUpload/' . $pic->name;
                            if (empty($imagesProduct)) {
                                $imagesProduct = 'anhUpload/' . $pic->name;
                            }
                            $modelImage->createDate = date("Y-m-d H:i:s");
                            $modelImage->save();
                        }
                        $modelProductImage->productId = $model->productId;
                        $modelProductImage->setIsNewRecord(true);
                        $modelProductImage->id = null;
                        $modelProductImage->imageId = $modelImage->getPrimaryKey();
                        $modelProductImage->save();
                    }
                }
                $model->findByPk($model->productId);
                $model->image = $imagesProduct;
                $model->save();
                $this->redirect(array('view', 'id' => $model->productId));
            }
        }

        $this->render('update', array(
            'model' => $model,
            'modelImage' => $modelImage,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $model = $this->loadModel($id);
        $productId = $model->productId;
        $model->delete();
        Yii::app()->db->createCommand('DELETE FROM product_image WHERE productId=:id')->execute(array(':id' => $productId));
        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    public function actionDeleteImage() {
        if (isset($_POST['image_id'])) {
            Image::model()->deleteByPK($_POST['image_id']);
        }
    }

    public function actionSearch() {
        $model = new Product('search');
        $model->unsetAttributes();
        if (isset($_GET['search_key']))
            $model->productName = $_GET['search_key'];

        $this->render('search', array(
            'model' => $model,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Product('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Product']))
            $model->attributes = $_GET['Product'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Product the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Product::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Product $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'product-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}
