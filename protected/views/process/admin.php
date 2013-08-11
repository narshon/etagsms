<?php
if($this->beginCache("process_admin", array('dependency'=>array(
        'class'=>'system.caching.dependencies.CDbCacheDependency',
        'sql'=>'SELECT MAX(id) FROM sys_process'),'varyByExpression'=>"Definition::model()->getCacheExpression($model_id)"))) {
    
$filter = array('sysdef_id'=>$model_id);
$this->service=new ServiceComponent($this,"Process");
$this->service->showHybridGridView("Manage Processes","Process_hybridgrid",$filter);

$this->endCache(); }
//show portlets for this service
/*
$this->portlet[]=array(
    array('label'=>'Add Process', 
          'url'=>array("automated/create",
                        'view'=>'Process_form'),
          'linkOptions'=>array('style'=>'cursor: pointer; text-decoration: none;','class'=>'update-dialog-create')),
           
    //array('label'=>'List Processes', 'url'=>array("index")),
);
array_push($this->portlet_title,"Operations");
//array_push($this->portlet_render,"portlet_full");
*/
