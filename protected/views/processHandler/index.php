<?php
$this->breadcrumbs=array(
	'Process Handlers',
);

//show portlets for this service
$this->portlet[]=array(
	//array('label'=>'Add ProcessHandler', 'url'=>array("automated/create",'view'=>'ProcessHandler_form')),
	array('label'=>'Manage ProcessHandler', 'url'=>array('admin')),
);
array_push($this->portlet_title,"Operations");
//array_push($this->portlet_render,"portlet_full");
?>

<h1></h1>

<?php
//automated list view
 $title= '<p><h3> ProcessHandler Listings </h3></p>';
 $criteria = new CDBCriteria();
 //$criteria->condition="id=:id"; 
 //$criteria->params=array(':id'=>0));
 $criteria->order='id DESC';  

$this->service=new ServiceComponent($this,"ProcessHandler");
$this->service->showListView($criteria,"ProcessHandler_list",$title);


?>
