<?php
$this->breadcrumbs=array(
	'Broadcast Groups'=>array('index'),
	'Manage',
);

$this->service=new ServiceComponent($this,"BroadcastGroups");
if(isset($broadcast_id)){
    $filter = array('fk_broadcast_id'=>$broadcast_id);
    $this->service->showHybridGridView("","BroadcastGroups_hybridgrid",$filter);
}
else
$this->service->showHybridGridView("","BroadcastGroups_hybridgrid");



//show portlets for this service
/*
$this->portlet[]=array(
    array('label'=>'Add BroadcastGroups', 
          'url'=>array("automated/create",
                        'view'=>'BroadcastGroups_form'),
          'linkOptions'=>array('style'=>'cursor: pointer; text-decoration: none;','class'=>'update-dialog-create')),
           
    //array('label'=>'List Broadcast Groups', 'url'=>array("index")),
);
array_push($this->portlet_title,"Operations");
//array_push($this->portlet_render,"portlet_full");
*/


$this->beginWidget('zii.widgets.jui.CJuiDialog', array( // the dialog
    'id'=>'BroadcastGroups-dialog-id',
    'options'=>array(
        'title'=>'Create Grades',
        'autoOpen'=>false,
        'modal'=>true,
        'width'=>550,
        'height'=>470,
    ),
));


?>
<div class="divForForm"></div>

<?php
  $this->endWidget();  ?>


<script type="text/javascript">
jQuery( function($){
    $( 'a.update-dialog-create' ).bind( 'click', function( e ){
      e.preventDefault();
      $( '#BroadcastGroups-dialog-id' ).children( ':eq(0)' ).empty();
      getUpdateDialog( $( this ).attr( 'href' ),'BroadcastGroups_form','BroadcastGroups-dialog-id' );
      $( '#BroadcastGroups-dialog-id' )
        .dialog( { title: 'Create' } )
        .dialog( 'open' );
    });
});

</script>



