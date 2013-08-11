<p>&nbsp;</p>
<div id="home-title"><h3> <?php echo Definition::model()->showCampaignTitle(); ?> </h3></div>
<div id="view-title">Scheduled SMS Broadcasts</div>
<div id="view-details">
<?php
if($this->beginCache("scheduledbroadcast", array('dependency'=>array(
        'class'=>'system.caching.dependencies.CDbCacheDependency',
        'sql'=>'SELECT MAX(id) FROM sys_queue')))) {
    
$id = Yii::app()->session->get('current_campaign');

 print '<div id="incoming-sms-stream" class="view">';
          //incoming-sms-stream
          $filter =  Queue::getSMSfilter($id);
          $filter['msg_status']= "pending";
        $this->renderPartial('../queue/admin',(array('campaign_id'=>$id,'queue_type'=>'broadcast','filter'=>$filter)),false,true);
print  "</div>";

$this->endCache(); }
?>
</div>
