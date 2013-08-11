<p>&nbsp;</p>
<div id="home-title"><h3> <?php echo Definition::model()->showCampaignTitle(); ?> </h3></div>
<div id="view-title">E-mail Inbox</div>
<div id="view-details">
<?php
if($this->beginCache("emailInbox", array('dependency'=>array(
        'class'=>'system.caching.dependencies.CDbCacheDependency',
        'sql'=>'SELECT MAX(id) FROM sys_content_in')))) { 

$id = Yii::app()->session->get('current_campaign');
$title = "Email Inbox";
 print '<div id="incoming-email-stream" class="view">';
          //incoming-sms-stream
        $this->renderPartial('../contentIn/admin',(array('campaign_id'=>$id,'title'=>'','channel'=>'email')),false,true);
print  "</div>";

$this->endCache(); }
?>
</div>