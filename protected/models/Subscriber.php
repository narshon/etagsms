<?php

/**
 * This is the model class for table "sys_subscriber".
 *
 * The followings are the available columns in table 'sys_subscriber':
 * @property integer $id
 * @property integer $user_id
 * @property integer $service_id
 * @property integer $flag
 * @property string $date_subscribed
 * @property string $date_unsubscribed
 *
 * The followings are the available model relations:
 * @property ContentIn[] $contentIns
 * @property ContentOut[] $contentOuts
 * @property Queue[] $queues
 * @property Definition $service
 * @property TblUser $user
 */
class Subscriber extends CActiveRecord
{

/**
 * @var integer id
 * @soap
*/
public  $id;

/**
 * @var integer user_id
 * @soap
*/
public  $user_id;

/**
 * @var integer service_id
 * @soap
*/
public  $service_id;

/**
 * @var integer flag
 * @soap
*/
public  $flag;

/**
 * @var string date_subscribed
 * @soap
*/
public  $date_subscribed;

/**
 * @var string date_unsubscribed
 * @soap
*/
public  $date_unsubscribed;


private $datahelper;

public $count;
public $org;
public $org_group;
public $org_campaign;
public $post_group_id;
public $post_user_id;


         
         /*
         * Constructor - setting up datahelper object
         *
         */
         public function __construct($scenario = 'insert',$dh=true){
               if($dh)
                $this->datahelper = new DataHelper('Subscriber','sys_subscriber');
                
                parent::__construct($scenario);
         }
         
