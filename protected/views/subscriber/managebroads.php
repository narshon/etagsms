<p>&nbsp;</p>
<div id="home-title"><h3> <?php echo Definition::model()->showCampaignTitle(); ?> </h3></div>
<div id="view-title"></div>
<div id="view-details">
<?php
/*
if($this->beginCache("managebroads", array('dependency'=>array(
        'class'=>'system.caching.dependencies.CDbCacheDependency',
        'sql'=>'SELECT MAX(id) FROM sys_broadcast'),'duration'=>3600))) { */
    
$id = Yii::app()->session->get('current_campaign');

 print '<div  class="view">';
        $this->renderPartial('../broadcast/admin',array(),false,true);
print  "</div>";

// $this->endCache(); }
?>
</div>