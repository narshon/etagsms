<?php
$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Manage',
);

$this->service=new ServiceComponent($this,"Users");
$this->service->showHybridGridView("Manage Users","Users_hybridgrid");


//show portlets for this service
/*
$this->portlet[]=array(
    array('label'=>'Add Users', 
          'url'=>array("automated/create",
                        'view'=>'Users_form'),
          'linkOptions'=>array('style'=>'cursor: pointer; text-decoration: none;','class'=>'update-dialog-create')),
           
    //array('label'=>'List Users', 'url'=>array("index")),
);
array_push($this->portlet_title,"Operations");
//array_push($this->portlet_render,"portlet_full");
*/


$this->beginWidget('zii.widgets.jui.CJuiDialog', array( // the dialog
    'id'=>'Users-dialog-id',
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
      $( '#Users-dialog-id' ).children( ':eq(0)' ).empty();
      getUpdateDialog( $( this ).attr( 'href' ),'Users_form','Users-dialog-id' );
      $( '#Users-dialog-id' )
        .dialog( { title: 'Create' } )
        .dialog( 'open' );
    });
});

</script>



