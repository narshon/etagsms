<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php
echo "<?php\n";
$label=$this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	'$label'=>array('index'),
	'Manage',
);\n";
?>

$this->service=new ServiceComponent($this,"<?php echo $this->modelClass; ?>");
$this->service->showHybridGridView("Manage <?php echo $this->pluralize($this->class2name($this->modelClass)); ?>","<?php echo $this->modelClass; ?>_hybridgrid");


//show portlets for this service
/*
$this->portlet[]=array(
    array('label'=>'Add <?php echo $this->modelClass; ?>', 
          'url'=>array("automated/create",
                        'view'=>'<?php echo $this->modelClass; ?>_form'),
          'linkOptions'=>array('style'=>'cursor: pointer; text-decoration: none;','class'=>'update-dialog-create')),
           
    //array('label'=>'List <?php echo $this->pluralize($this->class2name($this->modelClass)); ?>', 'url'=>array("index")),
);
array_push($this->portlet_title,"Operations");
//array_push($this->portlet_render,"portlet_full");
*/


$this->beginWidget('zii.widgets.jui.CJuiDialog', array( // the dialog
    'id'=>'<?php echo $this->modelClass; ?>-dialog-id',
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

<?php echo "<?php\n"; ?>  $this->endWidget();  ?>


<script type="text/javascript">
jQuery( function($){
    $( 'a.update-dialog-create' ).bind( 'click', function( e ){
      e.preventDefault();
      $( '#<?php echo $this->modelClass; ?>-dialog-id' ).children( ':eq(0)' ).empty();
      getUpdateDialog( $( this ).attr( 'href' ),'<?php echo $this->modelClass; ?>_form','<?php echo $this->modelClass; ?>-dialog-id' );
      $( '#<?php echo $this->modelClass; ?>-dialog-id' )
        .dialog( { title: 'Create' } )
        .dialog( 'open' );
    });
});

</script>



