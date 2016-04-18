<?php
/* @var $this ImageController */
/* @var $model Image */
/* @var $form CActiveForm */
$lang = Yii::app()->session['session_lang'];
if (empty($lang)) {
    $lang = 'vi';
    Yii::app()->session['session_lang'] = strtolower($lang);
}
Yii::app()->language = $lang;
?>

<div class="wide form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'action' => Yii::app()->createUrl($this->route),
        'method' => 'get'
    ));
    ?>

    <div class="row">
        <?php echo $form->label($model, 'imageName'); ?>
        <?php echo $form->textField($model, 'imageName', array('size' => 60, 'maxlength' => 200)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'imageUrl'); ?>
        <?php echo $form->textField($model, 'imageUrl', array('size' => 60, 'maxlength' => 200)); ?>
    </div>
    <div class="row">
        <?php echo $form->label($model, 'createDate'); ?>
        <?php echo $form->textField($model, 'createDate'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton(Yii::t('common', 'search')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div>
<!-- search-form -->