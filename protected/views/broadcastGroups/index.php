<?php
$this->breadcrumbs=array(
	'Broadcast Groups',
);

//show portlets for this service
$this->portlet[]=array(
	//array('label'=>'Add BroadcastGroups', 'url'=>array("automated/create",'view'=>'BroadcastGroups_form')),
	array('label'=>'Manage BroadcastGroups', 'url'=>array('admin')),
);
array_push($this->portlet_title,"Operations");
//array_push($this->portlet_render,"portlet_full");
?>

<h1></h1>

<?php
//automated list view
 $title= '<p><h3> BroadcastGroups Listings </h3></p>';
 $criteria = new CDBCriteria();
 //$criteria->condition="id=:id"; 
 //$criteria->params=array(':id'=>0));
 $criteria->order='id DESC';  

$this->service=new ServiceComponent($this,"BroadcastGroups");
$this->service->showListView($criteria,"BroadcastGroups_list",$title);


?>
