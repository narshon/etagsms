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
    <?php
	$cs=Yii::app()->clientScript;
	$cs->registerCoreScript('jquery');
	$cs->registerScriptFile(Yii::app()->request->baseUrl.'/js/jsLib.js');	
	?>
	
	<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/fusioncharts/JSClass/FusionCharts.js'); ?>
	
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->

	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index')),
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by KEMRI - Wellcome Trust Research Programme<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->
<script type="text/javascript">
//Document.Ready - Start of jquery execution
$(document).ready(function(){
    
   //hide all hidden portlets
    //get left portlets count
    var leftPortletsCount='<?php echo Yii::app()->session->get("portletCount_left"); Yii::app()->session->remove("portletCount_left"); ?>';
    if(leftPortletsCount >= 1){
       for(i=0; i<leftPortletsCount; i++){
          $("div#portlet_partial_left_"+i).hide("slow");  
       }
       
    }
    
     //get right portlets count
    var rightPortletsCount='<?php echo Yii::app()->session->get("portletCount_right"); Yii::app()->session->remove("portletCount_right"); ?>';
    
    if(rightPortletsCount >= 1){
       for(i=0; i<rightPortletsCount; i++){
          $("div#portlet_partial_right_"+i).hide("slow");  
       } 
    }
    
    
});

</script>


</body>
</html>