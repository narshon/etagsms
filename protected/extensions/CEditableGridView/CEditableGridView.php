<?php

/**
 * CEditableGridView represents a grid view which contains editable rows
 * and an optional 'Quickbar' which fires an action that quickly adds
 * entries to the table.
 *
 * To make a Column editable you have to assign it to the class 'CEditableColumn'
 *
 * Use it like the CGridView:
 *
 * $this->widget('zii.widgets.grid.CEditableGridView', array(
 *     'dataProvider'=>$dataProvider,
 *     'showQuickBar'=>'true',
 *     'quickCreateAction'=>'QuickCreate', // will be actionQuickCreate()
 *     'columns'=>array(
 *           'title',          // display the 'title' attribute
 *            array('header' => 'editMe', 'name' => 'editable_row', 'class' => 'CEditableColumn')
 *     ));
 *
 * With this Config, the column "editable_row" gets rendered with
 * inputfields. The Table-header will be called "editMe".
 *
 * You have to define a action that receives $_POST data like this:
 *   public function actionQuickCreate() {
 *	   $model=new Model;
 *      if(isset($_POST['Model']))
 *       {
 * 	      $model->attributes=$_POST['Model'];
 * 	      if($model->save())
 * 	      $this->redirect(array('admin')); //<-- assuming the Grid was used unter view admin/
 *       }
 *     }
 *
 * @author Herbert Maschke <thyseus@gmail.com>
 * @package zii.widgets.grid
 * @since 1.1
 */

Yii::import('zii.widgets.grid.CGridView');
Yii::import('application.extensions.CEditableGridView.CEditableColumn');
Yii::import('application.extensions.CEditableGridView.CMonkColumn');
Yii::import('application.extensions.CEditableGridView.Relation');

class CEditableGridView extends CGridView {
	public $showQuickBar=1;
	public $quickCreateAction='QuickCreate';
	public $quickUpdateAction='QuickUpdate';
	public $addButtonValue='+';
        public $saveButtonValue='Submit';
        public $modelName;
        public $columnWidth;
        public $module;
        public $jsFile;
        public $displayOptions=array();
        /**
	 * Renders the data items for the grid view.
	 */
	public function renderItems()
	{       
               
		if($this->dataProvider->getItemCount()>0 || $this->showTableOnEmpty)
		{
			echo "<div id='table' class=\"{$this->itemsCssClass}\">\n";
                        echo "<div id='ajaxflash'> </div>";
                        echo "<div id='skip_pattern_div'> </div>";
			$this->renderTableHeader();
			ob_start();
			$this->renderTableBody();
			$body=ob_get_clean();
			$this->renderTableFooter();
			echo $body; // TFOOT must appear before TBODY according to the standard.
			echo "</div>";
		}
		else
			$this->renderEmptyText();
	}
        
        /**
	 * Renders the table header.
	 */
	public function renderTableHeader()
	{       
                //register general validator file
                $cs=Yii::app()->clientScript;
                $cs->registerScriptFile($this->jsFile, CClientScript::POS_HEAD); 
                
		if(!$this->hideHeader)
		{
			echo "<div id='thead' class='thead'>\n";

			if($this->filterPosition===self::FILTER_POS_HEADER)
				$this->renderFilter();

			echo "<div class='header'>\n";
			foreach($this->columns as $column)
				$column->renderHeaderCell($this->displayOptions);
			echo "</div>\n";

			if($this->filterPosition===self::FILTER_POS_BODY)
				$this->renderFilter();

			echo "</div>\n";
		}
		else if($this->filter!==null && ($this->filterPosition===self::FILTER_POS_HEADER || $this->filterPosition===self::FILTER_POS_BODY))
		{
			echo "<div id='thead' class='thead'>\n";
			$this->renderFilter();
			echo "</div>\n";
		}
	}
        
      
        
        /**
	 * Renders the filter.
	 * @since 1.1.1
	 */
	public function renderFilter()
	{
		if($this->filter!==null)
		{
			echo "<div class=\"{$this->filterCssClass}\">\n";
			foreach($this->columns as $column)
				$column->renderFilterCell();
			echo "</div>\n";
		}
	}
        
