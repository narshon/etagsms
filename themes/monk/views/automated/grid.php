
<?php 
 $authorizer = new AuthorizationComponent;
 if($authorizer->authorize($viewID->id, "access")){
   
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>$this->service->gridview_params['gridid'],
	'dataProvider'=>$model->search($filter),
	'filter'=>$model,
        //'summaryText'=>'',
        'cssFile' => Yii::app()->theme->baseUrl . '/css/widgets/gridview/styles.css',
	'columns'=>$this->service->gridData($viewID->id,$viewID->view_model),
)); 

 }
?>

