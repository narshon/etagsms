<p>&nbsp;</p>
<h3> <?php echo Definition::showCampaignTitle(); ?></h3>
<?php
$id=Yii::app()->session->get('current_campaign');
$broadcastArray=  Broadcast::model()->getCampaignBroadcasts();
foreach($broadcastArray as $broadcasts){
    foreach($broadcasts as $broadcast){
        $broadcast->getInfo();
        $filter = array('service_id'=>$id,'flag'=>1);
        $this->service=new ServiceComponent($this,"Subscriber");
        $this->service->showGridView("","Subscriber_broadcast",$filter);
    }
    
}


?>
<div id="monocast-send-div"></div>