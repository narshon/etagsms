<?php
$this->breadcrumbs=array(
	'Content Outs',
);

//show portlets for this service
$this->portlet[]=array(
	//array('label'=>'Add ContentOut', 'url'=>array("automated/create",'view'=>'ContentOut_form')),
	array('label'=>'Manage ContentOut', 'url'=>array('admin')),
);
array_push($this->portlet_title,"Operations");
//array_push($this->portlet_render,"portlet_full");
?>

<h1></h1>

<?php
//automated list view
 $title= '<p><h3> ContentOut Listings </h3></p>';
 $criteria = new CDBCriteria();
 //$criteria->condition="id=:id"; 
 //$criteria->params=array(':id'=>0));
 $criteria->order='id DESC';  

$this->service=new ServiceComponent($this,"ContentOut");
$this->service->showListView($criteria,"ContentOut_list",$title);


?>
