<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
              
	</div><!-- header -->
        <div align="right"><?php $this->widget('ext.LangPick.ELangPick', array('htmlOptions' => array(
                    'class'=>'div.portlet-content',),));?>
        </div>
	<div id="mainmenu">
                 
		<?php 
                $user = Yii::app()->user; 
                $this->widget('zii.widgets.CMenu',array(
                'items'=>array(
           	array('label'=>Yii::t('strings', 'Home'), 'url'=>array('/site/index')),
                array('label'=>Yii::t('strings', 'About'), 'url'=>array('/site/page', 'view'=>'about')),
		array('label'=>Yii::t('strings', 'Contact'), 'url'=>array('/site/contact')),
                    
                array('label'=>Yii::t('strings', 'Vehicles'), 'url'=>array('/vehicle/admin'), 'visible'=>Yii::app()->user->checkAccess('Admin') &&!Yii::app()->user->isGuest),
                array('label'=>Yii::t('strings', 'Service'), 'url'=>array('/vehicleService/admin'), 'visible'=>Yii::app()->user->checkAccess('Admin') &&!Yii::app()->user->isGuest),
                array('label'=>Yii::t('strings', 'Shift'), 'url'=>array('/vehicleShift/create'), 'visible'=>!Yii::app()->user->checkAccess('Admin') && !Yii::app()->user->isGuest ),
                array('label'=>Yii::t('strings', 'Shift'), 'url'=>array('/vehicleShift/admin'), 'visible'=>Yii::app()->user->checkAccess('Admin')),
                array('label'=>Yii::t('strings', 'Sectors'), 'url'=>array('/sectorEkab/admin'), 'visible'=>Yii::app()->user->checkAccess('Admin') && !Yii::app()->user->isGuest),
               
                //main menu access to users & rights extensions
                array('label'=>Yii::t('strings', 'Users'), 'url'=>array('/user/admin'), 'visible'=>Yii::app()->user->checkAccess('Admin') && !Yii::app()->user->isGuest),
                array('label'=>Yii::t('strings', 'Rights'), 'url'=>array('/rights'), 'visible'=>Yii::app()->user->checkAccess('Admin') && !Yii::app()->user->isGuest),
                array('url'=>Yii::app()->getModule('user')->loginUrl, 'label'=>Yii::app()->getModule('user')->t("Login"), 'visible'=>Yii::app()->user->isGuest),
                array('url'=>Yii::app()->getModule('user')->registrationUrl, 'label'=>Yii::app()->getModule('user')->t("Register"), 'visible'=>Yii::app()->user->isGuest),
                array('url'=>Yii::app()->getModule('user')->profileUrl, 'label'=>Yii::app()->getModule('user')->t("Profile"), 'visible'=>!Yii::app()->user->isGuest),
                array('url'=>Yii::app()->getModule('user')->logoutUrl, 'label'=>Yii::app()->getModule('user')->t("Logout").' ('.Yii::app()->user->name.')', 'visible'=>!Yii::app()->user->isGuest),
		     
               
		),
                
		)); ?>
           
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> EKAB.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
