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

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'product-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
        'htmlOptions' => array('multiple' => 'multiple', 'enctype' => 'multipart/form-data'),
    ));
    ?>

    <p class="note"><?php echo Yii::t('common', 'fields_with') ?> (<span class="required">*</span>) <?php echo Yii::t('common', 'are_required') ?>.</p>

    <?php echo CHtml::errorSummary(array($model)); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'productName'); ?>
        <?php echo $form->textField($model, 'productName', array('size' => 60, 'maxlength' => 200)); ?>
        <?php echo $form->error($model, 'productName'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'description'); ?>
        <?php echo $form->textArea($model, 'description', array('rows' => 6, 'cols' => 50)); ?>
        <?php echo $form->error($model, 'description'); ?>
    </div>

    <?php if ($model->isNewRecord == FALSE) { ?>
        <ul id="productImages">
            <?php foreach ($modelImage as $modelImageValue) { ?>
                <li>
                    <?php echo CHtml::image(Yii::app()->request->baseUrl . '/anhUpload/' . $modelImageValue->imageName, "imageName", array("width" => 50)); ?> 
                    <span class="deleteImage" imageId="<?php echo $modelImageValue->imageId; ?>"><?php echo Yii::t('common', 'del') ?></span> 
                </li>
            <?php } $modelImageTemp = new Image(); ?>
        </ul>
        <?php echo $form->hiddenField($modelImageTemp, 'imageUrl', array('type' => "hidden", 'size' => 2, 'maxlength' => 2)); ?>
        <div class="row">
            <?php echo $form->labelEx($modelImageTemp, 'imageName'); ?>
            <?php
            $this->widget('CMultiFileUpload', array('name' => 'images',
                'model' => $modelImageTemp,
                'attribute' => 'image',
                'accept' => 'jpeg|jpg|gif|png', // useful for verifying files
                'duplicate' => 'Duplicate file!', // useful, i think
                'denied' => 'Invalid file type', // useful, i think
                'max' => 5,
                'htmlOptions' => array('multiple' => 'multiple', 'size' => 100),
            ));
            ?>
            <?php echo $form->error($modelImageTemp, 'imageName'); ?>
        </div>
    <?php } else { ?>
        <?php echo $form->hiddenField($modelImage, 'imageUrl', array('type' => "hidden", 'size' => 2, 'maxlength' => 2)); ?>
        <div class="row">
            <?php echo $form->labelEx($modelImage, 'imageName'); ?>
            <?php
            $this->widget('CMultiFileUpload', array('name' => 'images',
                'model' => $modelImage,
                'attribute' => 'image',
                'accept' => 'jpeg|jpg|gif|png', // useful for verifying files
                'duplicate' => 'Duplicate file!', // useful, i think
                'denied' => 'Invalid file type', // useful, i think
                'max' => 5,
                'htmlOptions' => array('multiple' => 'multiple', 'size' => 100),
            ));
            ?>
            <?php echo $form->error($modelImage, 'imageName'); ?>
        </div>
    <?php } ?>
    <div class="row">
        <?php echo $form->labelEx($model, 'serviceId'); ?>
        <?php $list = CHtml::listData(Service::model()->findAll(), 'serviceId', 'serviceName'); ?>
        <?php echo $form->dropDownList($model, 'serviceId', $list, array('empty' => '(Select a Service)')); ?>
        <?php echo $form->error($model, 'serviceId'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'customerId'); ?>
        <?php $list = CHtml::listData(Customer::model()->findAll(), 'customerId', 'customerName'); ?>
        <?php echo $form->dropDownList($model, 'customerId', $list, array('empty' => '(Select a Custiomer)')); ?>
        <?php echo $form->error($model, 'customerId'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('common', 'create') : Yii::t('common', 'save')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->


<?php Yii::app()->clientScript->registerScript('helpers', '
        baseUrl = ' . CJSON::encode(Yii::app()->getBaseUrl(true)) . ';
'); ?>
<script>
    $(document).ready(function() {
        $("span.deleteImage").click(function() {
            if (confirm("Bạn có muốn xóa Image này?")) {
                var parent = $(this).parent();
                var image_id = $(this).attr('imageId');
                $.ajax({
                    type: "POST",
                    url: baseUrl + '/index.php?r=product/deleteImage',
                    data: {image_id: image_id},
                    success: function(html) {
                        parent.remove();
                    }
                });
            } else {
                return;
            }

        });
    });

</script>
