<?php
$this->breadcrumbs=array(
	'Ozekimessageouts'=>array('index'),
	'Manage',
);

$this->service=new ServiceComponent($this,"Ozekimessageout");
$this->service->showHybridGridView("Manage Ozekimessageouts","Ozekimessageout_hybridgrid");


//show portlets for this service
/*
$this->portlet[]=array(
    array('label'=>'Add Ozekimessageout', 
          'url'=>array("automated/create",
                        'view'=>'Ozekimessageout_form'),
          'linkOptions'=>array('style'=>'cursor: pointer; text-decoration: none;','class'=>'update-dialog-create')),
           
    //array('label'=>'List Ozekimessageouts', 'url'=>array("index")),
);
array_push($this->portlet_title,"Operations");
//array_push($this->portlet_render,"portlet_full");
*/


$this->beginWidget('zii.widgets.jui.CJuiDialog', array( // the dialog
    'id'=>'Ozekimessageout-dialog-id',
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
      $( '#Ozekimessageout-dialog-id' ).children( ':eq(0)' ).empty();
      getUpdateDialog( $( this ).attr( 'href' ),'Ozekimessageout_form','Ozekimessageout-dialog-id' );
      $( '#Ozekimessageout-dialog-id' )
        .dialog( { title: 'Create' } )
        .dialog( 'open' );
    });
});

</script>



