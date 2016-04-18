<?php
/* @var $this ImageController */
/* @var $model Image */
$lang = Yii::app()->session['session_lang'];
if (empty($lang)) {
    $lang = 'vi';
    Yii::app()->session['session_lang'] = strtolower($lang);
}
Yii::app()->language = $lang;
$this->menu = array(
    array('label' => Yii::t('image', 'upload_images'), 'url' => array('create')),
    array('label' => Yii::t('image', 'view_image'), 'url' => array('view', 'id' => $model->imageId)),
    array('label' => Yii::t('image', 'manage_images'), 'url' => array('admin')),
);
?>

<h1><?php echo Yii::t('image', 'update_images') . " " . $model->imageId; ?></h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>
