<?php

/**
 * This is the model class for table "sys_definition".
 *
 * The followings are the available columns in table 'sys_definition':
 * @property integer $id
 * @property string $service_name
 * @property string $service_table
 * @property integer $service_flag
 * @property string $description
 * @property string $name_alias
 * @property string $service_type
 * @property string $bulk_frequency
 *
 * The followings are the available model relations:
 * @property Process[] $processes
 * @property Subscriber[] $subscribers
 */
class Definition extends CActiveRecord
{

/**
 * @var integer id
 * @soap
*/
public  $id;

/**
 * @var string service_name
 * @soap
*/
public  $service_name;

/**
 * @var string service_table
 * @soap
*/
public  $service_table;

/**
 * @var integer service_flag
 * @soap
*/
public  $service_flag;

/**
 * @var string description
 * @soap
*/
public  $description;

/**
 * @var string name_alias
 * @soap
*/
public  $name_alias;

/**
 * @var string service_type
 * @soap
*/
public  $service_type;

/**
 * @var string bulk_frequency
 * @soap
*/
public  $bulk_frequency;


private $datahelper;

public $parent_id=0;

public $check_action=null;
         
         /*
         * Constructor - setting up datahelper object
         *
         */
         public function __construct($scenario = 'insert',$dh=true){
               if($dh)
                $this->datahelper = new DataHelper('Definition','sys_definition');
                
                parent::__construct($scenario);
         }
         
