<?php $this->pageTitle=Yii::app()->name; ?>
<?php $this->breadcrumbs=array('index');  ?>
<?php
    
    //show portlets 
    $this->portlet[]=array(
        array('label'=>'Some Stuff here', 'url'=>array('left')),
    );
    array_push($this->portlet_title,"Operations");
    array_push($this->portlet_render,"portlet_full");

 
?>

<h1>Welcome to <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>

xxxxxxxxxxxxxxxxxxxxxxxxxxxx xxxxxxxxxxxxxxxxxxxxxxxxxxxxx xxxxxxxxxxxxxxxxxxxxxxxxxx xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx xxxxxxxxxxxxxxxxxxxxxxxxxxx xxxxxxxxxxxxxxx