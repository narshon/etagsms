<?php
$this->breadcrumbs=array(
	'Ozekimessageins',
);

//show portlets for this service
$this->portlet[]=array(
	//array('label'=>'Add Ozekimessagein', 'url'=>array("automated/create",'view'=>'Ozekimessagein_form')),
	array('label'=>'Manage Ozekimessagein', 'url'=>array('admin')),
);
array_push($this->portlet_title,"Operations");
//array_push($this->portlet_render,"portlet_full");
?>

<h1></h1>

<?php
//automated list view
 $title= '<p><h3> Ozekimessagein Listings </h3></p>';
 $criteria = new CDBCriteria();
 //$criteria->condition="id=:id"; 
 //$criteria->params=array(':id'=>0));
 $criteria->order='id DESC';  

$this->service=new ServiceComponent($this,"Ozekimessagein");
$this->service->showListView($criteria,"Ozekimessagein_list",$title);


?>
