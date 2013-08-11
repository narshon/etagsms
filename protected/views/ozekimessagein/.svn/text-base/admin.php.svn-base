<?php
$this->breadcrumbs=array(
	'Ozekimessageins'=>array('index'),
	'Manage',
);

$this->service=new ServiceComponent($this,"Ozekimessagein");
$this->service->showHybridGridView("Manage Ozekimessageins","Ozekimessagein_hybridgrid");


//show portlets for this service
/*
$this->portlet[]=array(
    array('label'=>'Add Ozekimessagein', 
          'url'=>array("automated/create",
                        'view'=>'Ozekimessagein_form'),
          'linkOptions'=>array('style'=>'cursor: pointer; text-decoration: none;','class'=>'update-dialog-create')),
           
    //array('label'=>'List Ozekimessageins', 'url'=>array("index")),
);
array_push($this->portlet_title,"Operations");
//array_push($this->portlet_render,"portlet_full");
*/


$this->beginWidget('zii.widgets.jui.CJuiDialog', array( // the dialog
    'id'=>'Ozekimessagein-dialog-id',
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
      $( '#Ozekimessagein-dialog-id' ).children( ':eq(0)' ).empty();
      getUpdateDialog( $( this ).attr( 'href' ),'Ozekimessagein_form','Ozekimessagein-dialog-id' );
      $( '#Ozekimessagein-dialog-id' )
        .dialog( { title: 'Create' } )
        .dialog( 'open' );
    });
});

</script>



