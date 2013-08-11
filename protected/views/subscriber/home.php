<?php
// set active campaign for this user
if($id){ Definition::model()->setCurrentCampaign($id);  ?>
<p>&nbsp;</p>
<div id="home-title"><h3> Welcome to <?php echo Organisation::model()->getCampaignOrganisationName(Yii::app()->session->get('current_campaign')) ?> SMS Portal </h3></div>
<div id="home-summary">
<?php
     
    if($this->beginCache("campaign_".$id, array('dependency'=>array(
        'class'=>'system.caching.dependencies.CDbCacheDependency',
        'sql'=>'SELECT MAX(id) FROM sys_content_out'),'duration'=>3600,'varyByExpression'=>"Definition::model()->getCacheExpression($id)"))) { 

    $criteria = new CDBCriteria();
    $criteria->condition = "id = $id";
    $this->service=new ServiceComponent($this,"Subscriber");
    $this->service->showListView($criteria,"Campaign_summary","");
    
    // show campaign groups
    $filter = array('service_id'=>$id);
    $this->service=new ServiceComponent($this,"CampaignGroups");
    $this->service->showHybridGridView("Subscribed Groups","CampaignGroups_hybridgrid", $filter);
    
     $this->endCache(); }
     
?> </div>  <?php
}
else{
    Definition::model()->setCurrentCampaign();
    echo "<div id='home-summary'><h5> Please select a campaign to proceed.</h5> </div>";
}

?>

