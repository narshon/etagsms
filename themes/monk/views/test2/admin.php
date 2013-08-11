<?php
$this->breadcrumbs=array(
	'Test2s'=>array('index'),
	'Manage',
);

$this->service=new ServiceComponent($this,"Test2");
$this->service->showGridView("Manage Test2s","Test2_grid");


//show portlets for this service
$this->portletRight[]=array(
    array('label'=>'Add Test2', 
          'url'=>array("automated/create",
                        'view'=>'Test2_form'),
          'linkOptions'=>array('style'=>'cursor: pointer; text-decoration: none;','class'=>'update-dialog-create')),
           
    //array('label'=>'List Test2s', 'url'=>array("index")),
);
array_push($this->portletRight_title,"Operations");
//array_push($this->portletRight_render,"portlet_full");


$this->beginWidget('zii.widgets.jui.CJuiDialog', array( // the dialog
    'id'=>'Test2-dialog-id',
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
      $( '#Test2-dialog-id' ).children( ':eq(0)' ).empty();
      getUpdateDialog( $( this ).attr( 'href' ),'Test2_form','Test2-dialog-id' );
      $( '#Test2-dialog-id' )
        .dialog( { title: 'Create' } )
        .dialog( 'open' );
    });
});

</script>



