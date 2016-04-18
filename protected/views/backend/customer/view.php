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
    array('label' => Yii::t('customer', 'manage_customer'), 'url' => array('admin')),
);
?>
<h1><?php echo Yii::t('customer', 'view_customer') ?></h1>
<div class="listProducts">
    <?php
    $list = Product::model()->findAll("customerId=" . $model->customerId);
    foreach ($list as $d) {
        if (!empty($d->image)) {
            $image = $d->image;
        } else {
            $image = "images/noimage.jpg";
        }
        ?>

        <div class="productItem">
            <div class="imageBox">
                <?php echo CHtml::image($image, "", array('width' => 170, 'height' => 130)); ?>
            </div>
            <div class="desBox">
                <span class="title"><?php echo CHtml::link(CHtml::encode($d->productName), array('product/update', 'id' => $d->productId)); ?></span> </br>
                Department of Science and
                Technology of Gia Lai
                Ho tieu Chu Se Brrading system
            </div>
        </div>

        <?php
    }
    ?>
</div>
