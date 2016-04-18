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

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'image-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
        'htmlOptions' => array('multiple' => 'multiple', 'enctype' => 'multipart/form-data'),
    ));
    ?>

    <p class="note"><?php echo Yii::t('common', 'fields_with') ?> (<span class="required">*</span>) <?php echo Yii::t('common', 'are_required') ?>.</p>

    <?php echo $form->errorSummary($model); ?>

    <?php if ($model->isNewRecord == FALSE) { ?>
        <?php echo CHtml::image(Yii::app()->request->baseUrl . '/anhUpload/' . $model->imageName, "imageName", array("width" => 200)); ?> 
        <div class="row">
            <?php echo $form->labelEx($model, 'imageName'); ?>
            <?php echo CHtml::activeFileField($model, 'imageName'); ?>  // by this we can upload image
            <?php echo $form->error($model, 'imageName'); ?>
        </div>
    <?php } else { ?>

        <div>
            <?php echo $form->hiddenField($model, 'imageUrl', array('type' => "hidden", 'size' => 2, 'maxlength' => 2)); ?>
        </div>
        <?php echo $form->labelEx($model, 'imageName'); ?>
        <?php
        $this->widget('CMultiFileUpload', array('name' => 'images',
            'model' => $model,
            'attribute' => 'image',
            'accept' => 'jpeg|jpg|gif|png', // useful for verifying files
            'duplicate' => 'Duplicate file!', // useful, i think
            'denied' => 'Invalid file type', // useful, i think
            'max' => 5,
            'htmlOptions' => array('multiple' => 'multiple', 'size' => 100),
        ));
        ?>
        <?php echo $form->error($model, 'imageName'); ?>
    <?php } ?>
    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('common', 'create') : Yii::t('common', 'save')); ?>
    </div>
    <?php $this->endWidget(); ?>   

</div>
<!-- form -->