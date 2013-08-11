<p>&nbsp;</p>
<div id="home-title"><h3> <?php echo Definition::model()->showCampaignTitle(); ?> </h3></div>
<div id="view-title">Unprocessed Incoming SMS</div>
<div id="view-details">
<?php
if($this->beginCache("smsunprocessed", array('dependency'=>array(
        'class'=>'system.caching.dependencies.CDbCacheDependency',
        'sql'=>'SELECT MAX(id) FROM sms_incoming')))) { 
    
    $id = Yii::app()->session->get('current_campaign');
    //$title = "SMS Outbox";
    print '<div id="outgoing-sms-stream" class="view">';
      //outgoing-sms-stream
    $this->renderPartial('../smsIncoming/admin',(array('status'=>'pending','dest'=>Organisation::model()->getCampaignOrganisationName($id))),false,true);
    print  "</div>";

$this->endCache(); }
?>
</div>
<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array( // the dialog
    'id'=>'dialog-id',
    'options'=>array(
        'title'=>'Etagsms: Confirm Delete',
        'autoOpen'=>false,
        'modal'=>true,
        'width'=>350,
        'height'=>270,
    ),
));


?>
<div class="dialog-content" id="dialog-content_div">
    
</div>

<?php
  $this->endWidget();  ?>