<?php
/* @var $this CustomerController */
/* @var $model Customer */
$lang = Yii::app()->session['session_lang'];
if (empty($lang)) {
    $lang = 'vi';
    Yii::app()->session['session_lang'] = strtolower($lang);
}
Yii::app()->language = $lang;
$this->menu = array(
    array('label' => Yii::t('customer', 'manage_customer'), 'url' => array('admin')),
);
?>

<h2><?php echo Yii::t('customer', 'create_customer') ?></h2>

<?php $this->renderPartial('_form', array('model' => $model)); ?>