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
    array('label' => Yii::t('image', 'update_images'), 'url' => array('update', 'id' => $model->imageId)),
    array('label' => Yii::t('image', 'delete_images'), 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->imageId), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => Yii::t('image', 'manage_images'), 'url' => array('admin')),
);
?>
<div style="width: 500px">
    <h1><?php echo Yii::t('image', 'view_image') . " " . $model->imageId; ?></h1>
    <?php
    $this->widget('zii.widgets.CDetailView', array(
        'data' => $model,
        'attributes' => array(
            'imageName',
            array(
                'name' => 'imageUrl',
                'value' => CHtml::link(Yii::app()->getBaseUrl(true) . "/" . $model->imageUrl),
                'type' => 'raw'
            ),
            array(
                'name' => 'createDate',
                'value' => CHtml::encode(date("d/m/Y", strtotime($model->createDate)))
            ),
            array(
                'value' => Yii::app()->request->baseUrl . '/anhUpload/' . $model->imageName, "imageName",
                'type' => 'image',
                'size' => '500px',
            ),
        ),
    ));
    ?>
</div>

