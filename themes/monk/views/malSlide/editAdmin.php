
<?php $form=$this->beginWidget('CActiveForm', array(
    'enableAjaxValidation'=>false,
)); ?>
 
<?php 
    $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'menu-grid',
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    'columns'=>array(
        array(
            'header' => 'Form',
            'value'=>'$data->getVisitCode()',
        ),
        array(
            'id'=>'autoId',
            'class'=>'CCheckBoxColumn',
            'selectableRows' => '50',   
        ),
        'pk_serial',
        array(
            'name'=>'wbc',
            'type'=>'raw',
            'value'=>'CHtml::textField("MalSlide[\'wbc\']",$data->wbc,array("style"=>"width:50px;"))',
            'htmlOptions'=>array("width"=>"50px"),
        ),
        array(
            'name'=>'mps',
            'header'=>'MPS',
            'type'=>'raw',
            //'filter'=>array('Yes'=>'Yes','No'=>'No'),
            'value'=>'CHtml::dropDownList("mps", $data, array("Yes" => "Yes", "No" => "No"), array("empty" => "(Select a category)"));'    //($data->mps=="1")?("Yes"):("No")
        ),
        array(
            'class'=>'CButtonColumn',
        ),
    ),
)); ?>
<script>
function reloadGrid(data) {
    $.fn.yiiGridView.update('menu-grid');
}
</script>

<?php echo CHtml::ajaxSubmitButton('Update ',array('MalSlide/ajaxupdate','pk_serial'=>'107802'), array('success'=>'reloadGrid')); ?>


<?php $this->endWidget(); ?>


