<?php
/* @var $this ServiceController */
$lang = Yii::app()->session['session_lang'];
if (empty($lang)) {
    $lang = 'vi';
    Yii::app()->session['session_lang'] = strtolower($lang);
}
Yii::app()->language = $lang;
$this->breadcrumbs = array(
    'Service',
);
?>
<div class="leftSpace"></div>
<div class="columnLeft">
    <ul class="listServiceImage">
        <li><?php echo CHtml::image("images/dv1.jpg", "", array('width' => 103, 'height' => 103)); ?></li>
        <li><?php echo CHtml::image("images/dv2.jpg", "", array('width' => 103, 'height' => 103)); ?></li>
        <li><?php echo CHtml::image("images/dv3.jpg", "", array('width' => 103, 'height' => 103)); ?></li>
        <li><?php echo CHtml::image("images/dv4.jpg", "", array('width' => 103, 'height' => 103)); ?></li>
        <li><?php echo CHtml::image("images/dv5.jpg", "", array('width' => 103, 'height' => 103)); ?></li>
        <li><?php echo CHtml::image("images/dv6.jpg", "", array('width' => 103, 'height' => 103)); ?></li>
        <li><?php echo CHtml::image("images/dv7.jpg", "", array('width' => 103, 'height' => 103)); ?></li>
        <li><?php echo CHtml::image("images/dv8.jpg", "", array('width' => 103, 'height' => 103)); ?></li>
        <li><?php echo CHtml::image("images/dv9.jpg", "", array('width' => 103, 'height' => 103)); ?></li>
        <li><?php echo CHtml::image("images/dv10.jpg", "", array('width' => 103, 'height' => 103)); ?></li>

    </ul>
</div>
<div class="columnRight">
    <p><?php echo Yii::t('services','service_msg00001')?>.</p>
    <?php
    $this->widget('zii.widgets.CListView', array(
        'dataProvider' => $dataProvider,
        'itemView' => '_view',
        'itemsTagName' => 'ul',
        'itemsCssClass' => 'listService',
        'summaryText' => ''
    ));
    ?>
</div>
