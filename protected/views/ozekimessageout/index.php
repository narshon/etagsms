<?php
$this->breadcrumbs=array(
	'Ozekimessageouts',
);

//show portlets for this service
$this->portlet[]=array(
	//array('label'=>'Add Ozekimessageout', 'url'=>array("automated/create",'view'=>'Ozekimessageout_form')),
	array('label'=>'Manage Ozekimessageout', 'url'=>array('admin')),
);
array_push($this->portlet_title,"Operations");
//array_push($this->portlet_render,"portlet_full");
?>

<h1></h1>

<?php
//automated list view
 $title= '<p><h3> Ozekimessageout Listings </h3></p>';
 $criteria = new CDBCriteria();
 //$criteria->condition="id=:id"; 
 //$criteria->params=array(':id'=>0));
 $criteria->order='id DESC';  

$this->service=new ServiceComponent($this,"Ozekimessageout");
$this->service->showListView($criteria,"Ozekimessageout_list",$title);


?>
