<?php
$this->breadcrumbs=array(
	'Messageouts'=>array('index'),
	'Manage',
);

$this->service=new ServiceComponent($this,"Messageout");
$this->service->showHybridGridView("Manage Messageouts","Messageout_hybridgrid");


//show portlets for this service
/*
$this->portlet[]=array(
    array('label'=>'Add Messageout', 
          'url'=>array("automated/create",
                        'view'=>'Messageout_form'),
          'linkOptions'=>array('style'=>'cursor: pointer; text-decoration: none;','class'=>'update-dialog-create')),
           
    //array('label'=>'List Messageouts', 'url'=>array("index")),
);
array_push($this->portlet_title,"Operations");
//array_push($this->portlet_render,"portlet_full");
*/


$this->beginWidget('zii.widgets.jui.CJuiDialog', array( // the dialog
    'id'=>'Messageout-dialog-id',
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
      $( '#Messageout-dialog-id' ).children( ':eq(0)' ).empty();
      getUpdateDialog( $( this ).attr( 'href' ),'Messageout_form','Messageout-dialog-id' );
      $( '#Messageout-dialog-id' )
        .dialog( { title: 'Create' } )
        .dialog( 'open' );
    });
});

</script>