	/**
	 * Returns the static model of the specified AR class.
	 * @return Subscriber the static model class
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
		return 'sys_subscriber';
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
                $criteria->with = "user";
                $criteria->with = "user.group";
                
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
                    
                    if(isset($filter['group_id'])){
                        $criteria->compare ('group.id', $filter['group_id'], true);
                        unset($filter['group_id']);
                    }
                    
                    foreach($filter as $key=>$value){
                        $condition= $key."='$value'";
                        $criteria->addCondition($condition);
                    }   
                }
              
                $criteria->compare ('group.group_level3', $this->post_group_id, true);
                $criteria->compare ('user.username', $this->post_user_id, true);
                $criteria->order = "t.id desc";
                
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                        'pagination'=>array(
                                'pageSize'=>'100',
                        ), 
		));
	}
        
         function __call($method,$args){
           
            if($method=="getLink"){
               
                ServiceComponent::getValue($this,$args);
            }
           
        }
        public function ajaxServiceBeforePost($token){
            $this->service_id = Yii::app()->session->get('current_campaign');
        }
        
         public function getAjaxButtons(){
            
           $update_url = Yii::app()->createAbsoluteUrl("automated/update");
           $gridid = "Subscriber_hybridgrid";
           $hybridgridid = "hybridgrid-".$gridid; 
           $update_view = "Subscriber_form";
           $view_url = Yii::app()->createAbsoluteUrl("automated/view");
           $model = "Subscriber";
           $delete_url = Yii::app()->createAbsoluteUrl("automated/delete");
           
           $update = CHtml::link(CHtml::image("images/update.png","update"),"#hybrid", array('onClick'=>"hyBridGrid('$update_url','$hybridgridid','$update_view',$this->id);"));

           $view = CHtml::link(CHtml::image("images/view.png","view"),"#hybrid", array('onClick'=>"hyBridGrid('$view_url','$hybridgridid','$model',$this->id);"));
          
           // the link that may open the dialog
           $delete = CHtml::link(CHtml::image("images/delete.png","delete"), '#', array(
               'onclick'=>'$("#dialog-id").dialog("open"); deleteDialogMessage("'.$delete_url.'","dialog-content","'.$model.'","'.$this->id.'"); return false;',
            ));
           
           
           echo $view.$update; //.$delete;
            
        }
        
        public function getMyAjaxButtons(){
            
           $update_url = Yii::app()->createAbsoluteUrl("automated/update");
           $gridid = "Subscriber_hybridgrid";
           $hybridgridid = "hybridgrid-".$gridid; 
           $update_view = "Subscriber_form";
           $view_url = Yii::app()->createAbsoluteUrl("automated/view");
           $model = "Subscriber";
           $delete_url = Yii::app()->createAbsoluteUrl("automated/delete");
           
           $update = CHtml::link(CHtml::image("images/update.png","update"),"#hybrid", array('onClick'=>"hyBridGrid('$update_url','$hybridgridid','$update_view',$this->id);"));

           $view = CHtml::link(CHtml::image("images/view.png","view"),"#hybrid", array('onClick'=>"hyBridGrid('$view_url','$hybridgridid','$model',$this->id);"));
          
           // the link that may open the dialog
           $delete = CHtml::link(CHtml::image("images/delete.png","delete"), '#', array(
               'onclick'=>'$("#dialog-id").dialog("open"); deleteDialogMessage("'.$delete_url.'","dialog-content","'.$model.'","'.$this->id.'"); return false;',
            ));
           
           
           echo $view.$update; //.$delete;
        }
        
         public function beforeSave(){
            if($this->isNewRecord){
                $this->date_subscribed=date('Y-m-d H:i:s');
                $this->addUsersGroup($this->user_id);
            }
            if($this->org){
                $group_id = $this->checkOrgGroup($this->org_group);
                if($group_id){
                    $this->addCampaignGroup($group_id);
                    $this->importContactsFromOrganisation($group_id);
                    $newpage = Yii::app()->createAbsoluteUrl("subscriber/managesubs");
                    echo CJSON::encode(array(
                             'redirect'=>1, 
                             'newpage'=>$newpage,
                             'div'=>'redirecting...',
                             ));
                         exit;
                }
                else{
                     $this->addError('org_group', "Group not found.");
                    return false;
                }
            }
            
            if($this->org_campaign){
                
                $this->importContactsFromOtherCampaign($this->org_campaign);
                $newpage = Yii::app()->createAbsoluteUrl("subscriber/managesubs");
                echo CJSON::encode(array(
                         'redirect'=>1, 
                         'newpage'=>$newpage,
                         'div'=>'redirecting...',
                         ));
                exit;
            }
            if(!$this->user_id){
                //$this->addError('user_id', "User id cannot be null.");
                return false;
            }
            return true;
        }
        
        public function sendMessage(){
            $update_url = Yii::app()->createAbsoluteUrl("automated/create",array('view'=>'SmsOutgoing_monocast','token'=>$this->id));
            $update = CHtml::link('Send SMS',"#hybrid", array('onClick'=>"ajaxFormSubmit('$update_url','monocast-send-div');"));
            echo $update;
        }
        
        public function getSubscriber($phone, $service_id){
            $subscriber = '';
            $phone_suffix = substr($phone, -9);
            //get user id
            $criteria = new CDbCriteria();
            $criteria->condition = " phone LIKE '%$phone_suffix'";
            $user=  Users::model()->find($criteria);
            if($user){
                $sub=  Subscriber::model()->findByAttributes(array('user_id'=>$user->id,'service_id'=>$service_id));
                if($sub)
                    $subscriber=$sub;
                else
                    $subscriber = $this->addSubscriber($user->id, $service_id);
            }
            else{
                $user=new Users();
                $user->phone='0'.$phone_suffix;
                if($user->save(false)){
                    $user->username="subscriber_".$user->id;
                    $user->save(false);
                    //insert into subscriber
                    $subscriber = $this->addSubscriber($user->id, $service_id);
                } 
            }
            
            return $subscriber;
        }
        
        public function addSubscriber($user_id, $service_id){
            $sub=new Subscriber();
            $sub->user_id = $user_id;
            $sub->service_id = $service_id;
            $sub->flag=1;
            $sub->save(false);
            
            return $sub;
        }
        
        public function getEmailSubscriber($email, $service_id){
            $subscriber = '';
            //get user id
            $user=  Users::model()->findByAttributes(array('email'=>$email));
            if($user){
                $sub=  Subscriber::model()->findByAttributes(array('user_id'=>$user->id,'service_id'=>$service_id));
                if($sub)
                    $subscriber=$sub;
                else
                    $subscriber = $this->addSubscriber($user->id, $service_id);
            }
            else{
                $user=new Users();
                $user->email=$email;
                if($user->save(false)){
                    $user->username="subscriber_".$user->id;
                    $user->save(false);
                    //insert into subscriber
                    $subscriber = $this->addSubscriber($user->id, $service_id);
                } 
            }
            
            return $subscriber;
        }
        
        public function getAllServiceSubscribers($service_id){
            $subs=$this->findAllByAttributes(array('service_id'=>$service_id,'flag'=>1));
            return $subs;
        }
        
        public function campaignMenu(Portlets $portlet, array $params=array()){
            if($params['title']!=""){
                $returnArray=array($params['title']);
            }
            else {
               $returnArray=array("$portlet->portlet_title"); 
            }
            
            array_push($returnArray,array( 'label'=>'Inbox', 'url'=>array('subscriber/smsinbox') ));
            array_push($returnArray,array( 'label'=>'Drafts', 'url'=>array('subscriber/smsdrafts') ));
            array_push($returnArray,array( 'label'=>'Sent Items', 'url'=>array('subscriber/smsoutbox') ));
            array_push($returnArray,array( 'label'=>'Message Templates', 'url'=>'#' ));
            array_push($returnArray,array( 'label'=>'Scheduled Broadcast', 'url'=>array('subscriber/scheduledbroadcasts') ));
            array_push($returnArray,array( 'label'=>'Unprocessed Messages', 'url'=>array('subscriber/smsunprocessed') ));
            array_push($returnArray,array( 'label'=>'Service Provider Messages', 'url'=>array('subscriber/serviceprovider') ));
            
            return $returnArray;
             
        }
        
        public function emailFoldersMenu(Portlets $portlet, array $params=array()){
            if($params['title']!=""){
                $returnArray=array($params['title']);
            }
            else {
               $returnArray=array("$portlet->portlet_title"); 
            }
            
            array_push($returnArray,array( 'label'=>'Inbox', 'url'=>array('subscriber/emailinbox') ));
            array_push($returnArray,array( 'label'=>'Sent Items', 'url'=>array('subscriber/emailoutbox') ));
            //array_push($returnArray,array( 'label'=>'Monocast E-mail', 'url'=>array('subscriber/emailmonocast') ));
            array_push($returnArray,array( 'label'=>'Scheduled Broadcast', 'url'=>array('subscriber/emailscheduledbroadcasts') ));
            array_push($returnArray,array( 'label'=>'Unprocessed Messages', 'url'=>array('subscriber/emailunprocessed') ));
           // array_push($returnArray,array( 'label'=>'Service Provider Messages', 'url'=>array('subscriber/serviceprovider') ));
            
            return $returnArray;
        }
        
        public function MenuRenderer(){
            
            $menu = array(
                                array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest ),
				array('label'=>'Hi '.Yii::app()->user->name.', (Logout)', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
                                array('label'=>'Create Monocast SMS', 'url'=>array('/subscriber/monocast'), 'visible'=>!Yii::app()->user->isGuest),
                                //array('label'=>'Create Broadcast', 'url'=>array('/subscriber/newbroadcast'), 'visible'=>!Yii::app()->user->isGuest),
                                array('label'=>'Manage Subscribers', 'url'=>array('/subscriber/managesubs'), 'visible'=>!Yii::app()->user->isGuest),
                                array('label'=>'Manage Broadcast', 'url'=>array('/subscriber/managebroads'), 'visible'=>!Yii::app()->user->isGuest),
                                array('label'=>'Advanced Settings', 'url'=>array('/definition/index'), 'visible'=>Users::model()->authorizeAdvancedUser(Yii::app()->user->name)),
			);
            return $menu;
        }
        
        public function getMyCampaigns(Portlets $portlet, array $params=array()){
            
             if($params['title']!=""){
                    $returnArray=array($params['title']);
                }
                else {
                   $returnArray=array("$portlet->portlet_title"); 
                }
                
                
                //get all definitions for this user
                $user_id = Users::model()->getUserID(Yii::app()->user->name);
                $myCampaigns = CampaignOwner::model()->findAllByAttributes(array('user_id'=>$user_id));
                if($myCampaigns){
                    foreach($myCampaigns as $mycampaign){
                        
                        array_push($returnArray,array( 'label'=>$mycampaign->service->service_name, 'url'=>array('subscriber/home','id'=>$mycampaign->service->id) ));
                    }
                }
                
     
               
             return $returnArray;
        }
        
        public function getCampaingSubs(){
            $id=Yii::app()->session->get('current_campaign');
            $subs = $this->getAllServiceSubscribers($id);
            $returnArray=array();
            foreach($subs as $sub){
                $returnArray[$sub->id]=$sub->user->username;
            }
            
            return $returnArray;
        }
        
        public function getSubscribedDate(){
            if($this->flag != 1){
                $url = Yii::app()->createAbsoluteUrl("subscriber/togglesub",array('id'=>$this->id,'action'=>'sub'));
                $link = CHtml::link("Subscribe",'#',array('onClick'=>"ajaxUniversalGetRequest('$url','sub-div_{$this->id}','id:{$this->id},rate:5');"));
                echo "<div id='sub-div_{$this->id}'>".$link."</div>";
            }
            else{
                echo "<div id='sub-div_{$this->id}'>".$this->date_subscribed."</div>";
            }
        }
        
        public function getUnsubscribedDate(){
            if($this->flag == 1){
                $url = Yii::app()->createAbsoluteUrl("subscriber/togglesub",array('id'=>$this->id,'action'=>'unsub'));
                $link = CHtml::link("Unsubscribe",'#',array('onClick'=>"ajaxUniversalGetRequest('$url','unsub-div_{$this->id}','id:{$this->id},rate:5');"));
                echo "<div id='unsub-div_{$this->id}'>".$link."</div>";
            }
            else{
               echo "<div id='unsub-div_{$this->id}'>".$this->date_unsubscribed."</div>";
            }
        }
        
        public function performSubscriptionToggle($id,$action){
            
            $subscriber = Subscriber::model()->findByPk($id);
            if($subscriber){
                if($action == 'sub'){
                    $subscriber->flag=1;
                    $subscriber->date_subscribed = date("Y-m-d H:i:s");
                    $subscriber->save(false);
                    $data = $subscriber->date_subscribed;
                    $status = $subscriber->flag == 1 ? 'On':'Off';
                    $unsublink = $subscriber->getUnsubLink();
                    $data .= "<script type='text/javascript'>
                               $('#status-div_{$subscriber->id}').html('$status');
                               $('#unsub-div_{$subscriber->id}').html('$unsublink');
                             </script>";
                    echo CJSON::encode(array(
                                    'div'=>$data,
                                    ));
                                exit;  
                }
                else if($action == 'unsub'){
                    $subscriber->flag=0;
                    $subscriber->date_unsubscribed = date("Y-m-d H:i:s");
                    $subscriber->save(false);
                    $data = $subscriber->date_unsubscribed;
                    $status = $subscriber->flag == 1 ? 'On':'Off';
                    $sublink = $subscriber->getSubLink();
                    $data .= "<script type='text/javascript'>
                               $('#status-div_{$subscriber->id}').html('$status');
                               $('#sub-div_{$subscriber->id}').html('$sublink');
                             </script>";
                    echo CJSON::encode(array(
                                    'div'=>$data,
                                    ));
                   exit;  
                }
            }
        }
        
        public function getStatus(){
           
          $status = $this->flag == 1 ? 'On':'Off';
          
           echo "<div id='status-div_{$this->id}'>$status</div>";
        }
        
        public function getUnsubLink(){
            $url = Yii::app()->createAbsoluteUrl("subscriber/togglesub",array('id'=>$this->id,'action'=>'unsub'));
            $link = CHtml::link("Unsubscribe",'#',array('onClick'=>"ajaxUniversalGetRequest('$url','unsub-div_{$this->id}','id:{$this->id},rate:5');"));
            return $link;
        }
        
        public function getSubLink(){
            $url = Yii::app()->createAbsoluteUrl("subscriber/togglesub",array('id'=>$this->id,'action'=>'sub'));
                $link = CHtml::link("Subscribe",'#',array('onClick'=>"ajaxUniversalGetRequest('$url','sub-div_{$this->id}','id:{$this->id},rate:5');"));
                return $link;
        }
        
        public function getUserName(){
            if(isset($this->user->username)){
               return $this->user->username;
            }
            else { 
                 
                return '';
            }
        }
        
        public function yesNoOptions(){
            return array(
                0=>'No',
                1=>'Yes'
            );
        }
        
        public function getcampaigns(){
            //get org id;
            $org_id = Definition::model()->getOrganisationID ();
            $org_campaigns = Definition::model()->getOrganisationCampaigns($org_id);
            return $org_campaigns;
                    
        }
        
        public function importContactsFromOrganisation($group_id){
            $id=Yii::app()->session->get('current_campaign');
            if($id){
                $campaign = Definition::model()->findByPk($id);
                if($campaign){
                    //get company contacts
                    $criteria = new CDbCriteria();
                    $criteria->condition = "fk_org_id = {$campaign->fk_org_id} and fk_group_id ='$group_id'" ;
                    $company_contacts = Users::model()->findAll($criteria);
                    if($company_contacts){
                        foreach($company_contacts as $contact){
                            //check whether we already have this subscriber on this service
                            $checkSubcriber = $this->findByAttributes(array('user_id'=>$contact->id,'service_id'=>$id));
                            if(!$checkSubcriber){
                                //add sub
                                $sub = new Subscriber();
                                $sub->user_id = $contact->id;
                                $sub->service_id = $id;
                                $sub->flag = $this->flag;
                                $sub->date_subscribed = date('Y-m-d H:i:s');
                                $sub->save(false);
                            }
                        }
                    }
                    
                }
            }
            
        }
        
        public function importContactsFromOtherCampaign($campaign_id){
            if($campaign_id){
                $id=Yii::app()->session->get('current_campaign');
                if($id){
                      $this->addOtherCampaignGroups($campaign_id);
                    //get campaign subs
                    $criteria = new CDbCriteria();
                    $criteria->condition = "service_id = {$campaign_id}" ;
                    $campaign_subs = $this->findAll($criteria);
                    if($campaign_subs){
                        foreach($campaign_subs as $sub){
                            //check whether we already have this subscriber on this service
                            $checkSubcriber = $this->findByAttributes(array('user_id'=>$sub->user_id,'service_id'=>$id));
                            if(!$checkSubcriber){
                                //add sub
                                $subscriber = new Subscriber();
                                $subscriber->user_id = $sub->user_id;
                                $subscriber->service_id = $id;
                                $subscriber->flag = $sub->flag;
                                $subscriber->date_subscribed = date('Y-m-d H:i:s');
                                $subscriber->save(false);
                            }
                        }
                    }
                    
                }
            }
        }
        
        public function unsubscribe(){
            $this->flag = 0;
            $this->date_unsubscribed = date('Y-m-d H:i:s');
            $this->save(false);
        }
        
        public function unsubscribeFromAllCampaigns($user_id){
            
            $allsubs = $this->findAllByAttributes(array('user_id'=>$user_id));
            if($allsubs){
                foreach($allsubs as $sub){
                    $sub->date_unsubscribed = date('Y-m-d H:i:s');
                    $sub->flag = 0;
                    $sub->save(false);
                }
            }
        }
        
        public function addCampaignGroup($group_id){
            $current_campaign=Yii::app()->session->get('current_campaign');
            $exist = CampaignGroups::model()->checkCampaignGroup($group_id,$current_campaign);
            if(!$exist){
                $campaignGroup = new CampaignGroups();
                $campaignGroup->service_id = $current_campaign;
                $campaignGroup->group_id = $group_id;
                $campaignGroup->date_added = date('Y-m-d H:i:s');
                $campaignGroup->save(false);
            }
        }
        
        public function checkOrgGroup($org_group){
            $check = Group::model()->findByAttributes(array('group_level3'=>$org_group));
            if($check)
                return $check->id;
            else
                return false;
        }
        
        public function addOtherCampaignGroups($other_campaign_id){
            $current_campaign=Yii::app()->session->get('current_campaign');
            $othercampaignGroups = CampaignGroups::model()->findAllByAttributes(array('service_id'=>$other_campaign_id));
            if($othercampaignGroups){
                foreach($othercampaignGroups as $other){
                    $exist = CampaignGroups::model()->checkCampaignGroup($other->group_id,$current_campaign);
                    if(!$exist){
                        $campaignGroup = new CampaignGroups();
                        $campaignGroup->service_id = $current_campaign;
                        $campaignGroup->group_id = $other->group_id;
                        $campaignGroup->date_added = date('Y-m-d H:i:s');
                        $campaignGroup->save(false);
                    }
                }
            }
        }
        
        public function addUsersGroup($user_id){
            $current_campaign=Yii::app()->session->get('current_campaign');
            $user = Users::model()->findByPk($user_id);
            if($user){
                $exist = CampaignGroups::model()->checkCampaignGroup($user->fk_group_id,$current_campaign);
                if(!$exist){
                    $campaignGroup = new CampaignGroups();
                    $campaignGroup->service_id = $current_campaign;
                    $campaignGroup->group_id = $user->fk_group_id;
                    $campaignGroup->date_added = date('Y-m-d H:i:s');
                    $campaignGroup->save(false);
                }
            }
        }
        
        public function getOrgUsers(){
            //get all users of current company.
            $return_array = array();
            $current_campaign=Yii::app()->session->get('current_campaign');
            $campaign = Definition::model()->findByPk($current_campaign);
            if($campaign){
                $users = Users::model()->findAllByAttributes(array('fk_org_id'=>$campaign->fk_org_id));
                foreach($users as $user){
                    $return_array[$user->id] = $user->username;
                }
            }
            
            return $return_array;
        }
        
        public function getSendEmailLink(){
            if(isset($this->user->email)){
                $update_url = Yii::app()->createAbsoluteUrl("automated/create",array('view'=>'EmailOutgoing_monocast','token'=>$this->id));
                $update = CHtml::link($this->user->email,"#hybrid", array('onClick'=>"ajaxFormSubmit('$update_url','monocast-send-div');"));
                echo $update;
            }
        }
        
        public function showManualPortlets($controller){
            //Campains
                //get all definitions for this user
                $returnArray = array();
                $user_id = Users::model()->getUserID(Yii::app()->user->name);
                $myCampaigns = CampaignOwner::model()->findAllByAttributes(array('user_id'=>$user_id));
                if($myCampaigns){
                    foreach($myCampaigns as $mycampaign){
                        
                        array_push($returnArray,array( 'label'=>$mycampaign->service->service_name, 'url'=>array('subscriber/home','id'=>$mycampaign->service->id) ));
                    }
                }
            $controller->portlet[]=$returnArray;
            array_push($controller->portlet_title,"My Projects");
            
            //SMS Folders
            $controller->portlet[]=array(
                    
                    array( 'label'=>'Inbox', 'url'=>array('subscriber/smsinbox') ),
                    array( 'label'=>'Drafts', 'url'=>array('subscriber/smsdrafts') ),
                    array( 'label'=>'Sent Items', 'url'=>array('subscriber/smsoutbox') ),
                    array( 'label'=>'Message Templates', 'url'=>'#' ),
                    array( 'label'=>'Scheduled Broadcast', 'url'=>array('subscriber/scheduledbroadcasts') ),
                    array( 'label'=>'Unprocessed Messages', 'url'=>array('subscriber/smsunprocessed') ),
                    array( 'label'=>'Service Provider Messages', 'url'=>array('subscriber/serviceprovider') )
                    
                );
            array_push($controller->portlet_title,"SMS Folders");
            
            //Email Folders
            $controller->portletRight[]=array(
                   array( 'label'=>'Inbox', 'url'=>array('subscriber/emailinbox') ),
                   array( 'label'=>'Sent Items', 'url'=>array('subscriber/emailoutbox') ),
                   array( 'label'=>'Scheduled Broadcast', 'url'=>array('subscriber/emailscheduledbroadcasts') ),
                   array( 'label'=>'Unprocessed Messages', 'url'=>array('subscriber/emailunprocessed') ),
                  
                );
            array_push($controller->portletRight_title,"E-mail Folders");
        }
        
        
}

