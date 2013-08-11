<?php
/**
 * This is the template for generating the model class of a specified table.
 * - $this: the ModelCode object
 * - $tableName: the table name for this class (prefix is already removed if necessary)
 * - $modelClass: the model class name
 * - $columns: list of table columns (name=>CDbColumnSchema)
 * - $labels: list of attribute labels (name=>label)
 * - $rules: list of validation rules
 * - $relations: list of relations (name=>relation declaration)
 */
?>
<?php
  //initialize Data Helper to insert service in model table     
   //$datahelper = new DataHelper($modelClass,$tableName);

?>
<?php echo "<?php\n"; ?>

/**
 * This is the model class for table "<?php echo $tableName; ?>".
 *
 * The followings are the available columns in table '<?php echo $tableName; ?>':
<?php foreach($columns as $column): ?>
 * @property <?php echo $column->type.' $'.$column->name."\n"; ?>
<?php endforeach; ?>
<?php if(!empty($relations)): ?>
 *
 * The followings are the available model relations:
<?php foreach($relations as $name=>$relation): ?>
 * @property <?php
	if (preg_match("~^array\(self::([^,]+), '([^']+)', '([^']+)'\)$~", $relation, $matches))
    {
        $relationType = $matches[1];
        $relationModel = $matches[2];

        switch($relationType){
            case 'HAS_ONE':
                echo $relationModel.' $'.$name."\n";
            break;
            case 'BELONGS_TO':
                echo $relationModel.' $'.$name."\n";
            break;
            case 'HAS_MANY':
                echo $relationModel.'[] $'.$name."\n";
            break;
            case 'MANY_MANY':
                echo $relationModel.'[] $'.$name."\n";
            break;
            default:
                echo 'mixed $'.$name."\n";
        }
	}
    ?>
<?php endforeach; ?>
<?php endif; ?>
 */
class <?php echo $modelClass; ?> extends <?php echo $this->baseClass."\n"; ?>
{

<?php foreach($columns as $column): ?>
/**
 * @var <?php echo $column->type.' '.$column->name."\n" ?>
 * @soap
*/
public <?php echo ' $'.$column->name.";\n"; ?>

<?php endforeach; ?>

private $datahelper;
         
         /*
         * Constructor - setting up datahelper object
         *
         */
         public function __construct($scenario = 'insert',$dh=true){
               if($dh)
                $this->datahelper = new DataHelper('<?php echo $modelClass;  ?>','<?php echo $tableName; ?>');
                
                parent::__construct($scenario);
         }
         
	/**
	 * Returns the static model of the specified AR class.
	 * @return <?php echo $modelClass; ?> the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{       
		return '<?php echo $tableName; ?>';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
                return array_merge($this->datahelper->getModelRules(),$this->datahelper->getModelSkipPatterns()); 
		
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		
		 return $this->datahelper->getModelRelations();
<?php foreach($relations as $name=>$relation): ?>
			<?php //echo "'$name' => $relation,\n"; 
                            //explode relation to reveal details   array(self::BELONGS_TO, 'Model', 'model_id')
                            $rel=str_replace("'", "", $relation);
                            $rel = substr($rel, strpos($rel, '(')+1, -1);
                            $rel = explode(",", $rel);
                            $datahelper->setModelRelations($name,trim($rel[0]),trim($rel[1]),trim($rel[2]));
                            
                        ?>
<?php endforeach; ?>
		
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		
          <?php foreach($labels as $name=>$label): ?>
			<?php 
                          //send to db
                          $datahelper->setModelAttributes($name,$label);
                         // echo "'$name' => '$label',\n"; 
                        
                        ?>
         <?php endforeach; ?>
         
         return $this->datahelper->getModelAttributes();
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

                <?php
                foreach($columns as $name=>$column)
                {
                        if($column->type==='string')
                        {
                               // echo "\t\t\$criteria->compare('$name',\$this->$name,true);\n";
                                $datahelper->setModelSearch("compare","$name,true");
                        }
                        else
                        {
                               // echo "\t\t\$criteria->compare('$name',\$this->$name);\n";
                                $datahelper->setModelSearch("compare","$name");
                        }
                }
                ?>
$strings=$this->datahelper->getModelSearch();
                foreach($strings as $str){
                   //explode params
                   $params=explode(",",$str->params);
                   if($str->method=="compare"){
                      $name=trim($params[0]);
                      $criteria->compare($name,$this->$name,trim($params[1]));
                   }
                }
                
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
         function __call($method,$args){
           
            if($method=="getLink"){
               
                ServiceComponent::getValue($this,$args);
            }
           
        }
}

