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
    array('label' => Yii::t('image','manage_images'), 'url' => array('admin')),
);
?>

<h2><?php echo Yii::t('image','create_images')?></h2>

<?php $this->renderPartial('_form', array('model' => $model)); ?>