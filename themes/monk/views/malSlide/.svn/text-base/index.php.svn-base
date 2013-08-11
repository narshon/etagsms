<?php
$this->breadcrumbs=array(
	'Mal Slides',
);

//show portlets for this service
$this->portlet[]=array(
	array('label'=>'Add MalSlide', 'url'=>array("automated/create",'view'=>'MalSlide_form')),
	array('label'=>'Manage MalSlide', 'url'=>array('admin')),
);
array_push($this->portlet_title,"Operations");
//array_push($this->portletRight_render,"portlet_full");
?>

<h1></h1>

<?php
//automated list view
 $title= 'MalSlide Listings ';
 $criteria = new CDBCriteria();
 //$criteria->condition="id=:id"; 
 //$criteria->params=array(':id'=>0));
 $criteria->order='id DESC';  

$this->service=new ServiceComponent($this,"MalSlide");
$this->service->showListView($criteria,"MalSlide_list",$title);


?>


