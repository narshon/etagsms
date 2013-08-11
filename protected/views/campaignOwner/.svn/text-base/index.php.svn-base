<?php
$this->breadcrumbs=array(
	'Campaign Owners',
);

//show portlets for this service
$this->portlet[]=array(
	//array('label'=>'Add CampaignOwner', 'url'=>array("automated/create",'view'=>'CampaignOwner_form')),
	array('label'=>'Manage CampaignOwner', 'url'=>array('admin')),
);
array_push($this->portlet_title,"Operations");
//array_push($this->portlet_render,"portlet_full");
?>

<h1></h1>

<?php
//automated list view
 $title= '<p><h3> CampaignOwner Listings </h3></p>';
 $criteria = new CDBCriteria();
 //$criteria->condition="id=:id"; 
 //$criteria->params=array(':id'=>0));
 $criteria->order='id DESC';  

$this->service=new ServiceComponent($this,"CampaignOwner");
$this->service->showListView($criteria,"CampaignOwner_list",$title);


?>
