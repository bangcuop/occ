<?php

$lang = Yii::app()->session['session_lang'];
if (empty($lang)) {
    $lang = 'vi';
    Yii::app()->session['session_lang'] = strtolower($lang);
}
Yii::app()->language = $lang;
/* $this->widget('zii.widgets.grid.CGridView', array(
  'id'=>'product-grid',
  'dataProvider'=>$model->search(),
  //'filter'=>$model,
  'columns'=>array(
  'productName',
  'description',
  ),
  )); */

$this->widget('zii.widgets.CListView', array(
    'dataProvider' => $model->search(),
    'itemView' => '_viewSearch',
    'itemsTagName' => 'div',
    'itemsCssClass' => 'listService',
    'summaryText' => ''
));
?>