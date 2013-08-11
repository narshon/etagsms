<?php
$this->breadcrumbs=array(
	'Kunena Topics'=>array('index'),
	'Manage',
);

$this->service=new ServiceComponent($this,"KunenaTopics");
$this->service->showHybridGridView("Manage Kunena Topics","KunenaTopics_hybridgrid");


//show portlets for this service
/*
$this->portlet[]=array(
    array('label'=>'Add KunenaTopics', 
          'url'=>array("automated/create",
                        'view'=>'KunenaTopics_form'),
          'linkOptions'=>array('style'=>'cursor: pointer; text-decoration: none;','class'=>'update-dialog-create')),
           
    //array('label'=>'List Kunena Topics', 'url'=>array("index")),
);
array_push($this->portlet_title,"Operations");
//array_push($this->portlet_render,"portlet_full");
*/


$this->beginWidget('zii.widgets.jui.CJuiDialog', array( // the dialog
    'id'=>'KunenaTopics-dialog-id',
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
      $( '#KunenaTopics-dialog-id' ).children( ':eq(0)' ).empty();
      getUpdateDialog( $( this ).attr( 'href' ),'KunenaTopics_form','KunenaTopics-dialog-id' );
      $( '#KunenaTopics-dialog-id' )
        .dialog( { title: 'Create' } )
        .dialog( 'open' );
    });
});

</script>



