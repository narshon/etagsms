<p>&nbsp;</p>
<h3> <?php echo Definition::showCampaignTitle(); ?></h3>
<?php
if($this->beginCache("monocast", array('dependency'=>array(
        'class'=>'system.caching.dependencies.CDbCacheDependency',
        'sql'=>'SELECT MAX(date_subscribed) FROM sys_subscriber'),'duration'=>3600))) { 
    
    $id=Yii::app()->session->get('current_campaign');
    $filter = array('service_id'=>$id,'flag'=>1);
    $this->service=new ServiceComponent($this,"Subscriber");
    $this->service->showGridView("","Subscriber_monocast",$filter);

$this->endCache(); }
?>
<div id="monocast-send-div"></div>
