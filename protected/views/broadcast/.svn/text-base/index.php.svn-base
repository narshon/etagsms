<?php
$this->breadcrumbs=array(
	'Broadcasts',
);

//show portlets for this service
$this->portlet[]=array(
	//array('label'=>'Add Broadcast', 'url'=>array("automated/create",'view'=>'Broadcast_form')),
	array('label'=>'Manage Broadcast', 'url'=>array('admin')),
);
array_push($this->portlet_title,"Operations");
//array_push($this->portlet_render,"portlet_full");
?>

<h1></h1>

<?php
//automated list view
 $title= '<p><h3> Broadcast Listings </h3></p>';
 $criteria = new CDBCriteria();
 //$criteria->condition="id=:id"; 
 //$criteria->params=array(':id'=>0));
 $criteria->order='id DESC';  

$this->service=new ServiceComponent($this,"Broadcast");
$this->service->showListView($criteria,"Broadcast_list",$title);


?>
