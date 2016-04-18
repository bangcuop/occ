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
    array(
        'label' => Yii::t('image', 'upload_images'), 'url' => array('create'),
    )
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#image-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h2><?php echo Yii::t('image', 'manage_images') ?></h2>

<?php echo CHtml::link(Yii::t('common', 'advanced_search'), '#', array('class' => 'search-button')); ?>
<div class="search-form" style="display: none">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model
    ));
    ?>
</div>
<!-- search-form -->

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'image-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'imageName',
        array(
            'name' => 'imageUrl',
            'value' => 'CHtml::link(Yii::app()->getBaseUrl(true) . "/" . $data->imageUrl)',
            'type' => 'raw'
        ),
        array(
            'name' => 'createDate',
            'value' => 'date("d/m/Y",strtotime($data->createDate))',
        ),
        array(
            'class' => 'CButtonColumn'
        )
    )
));
?>