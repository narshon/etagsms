
<?php  
 $authorizer = new AuthorizationComponent;
 if($authorizer->authorize($viewID->id, "access")){
 $token=''; 
 $create_view = $this->service->gridview_params['form'];
 $gridid = $this->service->gridview_params['gridid'];                
 if ( method_exists ($model ,  "setUrlToken") ){
    $token = $model->setUrlToken();
}
 $create_url = $this->createUrl("//automated/create",array('view'=>$create_view,'token'=>$token));
 $hybridgridid = "hybridgrid-".$gridid; 
   

$disable_create = $this->service->gridview_params['disable_create']; 
if( (int)$disable_create !== 1 ){
print "<div id='addnew' style='float:right; text-align: right; width: 40%'>";
//print CHtml::link("Add New","#hybrid", array('onClick'=>"hyBridGrid('$create_url','$hybridgridid','$create_view', '$gridid');"));
print CHtml::link("Add New","#hybrid", array('onClick'=>"ajaxFormSubmit('$create_url','$hybridgridid','$create_view');"));
print "</div>";
}

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>$this->service->gridview_params['gridid'],
	'dataProvider'=>$model->search($filter),
	'filter'=>$model,
        //'summaryText'=>'', 
        'cssFile' => Yii::app()->theme->baseUrl . '/css/widgets/gridview/styles.css',
	'columns'=>$this->service->gridData($viewID->id,$viewID->view_model),
)); 


?>

<a name="hybrid">
    <div id="<?php echo $hybridgridid ?>" class="hybridgrid">
        
    </div>
</a>


<?php  //Dialog Box 
$dialogID="dialog-".$this->service->gridview_params['gridid'];

$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>$dialogID,
    // additional javascript options for the dialog plugin
    'options'=>array(
        'title'=>'Confirm Delete',
        'autoOpen'=>false,
    ),
));

    echo '<div id="dialog-content">  </div>';

$this->endWidget('zii.widgets.jui.CJuiDialog');


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('register-grid', {
		data: $(this).serialize()
	});
	return false;
});
");

?>

<script language='javascript'>
//var int=setInterval('updateGridView()',5000);
function updateGridView(parent_id)
{   
$.fn.yiiGridView.update(parent_id, {   
data: $(this).serialize()
});  
}

function closeDialogBox(parent_id){
      
    $("#dialog-"+parent_id).dialog('close');
}
   

</script>

<?php } ?>


