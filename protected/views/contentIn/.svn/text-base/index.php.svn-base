<?php
$this->breadcrumbs=array(
	'Content Ins',
);

//show portlets for this service
$this->portlet[]=array(
	//array('label'=>'Add ContentIn', 'url'=>array("automated/create",'view'=>'ContentIn_form')),
	array('label'=>'Manage ContentIn', 'url'=>array('admin')),
);
array_push($this->portlet_title,"Operations");
//array_push($this->portlet_render,"portlet_full");
?>

<h1></h1>

<?php
//automated list view
 $title= '<p><h3> ContentIn Listings </h3></p>';
 $criteria = new CDBCriteria();
 //$criteria->condition="id=:id"; 
 //$criteria->params=array(':id'=>0));
 $criteria->order='id DESC';  

$this->service=new ServiceComponent($this,"ContentIn");
$this->service->showListView($criteria,"ContentIn_list",$title);


?>
