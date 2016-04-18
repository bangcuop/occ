<?php
/* @var $this ServiceController */
/* @var $model Service */
$lang = Yii::app()->session['session_lang'];
if (empty($lang)) {
    $lang = 'vi';
    Yii::app()->session['session_lang'] = strtolower($lang);
}
Yii::app()->language = $lang;

$this->menu = array(
    array('label' => Yii::t('services','create_services'), 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#service-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h2><?php echo Yii::t('services','manage_services')?></h2>

<?php echo CHtml::link(Yii::t('common','advanced_search'), '#', array('class' => 'search-button')); ?>
<div class="search-form" style="display:none">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</div><!-- search-form -->

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'service-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'serviceName',
        'description',
        array(
            'class' => 'CButtonColumn',
        ),
    ),
));
?>
