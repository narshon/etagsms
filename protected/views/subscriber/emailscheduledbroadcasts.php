<p>&nbsp;</p>
<div id="home-title"><h3> <?php echo Definition::model()->showCampaignTitle(); ?> </h3></div>
<div id="view-title">Scheduled E-mail Broadcasts</div>
<div id="view-details">
<?php
if($this->beginCache("emailscheduledbroadcast", array('dependency'=>array(
        'class'=>'system.caching.dependencies.CDbCacheDependency',
        'sql'=>'SELECT MAX(id) FROM sys_queue')))) {
    
$id = Yii::app()->session->get('current_campaign');

 print '<div id="email-scheduled-broadcast" class="view">';
      
          $filter =  Queue::getEmailfilter($id);
        $this->renderPartial('../queue/admin',(array('campaign_id'=>$id,'queue_type'=>'broadcast','filter'=>$filter)),false,true);
print  "</div>";

$this->endCache(); }
?>
</div>
