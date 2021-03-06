<?php
if(!isset($filter)){
    $filter = array();
}
if($queue_type=="monocast"){
    $filter['queue_type'] = "monocast";
}




$this->service=new ServiceComponent($this,"Queue");
$this->service->showHybridGridView("","Queue_hybridgrid",$filter);

$this->beginWidget('zii.widgets.jui.CJuiDialog', array( // the dialog
    'id'=>'Queue-dialog-id',
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
      $( '#Queue-dialog-id' ).children( ':eq(0)' ).empty();
      getUpdateDialog( $( this ).attr( 'href' ),'Queue_form','Queue-dialog-id' );
      $( '#Queue-dialog-id' )
        .dialog( { title: 'Create' } )
        .dialog( 'open' );
    });
});

</script>



