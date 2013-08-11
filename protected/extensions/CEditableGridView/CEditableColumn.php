<?php
/**
 * CEditableColumn class file.
 *
 * @author Herbert Maschke <thyseus@gmail.com>
 * @link http://www.yiiframework.com/
 * @copyright Copyright &copy; 2008-2010 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

Yii::import('zii.widgets.grid.CGridColumn');

/**
 * CEditableColumn represents a grid view column that is editable.
 *
 * @author Herbert Maschke <thyseus@gmail.com>
 * @package zii.widgets.grid
 * @since 1.1
 */
class CEditableColumn extends CGridColumn
{
	/**
	 * @var string the attribute name of the data model. The corresponding attribute value will be rendered
	 * in each data cell. If {@link value} is specified, this property will be ignored
	 * unless the column needs to be sortable.
	 * @see value
	 * @see sortable
	 */
	public $name;
	/**
	 * @var string a PHP expression that will be evaluated for every data cell and whose result will be rendered
	 * as the content of the data cells. In this expression, the variable
	 * <code>$row</code> the row number (zero-based); <code>$data</code> the data model for the row;
	 * and <code>$this</code> the column object.
	 */
	public $value;
	public $sortable;

	/**
	 * Initializes the column.
	 */
	public function init()
	{
		parent::init();
		if($this->name===null && $this->value===null)
			throw new CException(Yii::t('zii','Either "name" or "value" must be specified for CEditableColumn.'));
	}
        
        /**
	 * Renders the filter cell.
	 * @since 1.1.1
	 */
	public function renderFilterCell()
	{
		echo "<div>";
		$this->renderFilterCellContent();
		echo "</div>";
	}
        
          /**
	 * Renders the header cell.
	 */
	public function renderHeaderCell($displayOptions=array())
	{       
                $width=$displayOptions['width'];
                if(isset($this->grid->dataProvider->data[0])){
                    $data=$this->grid->dataProvider->data[0];
                    if ( method_exists ($data ,  "getFieldAttributes") ){

                         $field_params = $data->getFieldAttributes($this->name);
                         $field_params= WidgetHelper::explode_assoc($field_params, array(',',':'));
                        $width = $field_params['width'];
                    }
                }
         
		$this->headerHtmlOptions['id']=$this->id;
                $this->headerHtmlOptions['class']="header-cell";
                 $this->headerHtmlOptions['style']="width:{$width}px;";
		echo CHtml::openTag('div',$this->headerHtmlOptions);
		$this->renderHeaderCellContent();
		echo "</div>";
	}

	/**
	 * Renders the header cell content.
	 * This method will render a link that can trigger the sorting if the column is sortable.
	 */
	protected function renderHeaderCellContent()
	{
		if($this->grid->enableSorting && $this->sortable && $this->name!==null)
			echo $this->grid->dataProvider->getSort()->link($this->name,$this->header);
		else
			parent::renderHeaderCellContent();
	}
        
        /**
	 * Renders a data cell.
	 * @param integer $row the row number (zero-based)
	 */
	public function renderDataCell($row,$form='',$modelName='', $module='',$displayOptions=array())
	{                                                                                          
		$data=$this->grid->dataProvider->data[$row];
                
               
                
		$options=$this->htmlOptions;
		if($this->cssClassExpression!==null)
		{
			$class=$this->evaluateExpression($this->cssClassExpression,array('row'=>$row,'data'=>$data));
			if(isset($options['class']))
				$options['class'].=' '.$class;
			else
				$options['class']=$class;
		}
		echo CHtml::openTag('div',$options);
		$this->renderDataCellContent($row,$data,$form,$modelName,$module,$displayOptions);
		echo '</div>';
	}

	/**
	 * Renders the data cell content.
	 * @param integer the row number (zero-based)
	 * @param mixed the data associated with the row
	 */
	protected function renderDataCellContent($row,$data,$form='',$modelName='',$module='', $displayOptions=array())
	{       
                $width=100;
                $size=10;
                $field_params='';
                if(isset($displayOptions['width']))
                    $width=$displayOptions['width'];
                if(isset($displayOptions['size']))
                    $size=$displayOptions['size'];
                
                if ( method_exists ($data ,  "fieldLoadEventHandler") ){
                   //register onfieldload event  handlers
                    $skipPatternizer=new SkipPatternizer();
                    $skipPatternizer->registerFieldLoadEventHandlers($data, array('fieldLoadEventHandler'));
                    //raise onFieldLoad event
                    $event=new CEvent($this, array('field'=>$this->name));
                    $field_params = $skipPatternizer->onFieldLoad($event, $data); 
                    $field_params= WidgetHelper::explode_assoc($field_params, array(',',':'));
                    $size = $field_params['size'];
                    $width = $field_params['width'];
                }
                
                
		$field = $this->name;
                echo "<div class='data-td' id='{$field}{$row}_div' style='width:{$width}px;' >";
		// printf('<input style="width:100%%" name="%s[%s]" type="text" value="%s" />', $data->tableSchema->name, $field, $data->$field);
                //get module
                if(isset($module)){
                          $uri= Yii::app()->createAbsoluteUrl("$module/{$modelName}/update&id={$data->id}&row=$row"); 
                }
                else{
                  $uri= Yii::app()->createAbsoluteUrl("{$modelName}/update&id={$data->id}&row=$row");     // "http://localhost/kidms/index.php?r=malslide/update&id=1";  
                }
                
               
                
                
                $div="ajaxflash";
                $form1 = "$modelName-form-".$row;
                
               echo $form->textField($data,$field, array('id'=>$field.$row, 'value'=>$data->$field, 'size'=>$size, 'class'=>'textfield', 'onChange'=>"ajaxFormSubmit('$uri','$div','$form1','skip_pattern_div');"));
               echo "<div id='Error_{$field}_{$row}'> </div>";
               echo "</div>";
	}
}
