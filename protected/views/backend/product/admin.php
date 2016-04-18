
<?php
$lang = Yii::app()->session['session_lang'];
if (empty($lang)) {
    $lang = 'vi';
    Yii::app()->session['session_lang'] = strtolower($lang);
}
Yii::app()->language = $lang;
/* @var $this ProductController */
/* @var $model Product */

$this->menu = array(
    array('label' => Yii::t('product', 'create_product'), 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#product-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<h2><?php echo Yii::t('product', 'manage_product') ?></h2>
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
    'id' => 'product-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'productName',
        'description',
        'service.serviceName',
        'customer.customerName',
        array(
            'class' => 'CButtonColumn',
        ),
    ),
));
?>
