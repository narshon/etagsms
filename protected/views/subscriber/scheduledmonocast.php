<p>&nbsp;</p>
<div id="home-title"><h3> <?php echo Definition::model()->showCampaignTitle(); ?> </h3></div>
<div id="view-title">Scheduled SMS Monocasts</div>
<div id="view-details">
<?php
$id = Yii::app()->session->get('current_campaign');

 print '<div id="incoming-sms-stream" class="view">';
          //incoming-sms-stream
        $this->renderPartial('../queue/admin',(array('campaign_id'=>$id,'queue_type'=>'monocast')),false,true);
print  "</div>";


?>
</div>
