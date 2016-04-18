<?php
/* @var $this SiteController */
$lang = Yii::app()->session['session_lang'];
if (empty($lang)) {
    $lang = 'vi';
    Yii::app()->session['session_lang'] = strtolower($lang);
}
Yii::app()->language = $lang;
$this->pageTitle = Yii::app()->name . ' - About';
$this->breadcrumbs = array(
    'About',
);
?>
<div class="leftSpace"></div>
<div class="aboutBox">
    <span><?php echo Yii::t('about', 'tam_nhin'); ?></span></br>
    <img width="165" height="50" src="images/gt1.jpg"></br>
    <?php echo Yii::t('about', 'tn_message00001'); ?>: <br>
    <?php echo Yii::t('about', 'tn_message00002'); ?><br>
    <?php echo Yii::t('about', 'tn_message00003'); ?>.
</div>

<div class="aboutBox">
    <span><?php echo Yii::t('about', 'cam_ket'); ?></span></br>
    <img width="165" height="50" src="images/gt2.jpg"></br>
    <?php echo Yii::t('about', 'ck_message00001'); ?>.
</div>

<div class="aboutBox">
    <span><?php echo Yii::t('about', 'gia_tri'); ?></span>
    <img width="165" height="50" src="images/gt3.jpg"></br>
    <?php echo Yii::t('about', 'gt_message00001'); ?>.
</div>

<div class="aboutBox">
    <span><strong><?php echo Yii::t('about', 'chung_toi_la_ai'); ?>?</strong></span></br>
    <?php echo Yii::t('about', 'ctla_message00001'); ?>.<br>
    <?php echo Yii::t('about', 'ctla_message00002'); ?>.<br>
    <?php echo Yii::t('about', 'ctla_message00003'); ?>.<br>
    <?php echo Yii::t('about', 'ctla_message00004'); ?>.</td>
</div>