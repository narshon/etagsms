<p>&nbsp;</p>
<div id="home-title"><h3> <?php echo Definition::model()->showCampaignTitle(); ?> </h3></div>
<div id="view-title"></div>
<div id="view-details">
<?php

if($this->beginCache("managesubs", array('dependency'=>array(
        'class'=>'system.caching.dependencies.CDbCacheDependency',
        'sql'=>'SELECT MAX(date_subscribed) FROM sys_subscriber'),'duration'=>3600))) { 
 
 $id = Yii::app()->session->get('current_campaign');
 
 print '<div  class="view">';
        $this->renderPartial('../subscriber/admin',(array('model_id'=>$id)),false,true);
print  "</div>";

$this->endCache(); }

?>
</div>