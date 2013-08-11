<?php

Yii::import('zii.widgets.grid.CGridColumn');

/* @author nngao
 * @version $Id: CMonkColumn.php
 * @since 1.1
 */
class CMonkColumn extends CGridColumn
{
	/**
	 * @var string the attribute name of the data model. The corresponding attribute value will be rendered
	 * in each data cell. If {@link value} is specified, this property will be ignored
	 * unless the column needs to be sortable or filtered.
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
	/**
	 * @var string the type of the attribute value. This determines how the attribute value is formatted for display.
	 * Valid values include those recognizable by {@link CGridView::formatter}, such as: raw, text, ntext, html, date, time,
	 * datetime, boolean, number, email, image, url. For more details, please refer to {@link CFormatter}.
	 * Defaults to 'text' which means the attribute value will be HTML-encoded.
	 */
	public $type='text';
	/**
	 * @var boolean whether the column is sortable. If so, the header cell will contain a link that may trigger the sorting.
	 * Defaults to true. Note that if {@link name} is not set, or if {@link name} is not allowed by {@link CSort},
	 * this property will be treated as false.
	 * @see name
	 */
	public $sortable=true;
	/**
	 * @var mixed the HTML code representing a filter input (eg a text field, a dropdown list)
	 * that is used for this data column. This property is effective only when
	 * {@link CGridView::enableFiltering} is set true.
	 * If this property is not set, a text field will be generated as the filter input;
	 * If this property is an array, a dropdown list will be generated that uses this property value as
	 * the list options.
	 * If you don't want a filter for this data column, set this value to false.
	 * @since 1.1.1
	 */
	public $filter;
        
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
	 * This method evaluates {@link value} or {@link name} and renders the result.
	 * @param integer $row the row number (zero-based)
	 * @param mixed $data the data associated with the row
	 */
	protected function renderDataCellContent($row,$data,$form='',$modelName='',$module='',$displayOptions=array())
	{     
                $width=100;
                $size=10;
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
                echo "<div class='data-td' id='{$field}{$row}' style='width:{$width}px;' >";
                        if($this->value!==null)
			$value=$this->evaluateExpression($this->value,array('data'=>$data,'row'=>$row));
                        else if($this->name!==null)
                                $value=CHtml::value($data,$this->name);
                        echo $value===null ? $this->grid->nullDisplay : $this->grid->getFormatter()->format($value,$this->type);
                echo "</div>";

	}
}

?>
