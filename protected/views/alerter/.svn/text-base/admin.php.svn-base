<?php
$this->breadcrumbs=array(
	'Alerters'=>array('index'),
	'Manage',
);

$this->service=new ServiceComponent($this,"Alerter");
$this->service->showHybridGridView("Manage Alerters","Alerter_hybridgrid");


//show portlets for this service
/*
$this->portlet[]=array(
    array('label'=>'Add Alerter', 
          'url'=>array("automated/create",
                        'view'=>'Alerter_form'),
          'linkOptions'=>array('style'=>'cursor: pointer; text-decoration: none;','class'=>'update-dialog-create')),
           
    //array('label'=>'List Alerters', 'url'=>array("index")),
);
array_push($this->portlet_title,"Operations");
//array_push($this->portlet_render,"portlet_full");
*/


$this->beginWidget('zii.widgets.jui.CJuiDialog', array( // the dialog
    'id'=>'Alerter-dialog-id',
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
      $( '#Alerter-dialog-id' ).children( ':eq(0)' ).empty();
      getUpdateDialog( $( this ).attr( 'href' ),'Alerter_form','Alerter-dialog-id' );
      $( '#Alerter-dialog-id' )
        .dialog( { title: 'Create' } )
        .dialog( 'open' );
    });
});

</script>



