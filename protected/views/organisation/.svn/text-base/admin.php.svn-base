<?php
$this->breadcrumbs=array(
	'Organisations'=>array('index'),
	'Manage',
);

$this->service=new ServiceComponent($this,"Organisation");
$this->service->showHybridGridView("Manage Organisations","Organisation_hybridgrid");


//show portlets for this service
/*
$this->portlet[]=array(
    array('label'=>'Add Organisation', 
          'url'=>array("automated/create",
                        'view'=>'Organisation_form'),
          'linkOptions'=>array('style'=>'cursor: pointer; text-decoration: none;','class'=>'update-dialog-create')),
           
    //array('label'=>'List Organisations', 'url'=>array("index")),
);
array_push($this->portlet_title,"Operations");
//array_push($this->portlet_render,"portlet_full");
*/


$this->beginWidget('zii.widgets.jui.CJuiDialog', array( // the dialog
    'id'=>'Organisation-dialog-id',
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
      $( '#Organisation-dialog-id' ).children( ':eq(0)' ).empty();
      getUpdateDialog( $( this ).attr( 'href' ),'Organisation_form','Organisation-dialog-id' );
      $( '#Organisation-dialog-id' )
        .dialog( { title: 'Create' } )
        .dialog( 'open' );
    });
});

</script>



