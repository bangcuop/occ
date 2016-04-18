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
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#customer-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h2> <?php echo Yii::t('customer', 'manage_customer') ?></h2>

<?php echo CHtml::link(Yii::t('common', 'advanced_search'), '#', array('class' => 'search-button')); ?>
<div class="search-form" style="display:none">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</div><!-- search-form -->

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'customer-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'customerName',
        'description',
        array(
            'class' => 'CButtonColumn',
        ),
    ),
));
?>
