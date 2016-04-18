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
    array('label' => Yii::t('services', 'manage_services'), 'url' => array('admin')),
);
?>

<h2><?php echo Yii::t('services', 'create_services') ?></h2>

<?php $this->renderPartial('_form', array('model' => $model)); ?>