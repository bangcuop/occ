<?php
/* @var $this ProductController */
/* @var $model Product */
$lang = Yii::app()->session['session_lang'];
if (empty($lang)) {
    $lang = 'vi';
    Yii::app()->session['session_lang'] = strtolower($lang);
}
Yii::app()->language = $lang;
$this->menu = array(
    array('label' => Yii::t('product', 'manage_product'), 'url' => array('admin')),
);
?>
<h2><?php echo Yii::t('product', 'create_product')?></h2>

<?php $this->renderPartial('_form', array('model' => $model, 'modelImage' => $modelImage)); ?>