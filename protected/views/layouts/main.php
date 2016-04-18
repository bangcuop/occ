<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />

        <!-- blueprint CSS framework -->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
        <!--[if lt IE 8]>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
        <![endif]-->

        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jcarousellite.min.js"></script>

        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    </head>

    <body>

        <div class="container" id="page">
            <?php
            $isFrontpage = false;
            if ((Yii::app()->controller->getId() . '/' . Yii::app()->controller->getAction()->getId()) == 'site/index') {
                $isFrontpage = true;
            }
            ?>
            <div id="mainmenu">
                <div id="menuContent">
                    <div id="logo"><?php echo CHtml::link(CHtml::image("images/logo.jpg"), array('/site/index')); ?></div>

                    <?php
                    if ($isFrontpage) {
                        SiteController::loadLanguage();
                        ?>
                        <div id="multi-language">
                            <div class="language <?php if (Yii::app()->language == 'en') echo "langSelected" ?>">
                                <?php echo CHtml::link(Yii::t('common', 'eng'), array('Site/Language', 'language' => 'en'), array('style' => 'text-decoration:none;'))
                                ?>
                            </div>
                            <div class="language <?php if (Yii::app()->language == 'vi') echo "langSelected" ?>">
                                <?php echo CHtml::link(Yii::t('common', 'vietnam'), array('Site/Language', 'language' => 'vi'), array('style' => 'text-decoration:none;')) ?>
                            </div>
                        </div>
                        <?php
                    } else {
                        ?>
                        <div id="search">
                            <?php echo CHtml::form(Yii::app()->createUrl('product/search'), 'get') ?>
                            <?php echo CHtml::textField('search_key', '', array('placeholder' => '...Tìm kiếm')) ?>
                            <?php echo CHtml::endForm() ?>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="menu">
                        <?php
                        $this->widget('zii.widgets.CMenu', array(
                            'items' => array(
                                array('label' => Yii::t('common', 'm_product'), 'url' => array('/product/index', 'view' => 'product')),
                                array('label' => Yii::t('common', 'm_service'), 'url' => array('/service/index', 'view' => 'service')),
                                array('label' => Yii::t('common', 'm_about'), 'url' => array('/site/page', 'view' => 'about')),
                                array('label' => Yii::t('common', 'm_contact'), 'url' => array('/site/contact')),
                            ),
                        ));
                        ?>
                    </div>

                </div>
            </div><!-- mainmenu -->
            <?php if (isset($this->breadcrumbs)): ?>
                <?php
                $this->widget('zii.widgets.CBreadcrumbs', array(
                    'links' => $this->breadcrumbs,
                ));
                ?><!-- breadcrumbs -->
            <?php endif ?>
            <?php
            if ($isFrontpage) {
                ?>
                <script>
                    $(document).ready(function() {
                        $("body").css('background', 'url("images/bg.jpg")');
                        $("#mainmenu").css('background', 'url("images/bg_menu.jpg")');
                    });
                </script>
                <?php
            } else {
                ?>
                <script>
                    $(document).ready(function() {
                        $("body").css('background', 'url("images/bg_inside.jpg")');
                        $("#mainmenu").css('background', 'url("images/bg_menu_inside.jpg")');
                    });
                </script>
                <?php
            }
            ?>
            <?php echo $content; ?>

            <div class="clear"></div>

            <div id="footer">
                <div id="footerContent">
                    <div class="footerLeft">
                        <span class="copyright">Copyright  &copy; 2012 OCC Co., ltd. All rights reserved.</span> </br>
                        <span class="style8"> a:</span> 9/8 Lang Ha Str., Ba Dinh Dist.,
                        Hanoi | <span class="style8">t:</span> 84.4. 37712153 <br /> <span
                            class="style8">e:</span> occvietnam@gmail.com <span class="style8">w:</span>
                        www.occ.com.vn | www.occ.vn
                    </div>
                    <div class="footerCenter">
                        <img src="images/footer1.jpg" width="186" height="50" border="0" usemap="#Map" />
                    </div>
                    <div class="footerRight">
                        <a href="#">Tải về Company Profile </a> <br /> Số người truy cập: 15.624<br />
                        Hiện đang online: 100 

                    </div>
                </div>
            </div>
            <!-- footer -->

        </div><!-- page -->

    </body>
</html>
