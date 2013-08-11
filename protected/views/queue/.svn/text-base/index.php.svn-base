<?php
$this->breadcrumbs=array(
	'Queues',
);

//show portlets for this service
$this->portlet[]=array(
	//array('label'=>'Add Queue', 'url'=>array("automated/create",'view'=>'Queue_form')),
	array('label'=>'Manage Queue', 'url'=>array('admin')),
);
array_push($this->portlet_title,"Operations");
//array_push($this->portlet_render,"portlet_full");
?>

<h1></h1>

<?php
//automated list view
 $title= '<p><h3> Queue Listings </h3></p>';
 $criteria = new CDBCriteria();
 //$criteria->condition="id=:id"; 
 //$criteria->params=array(':id'=>0));
 $criteria->order='id DESC';  

$this->service=new ServiceComponent($this,"Queue");
$this->service->showListView($criteria,"Queue_list",$title);


?>
