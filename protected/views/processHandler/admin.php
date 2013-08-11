<?php
$campaign_id = Yii::app()->session->get('current_campaign');
if($this->beginCache("processHandler_admin", array('dependency'=>array(
        'class'=>'system.caching.dependencies.CDbCacheDependency',
        'sql'=>'SELECT MAX(id) FROM sys_process_handler'),'varyByExpression'=>"Definition::model()->getCacheExpression($campaign_id)"))) {

//filter process handlers for current campaign
$filter = Definition::model()->getProcessFilters();
$this->service=new ServiceComponent($this,"ProcessHandler");
$this->service->showHybridGridView("Manage Process Handlers","ProcessHandler_hybridgrid", $filter);

$this->endCache(); }