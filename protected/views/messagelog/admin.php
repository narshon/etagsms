<?php
$this->breadcrumbs=array(
	'Messagelogs'=>array('index'),
	'Manage',
);

$this->service=new ServiceComponent($this,"Messagelog");
$this->service->showHybridGridView("Manage Messagelogs","Messagelog_hybridgrid");


//show portlets for this service
/*
$this->portlet[]=array(
    array('label'=>'Add Messagelog', 
          'url'=>array("automated/create",
                        'view'=>'Messagelog_form'),
          'linkOptions'=>array('style'=>'cursor: pointer; text-decoration: none;','class'=>'update-dialog-create')),
           
    //array('label'=>'List Messagelogs', 'url'=>array("index")),
);
array_push($this->portlet_title,"Operations");
//array_push($this->portlet_render,"portlet_full");
*/


$this->beginWidget('zii.widgets.jui.CJuiDialog', array( // the dialog
    'id'=>'Messagelog-dialog-id',
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
      $( '#Messagelog-dialog-id' ).children( ':eq(0)' ).empty();
      getUpdateDialog( $( this ).attr( 'href' ),'Messagelog_form','Messagelog-dialog-id' );
      $( '#Messagelog-dialog-id' )
        .dialog( { title: 'Create' } )
        .dialog( 'open' );
    });
});

</script>



