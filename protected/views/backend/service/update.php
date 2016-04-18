<?php
/* @var $this ServiceController */
/* @var $model Service */
$lang = Yii::app()->session['session_lang'];
if (empty($lang)) {
    $lang = 'vi';
    Yii::app()->session['session_lang'] = strtolower($lang);
}
Yii::app()->language = $lang;
$this->menu = array(
    array('label' => Yii::t('services', 'create_services'), 'url' => array('create')),
    array('label' => Yii::t('services', 'view_services'), 'url' => array('view', 'id' => $model->serviceId)),
    array('label' => Yii::t('services', 'manage_services'), 'url' => array('admin')),
);
?>

<h1><?php echo Yii::t('services', 'update_services') . " " . $model->serviceId; ?></h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>