	/**
	 * Returns the static model of the specified AR class.
	 * @return Definition the static model class
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
		return 'sys_definition';
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
								
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		
          			         			         			         			         			         			         			         			                  
         return $this->datahelper->getModelAttributes();
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search($filter=array())
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

                $strings=$this->datahelper->getModelSearch();
                foreach($strings as $str){
                   //explode params
                   $params=explode(",",$str->params);
                   if($str->method=="compare"){
                      $name=trim($params[0]);
                      if(isset($params[1]))
                      $criteria->compare($name,$this->$name,trim($params[1]));
                      else
                        $criteria->compare($name,$this->$name); 
                   }
                }
                
                if(is_array($filter) && count($filter)>0){
                    foreach($filter as $key=>$value){
                        $condition= $key."='$value'";
                        $criteria->addCondition($condition);
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
        
         public function getAjaxButtons(){
            
           $update_url = Yii::app()->createAbsoluteUrl("automated/update");
           $gridid = "Definition_hybridgrid";
           $hybridgridid = "hybridgrid-".$gridid; 
           $update_view = "Definition_form";
           $view_url = Yii::app()->createAbsoluteUrl("automated/view");
           $model = "Definition";
           $delete_url = Yii::app()->createAbsoluteUrl("automated/delete");
           
           $update = CHtml::link(CHtml::image("images/update.png","update"),"#hybrid", array('onClick'=>"hyBridGrid('$update_url','$hybridgridid','$update_view',$this->id);"));

           $view = CHtml::link(CHtml::image("images/view.png","view"),"#hybrid", array('onClick'=>"hyBridGrid('$view_url','$hybridgridid','$model',$this->id);"));
          
           // the link that may open the dialog
           $delete = CHtml::link(CHtml::image("images/delete.png","delete"), '#', array(
               'onclick'=>'$("#dialog-id").dialog("open"); deleteDialogMessage("'.$delete_url.'","dialog-content","'.$model.'","'.$this->id.'"); return false;',
            ));
           
           
           echo $view.$update.$delete;
            
        }
        
        public function beforeSave(){
            
            return true;
        }
        
        public function ajaxServiceBeforePost(&$token){
            $campaign_id = Yii::app()->session->get('current_campaign');
            
            //set hidden fields
            $this->parent_id = KunenaCategories::model()->getCategoryID($campaign_id);
            $campaign = Definition::model()->findByPk($campaign_id);
            if($campaign)
             $this->fk_org_id = $campaign->fk_org_id ;
            else
             $this->fk_org_id = Users::model()->getUserOrganisationID(Yii::app()->user->name) ;
            
           
            return false;
        }
        

        public function ajaxCustomAfterSave($token){
            
            if($this->check_action == 'newrecord'){
                //post to kunena categories
                if($this->fk_org_id == 1){
                    $kunenaCateg = new KunenaCategories();
                    $kunenaCateg->addCategory($this);
                }
                //assign default campaign owner and subscriber
                $campaignOwner = new CampaignOwner();
                $campaignOwner->user_id = Users::model()->getUserID(Yii::app()->user->name);
                $campaignOwner->service_id = $this->id;
                $campaignOwner->date_added = date("Y-m-d H:i:s");
                $campaignOwner->save(false);

                $sub = new Subscriber();
                $sub->user_id = Users::model()->getUserID(Yii::app()->user->name);
                $sub->service_id = $this->id;
                $sub->date_subscribed = date("Y-m-d H:i:s");
                $sub->flag = 1;
                $sub->save(false);
                
                //redirect page
                $newpage = Yii::app()->createUrl("definition/index", array("id"=>$this->id));
                echo CJSON::encode(array(
                    'status'=>'success',
                    'redirect'=>1,
                    'div'=>"Reloading...",
                    'newpage'=>$newpage,
                    ));
                exit;   
            }
            
        }
        
        public function getViewTabs($controller,$model_id){
            
            $tabs =array();
            //Get Default View ID
                $tabs['Campaign Details'] = $this->ViewTabContent($controller,"Definition", $model_id,"admin");
                $tabs['Process Descriptors'] = $this->ViewTabContent($controller,"Process", $model_id,"admin");
                if(Users::model()->authorizeAdministratorUser(Yii::app()->user->name)){
                      
                      $tabs['Process Handlers'] = $this->ViewTabContent($controller,"ProcessHandler", $model_id,"admin");
                }
                $tabs['Campaign Subscribers'] = $this->ViewTabContent($controller,"Subscriber", $model_id,"admin");
                $tabs['Broadcasts'] = $this->ViewTabContent($controller,"Broadcast", $model_id,"admin");
                
                
            
            
            return $tabs;
        }
        
        public function ViewTabContent($controller, $modelName, $model_id, $view_file){
            
            $return = "<div id='$modelName'>". 
                           $controller->renderPartial('//'.lcfirst($modelName).'/'.$view_file,(array('model_id'=>$model_id)),true,true)
                          
                       ."</div>";    
            
            return $return;
        }
        
        public function getCampaigns(Portlets $portlet, array $params=array()){
            
             if($params['title']!=""){
                    $returnArray=array($params['title']);
                }
                else {
                   $returnArray=array("$portlet->portletRight_title"); 
                }
                
                
                //get all definitions for this user
                $user_id = Users::model()->getUserID(Yii::app()->user->name);
                $myCampaigns = CampaignOwner::model()->findAllByAttributes(array('user_id'=>$user_id));
                if($myCampaigns){
                    $current_active = Yii::app()->session->get('current_campaign');
                    foreach($myCampaigns as $mycampaign){
                        
                        array_push($returnArray,array( 'label'=>"Manage ".$mycampaign->service->service_name, 'url'=>array('definition/index','id'=>$mycampaign->service->id) ));
                    }
                }
                
     
               
             return $returnArray;
        }
        
        public function getSystemAlerts(Portlets $portlet, array $params=array()){
           
             if($params['title']!=""){
                    $returnArray=array($params['title']);
                }
                else {
                   $returnArray=array("$this->portlet_title"); 
                }
                
                //get all definitions
                $criteria = new CDbCriteria();
                $user_id=  Users::getUserID(Yii::app()->user->name);  
                $criteria->condition="user_id=".$user_id;
                $defs= Alerter::model()->findAll($criteria);
                foreach($defs as $def){
                    array_push($returnArray,array( 'label'=>$def->msg, 'url'=>array('alerter/index','id'=>$def->id) ));
                }
               
             return $returnArray;
        }
        
        public static  function portlets($controller){
            
            //show portlets for this service
            /*
            $controller->portletRight[]=array(
                    //array('label'=>'Add Definition', 'url'=>array("automated/create",'view'=>'Definition_form')),
                    array('label'=>'Campaign Manager', 'url'=>array('index')),
                    array('label'=>'Campaign Content', 'url'=>array('content')),
                    
            );
            array_push($controller->portletRight_title,"Operations");
            */
            //array_push($this->portlet_render,"portlet_full");
            
        }
        
        public static function setCurrentCampaign($id=''){
            if($id != ''){ 
                    Yii::app()->session->add('current_campaign',$id);
                }
                else{
                    //get default campaign
                    $user_id = Users::model()->getUserID(Yii::app()->user->name);
                    $myCampaign = CampaignOwner::model()->findByAttributes(array('user_id'=>$user_id));
                    if($myCampaign){
                        Yii::app()->session->add('current_campaign',$myCampaign->service->id); 
                    }
                }
              
        }
        public static function showCampaignTitle(){
            $id=Yii::app()->session->get('current_campaign');
            $return = '';
            $def=  Definition::model()->findByPk($id);
            if($def){
            $return = "<div id='campaign-title'>";
            $return .= "Project: ".$def->service_name;
            $return .='</div>';
            }
            
            return $return;
        }
        
        
        public function dataportlet($event){
            $controller = $event->params['controller'];
            $controller->dataPortlets[]="Provides a placeholder on screen for visualization of sms receiving process";
            
        }
        
        public function getCurrentCampaign(){
            $campaign_id = Yii::app()->session->get('current_campaign');
            $campaign = Definition::model()->findByPk($campaign_id);
            if($campaign){
                return array($campaign->id=>$campaign->service_name);
            }
            else{
                return array();
            }
        }
        
        public function getCurrentCampaignName(){
            $campaign_id = Yii::app()->session->get('current_campaign');
            $campaign = Definition::model()->findByPk($campaign_id);
            if($campaign){
                return $campaign->service_name;
            }
            else{
                return '';
            }
        }
        
        public function getCampaignProcesses(){
            $return = array();
            $campaign_id = Yii::app()->session->get('current_campaign');
            $processes = Process::model()->findAllByAttributes(array('sysdef_id'=>$campaign_id));
            if($processes){
                foreach($processes as $process ){
                    $return[$process->id] = $process->sub_categ;
                }
            }
            
            return $return;
        }
        
     public function getProcessFilters(){
         
         $return = array();
         $campaign_id = Yii::app()->session->get('current_campaign');
         $processes = Process::model()->findAllByAttributes(array('sysdef_id'=>$campaign_id));
         if($processes){
             foreach($processes as $process){
                
               $return[$process->id]='process_id';
              
             }
         }
         if(!$return){
             $return[0]='process_id';
         }
         //echo "<pre>"; print_r($return); echo "</pre>"; exit;
         return $return;
         
     }
     
     public function getTotalSubs(){
         $criteria = new CDbCriteria();
         $criteria->select = "count(*) as count";
         $criteria->condition = "service_id={$this->id}";
         $subs = Subscriber::model()->find($criteria);
         if($subs){
             return $subs->count;
         }
     }
     
     public function getTotalReceivedMsgs(){
         //get all processes of this campaign
         $process_array=array();
         $processes = Process::model()->findAllByAttributes(array('sysdef_id'=>$this->id));
         foreach($processes as $process){
             $process_array[]=$process->id;
         }
         $process_list =  implode(',', $process_array);
        $criteria = new CDbCriteria();
        $criteria->select = "count(*) as count";
        $criteria->condition = "process_id IN($process_list) ";
        $subs = ContentIn::model()->find($criteria);
        if($subs){
            return $subs->count;
        }
         
     }
     
     public function getTotalSentMsgs(){
          //get all processes of this campaign
         $process_array=array();
         $processes = Process::model()->findAllByAttributes(array('sysdef_id'=>$this->id));
         foreach($processes as $process){
             $process_array[]=$process->id;
         }
         $process_list =  implode(',', $process_array);
        $criteria = new CDbCriteria();
        $criteria->select = "count(*) as count";
        $criteria->condition = "process_id IN($process_list) ";
        $subs = ContentOut::model()->find($criteria);
        if($subs){
            return $subs->count;
        }
     }
     
     public function getCampaignUsers (Portlets $portlet, array $params=array() ){
            
             if($params['title']!=""){
                    $returnArray=array($params['title']);
                }
                else {
                   $returnArray=array("$portlet->portletRight_title"); 
                }
                
                
                //get all users for this campaign.
                $campaign_id = Yii::app()->session->get('current_campaign');
                $myCampaigns = CampaignOwner::model()->findAllByAttributes(array('service_id'=>$campaign_id));
                if($myCampaigns){
                    
                    foreach($myCampaigns as $mycampaign){
                        // $link = CHtml::link("Forward",array("automated/create",'view'=>'ContentIn_forward','token'=>"actiontaken:forwarded,id:".$this->id), array('style'=>'cursor: pointer; text-decoration: none;','class'=>'update-dialog-create'));
                        array_push($returnArray,array( 'label'=>$mycampaign->user->username, 'url'=>array("automated/update",'view'=>'Users_form','id'=>$mycampaign->user->id), 'linkOptions'=>array('style'=>'cursor: pointer; text-decoration: none;','class'=>'update-dialog-create') ));
                    }
                    
                }
                
     
               
             return $returnArray;
        }
        
        public function getOrganisationID (){
            $campaign_id = Yii::app()->session->get('current_campaign');
            $campaign = Definition::model()->findByPk($campaign_id);
            if($campaign){
                return $campaign->fk_org_id;
            }
            else{
                return 0;
            }
        }
        public function getOrganisationCampaigns($org_id){
            $return = array();
            $models = $this->findAllByAttributes(array('fk_org_id'=>$org_id));
            if($models){
                foreach($models as $model){
                    $return[$model->id] = $model->service_name;
                }
            }
            return $return;
        }
        
        public function setFormScenario(){
            $this->check_action = 'newrecord';  
             
            return 'newrecord';
        }
        
        public function getCacheExpression($model_id){
            return "campaign_id".$model_id;
        }
        
        public function showManualPortlets($controller){
            //Campains
                //get all definitions for this user
                $returnArray = array();
                $user_id = Users::model()->getUserID(Yii::app()->user->name);
                $myCampaigns = CampaignOwner::model()->findAllByAttributes(array('user_id'=>$user_id));
                if($myCampaigns){
                    $current_active = Yii::app()->session->get('current_campaign');
                    foreach($myCampaigns as $mycampaign){
                        
                        array_push($returnArray,array( 'label'=>"Manage ".$mycampaign->service->service_name, 'url'=>array('definition/index','id'=>$mycampaign->service->id) ));
                    }
                }
            $controller->portlet[]=$returnArray;
            array_push($controller->portlet_title,"Content Projects Manager");
            
            //Current Campain users
                //get all definitions for this user
                $returnArray = array();
                //get all users for this campaign.
                $campaign_id = Yii::app()->session->get('current_campaign');
                $myCampaigns = CampaignOwner::model()->findAllByAttributes(array('service_id'=>$campaign_id));
                if($myCampaigns){
                    
                    foreach($myCampaigns as $mycampaign){
                        // $link = CHtml::link("Forward",array("automated/create",'view'=>'ContentIn_forward','token'=>"actiontaken:forwarded,id:".$this->id), array('style'=>'cursor: pointer; text-decoration: none;','class'=>'update-dialog-create'));
                        array_push($returnArray,array( 'label'=>$mycampaign->user->username, 'url'=>array("automated/update",'view'=>'Users_form','id'=>$mycampaign->user->id), 'linkOptions'=>array('style'=>'cursor: pointer; text-decoration: none;','class'=>'update-dialog-create') ));
                    }
                    
                }
            $controller->portlet[]=$returnArray;
            array_push($controller->portlet_title,"Project Users");
            
        }
}

