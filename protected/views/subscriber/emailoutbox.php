<p>&nbsp;</p>
<div id="home-title"><h3> <?php echo Definition::model()->showCampaignTitle(); ?> </h3></div>
<div id="view-title">E-mail Outbox</div>
<div id="view-details">
<?php
if($this->beginCache("emailoutbox", array('dependency'=>array(
        'class'=>'system.caching.dependencies.CDbCacheDependency',
        'sql'=>'SELECT MAX(id) FROM sys_content_out')))) { 
    
    $id = Yii::app()->session->get('current_campaign');
    //$title = "SMS Outbox";
    print '<div id="outgoing-email-stream" class="view">';
      //outgoing-sms-stream
    $this->renderPartial('//contentOut/admin',(array('campaign_id'=>$id,'title'=>'','channel'=>'email','status'=>'sent')),false,true);
    print  "</div>";
/*
$filter = array('service_id'=>$model_id);
$this->service=new ServiceComponent($this,"Subscriber");
$this->service->showGridView("","Campaign_inbox",$filter);
 * 
 */
$this->endCache(); }
?>
</div>