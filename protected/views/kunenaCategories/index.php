<?php
$this->breadcrumbs=array(
	'Kunena Categories',
);

//show portlets for this service
$this->portlet[]=array(
	//array('label'=>'Add KunenaCategories', 'url'=>array("automated/create",'view'=>'KunenaCategories_form')),
	array('label'=>'Manage KunenaCategories', 'url'=>array('admin')),
);
array_push($this->portlet_title,"Operations");
//array_push($this->portlet_render,"portlet_full");
?>

<h1></h1>

<?php
//automated list view
 $title= '<p><h3> KunenaCategories Listings </h3></p>';
 $criteria = new CDBCriteria();
 //$criteria->condition="id=:id"; 
 //$criteria->params=array(':id'=>0));
 $criteria->order='id DESC';  

$this->service=new ServiceComponent($this,"KunenaCategories",Yii::app()->params['other_db']['db_name']);
$this->service->showListView($criteria,"KunenaCategories_list",$title);


?>