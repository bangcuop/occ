<?php
/* @var $this ProductController */
/* @var $model Product */
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
        'method' => 'get',
    ));
    ?>


    <div class="row">
        <?php echo $form->label($model, 'productName'); ?>
        <?php echo $form->textField($model, 'productName', array('size' => 60, 'maxlength' => 200)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'description'); ?>
        <?php echo $form->textArea($model, 'description', array('rows' => 6, 'cols' => 50)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'serviceName'); ?>
        <?php echo $form->textField($model, 'serviceName'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'customerName'); ?>
        <?php echo $form->textField($model, 'customerName'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton(Yii::t('common', 'search')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->