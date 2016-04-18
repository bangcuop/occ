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
    array('label' => Yii::t('customer', 'create_customer'), 'url' => array('create')),
    array('label' => Yii::t('customer', 'view_customer'), 'url' => array('view', 'id' => $model->customerId)),
    array('label' => Yii::t('customer', 'manage_customer'), 'url' => array('admin')),
);
?>

<h1> <?php echo Yii::t('customer', 'update_customer') . " " . $model->customerId; ?></h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>