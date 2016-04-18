<?php
/* @var $this CustomerController */
/* @var $model Customer */
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
        <?php echo $form->label($model, 'customerId'); ?>
        <?php echo $form->textField($model, 'customerId'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'customerName'); ?>
        <?php echo $form->textField($model, 'customerName', array('size' => 60, 'maxlength' => 200)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'description'); ?>
        <?php echo $form->textArea($model, 'description', array('rows' => 6, 'cols' => 50)); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton(Yii::t('common', 'search')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->