	public function renderQuickBar() {
                $modelName = $this->modelName;
                $data = new $modelName();
                echo '<div id="data-tr" class="cell">';
		$form=$this->beginWidget('CActiveForm', array(
                            'id'=>$modelName.'-form',
                            'enableAjaxValidation'=>true,
                            'action'=>CHtml::normalizeUrl("index.php?r=".strtolower($modelName)."/quickcreate"),
                            //'submit'=>'alert("Hello world");'
                    ));
				
		foreach($this->columns as $column) 
		{
			if(!$column instanceof CButtonColumn) 
			{
					if($column instanceof CCheckBoxColumn){
                                            echo "<div class='data-td' id='yw'>";
                                            echo $form->checkBox($data,$column->name, array('id'=>$column->name, 'class'=>'textfield'));
                                            echo "<div id='Error_{$column->name}'> </div>";
                                            echo "</div>";
                                        } 	
					else if($column instanceof CDataColumn 
						|| $column instanceof CEditableColumn) 
					{
						if(strstr($column->name, '.') != FALSE) // Column contains an relation
						{
							$data = explode('.', $column->name);
							$this->widget('Relation', array('model' => $this->dataProvider->modelClass, 'relation' => $data[0] , 'fields' => $data[1])); 
						} else {
						echo "<div class='data-td' id='yw' >"; 
                                                echo $form->textField($data,$column->name, array('id'=>$column->name, 'class'=>'textfield'));
                                                echo "<div id='Error_{$column->name}'> </div>";
                                                echo "</div>";
					  }	
					}
					else if($column instanceof CLinkColumn) 
						printf('<div></div>');
					else
						printf('<div></div>');
				}
			}
		        echo CHtml::ajaxSubmitButton( 'Add New', CHtml::normalizeUrl("index.php?r=".strtolower($modelName)."/quickcreate"),
                        array(
                            'error'=>'js:function(){
                                alert(\'error\');
                            }',
                            //if you add a return false in this, it will not submit. 
                            'beforeSend'=>'js:function(){
                               // alert(\'beforeSend\');                                            
                            }',
                            'success'=>'js:function(data){
                                $(\'#ajaxflash\').html(data);
                                //alert(\'success, data from server: \'+data);
                            }',
                            'complete'=>'js:function(){
                               // alert(\'complete\');
                            }',
                            //'update'=>'#where_to_put_the_response',
                        )
                    );
		
		$this->endWidget(); 
                echo "</div>";
                echo "<div class='tr-clear'> </div>";

	}
        
        public function renderTableRow($row)
	{   
                $data=$this->dataProvider->data[$row];
                $form =''; // "<form method='post' id='form-$row' action='index.php?r={$this->dataProvider->modelClass}/GridUpdate&id={$data->id}'>";
                $modelName = $this->modelName;       
                        
		if($this->rowCssClassExpression!==null)
		{
			
			echo '<div id="data-tr" style="height:24px;" class="cell '.$this->evaluateExpression($this->rowCssClassExpression,array('row'=>$row,'data'=>$data)).'">';
                        echo "<a href='#' id='anchor_$row' class='anchor'>";    
                        $form=$this->beginWidget('CActiveForm', array(
                            'id'=>$modelName.'-form-'.$row,
                            'enableAjaxValidation'=>true,
                            'action'=>CHtml::normalizeUrl("index.php?r=".strtolower($modelName)."/update&id=".$data->id),
                           
                          
                    ));
                        
		}
		else if(is_array($this->rowCssClass) && ($n=count($this->rowCssClass))>0){
                    
                    echo '<div id="data-tr" style="height:24px;"  class="cell '.$this->rowCssClass[$row%$n].'">'; 
                    echo "<a href='#' id='anchor_$row' class='anchor'>";
                    $form=$this->beginWidget('CActiveForm', array(
                            'id'=>$modelName.'-form-'.$row,
                            'enableAjaxValidation'=>true,
                            'action'=>CHtml::normalizeUrl("index.php?r=".strtolower($modelName)."/update&id=".$data->id),
                            
                            //'submit'=>'alert("Hello world");'
                    ));
                   
                    
                }	
		else {
                    
                    echo '<div id="data-tr"'.$row.' style="height:24px;" class="cell">';
                    echo "<a href='#' id='anchor_$row' class='anchor'>";
                    $form=$this->beginWidget('CActiveForm', array(
                            'id'=>$modelName.'-form-'.$row,
                            'enableAjaxValidation'=>true,
                            'action'=>CHtml::normalizeUrl("index.php?r=".strtolower($modelName)."/update&id=".$data->id),
                            
                            //'submit'=>'alert("Hello world");'
                    ));
                }
			
		foreach($this->columns as $column){
                     //print "outside "; var_dump($column); exit;
                  
                    $column->renderDataCell($row,$form,$modelName,$this->module,$this->displayOptions);
                }
	      
              /* echo CHtml::ajaxSubmitButton( 'Save', CHtml::normalizeUrl("index.php?r=".strtolower($modelName)."/update&id=".$data->id."&row=".$row),
                        array(
                            'error'=>'js:function(){
                                alert(\'error\');
                            }',
                            //if you add a return false in this, it will not submit. 
                            'beforeSend'=>'js:function(){
                               // alert(\'beforeSend\');                                            
                            }',
                            'success'=>'js:function(data){
                                $(\'#ajaxflash\').html(data);
                                //alert(\'success, data from server: \'+data);
                            }',
                            'complete'=>'js:function(){
                               // alert(\'complete\');
                            }',
                            //'update'=>'#where_to_put_the_response',
                        )
                    );
               * 
               */
           
              
                $this->endWidget(); 
                echo "</a>";
		echo "</div>\n";
                echo "<div class='tr-clear'> </div>";
               
	}
 
	public function renderTableBody() {
            
		$data=$this->dataProvider->getData();
		$n=count($data);
		echo "<div class='tbody'>\n";

		if($n>0)
		{
			for($row=0;$row<$n;++$row){
                            $this->renderTableRow($row);
                        }
				
		}
		else
		{
			echo '<div class="tbody-tr"><div class="data-td" colspan="'.count($this->columns).'">';
			$this->renderEmptyText();
			echo "</div></div>\n";
		}
		echo "</div>\n";
		 //$this->renderQuickBar();
	}
        

}

?>
