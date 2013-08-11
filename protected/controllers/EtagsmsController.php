<?php 
class EtagsmsController extends CController
{
    public function actions()
    {
        return array(
            
            'sus'=>array(
                        'class'=>'CWebServiceAction',
                        'classMap'=>array(
                               
					'EmailIncoming',
					'EmailOutgoing',
					'Ozekimessagein',
					'Ozekimessageout',
					'SmsIncoming',
					'SmsOutgoing',
					'Alerter',
					'ContentIn',
					'ContentOut',
					'ContentReplies',
					'Definition',
					'Process',
					'Queue',
					'Subscriber',
					'ProcessHandler',
					'Broadcast',
					
					'CampaignOwner',
					'Organisation',
					'Users',
					'KunenaCategories',
					'KunenaTopics',
					'KunenaMessages',
					'KunenaMessagesText',
					'KunenaAliases',
					'KunenaAliases',
									
                        ),
	   ),
        );
    }


     /**
     * equivalent to model->findAll($criteria). 
     * wrapper method for data access layer to pull out multiple records on the fly from any table 
     */
    public function getModel($servicename,$name_alias,$condition='')
    {       
            $criteria=new CDbCriteria();
            $criteria->order='id desc';
            if($condition !=""){
                $criteria->condition=$condition;
            }
            
            
            $sc=new ServiceComponent($this,$servicename);
            
            $return = $sc->WebServiceObject($criteria,$name_alias,$title='');
            
            return $return;
            
    }
    
    /**
     * equivalent to model->find($criteria). 
     * wrapper method for data access layer to pull out one record on the fly from any table 
     */
    public function getModelRecord($servicename,$name_alias,$condition='')
    {       
            $criteria=new CDbCriteria();
            $criteria->order='id desc';
            
            if($condition !=''){
                $criteria->condition=$condition;
            }

            $sc=new ServiceComponent($this,$servicename);
            
            $return = $sc->WebServiceRecord($criteria,$name_alias,$title='');
            
            return $return;
            
    }
    
    /**
     * equivalent to model->delete()
     * wrapper method for data access layer to delete one record on the fly from any table 
     */
    public function deleteModelRecord($servicename,$name_alias,$id)
    {       
           
            $sc=new ServiceComponent($this,$servicename);
            
            $sc->WebServiceDeleteRecord($name_alias,$id);
            
            
            
    }
    
    /**
     * Default web view for debugging
     */
    public function actionIndex()
    {
        $this->render('index');
    }
    
    
    /****************************************************************
    *                      WEB SERVICES                             *
    *                                                               *                                                    
    *****************************************************************/
    
                       
                        /**
                         * Updates or inserts a emailincoming.
                         * If the ID is null, an insertion will be performed;
                         * Otherwise it updates the existing one.
                         * @param EmailIncoming model
                         * @return boolean whether saving is successful
                         * @soap
                         */
                         public function saveEmailIncoming($emailincoming)
                        {
                                if($emailincoming->id > 0) // update
                                {
                                        $emailincoming->isNewRecord=false;
                                        if(($oldemailincoming =  EmailIncoming::model()->findByPk($student->id))!==null)
                                        {
                                                $oldemailincoming->attributes=$emailincoming->attributes;
                                                return $oldemailincoming->save();
                                        }
                                        else
                                                return false;
                                }
                                else // insert
                                {
                                        $emailincoming->isNewRecord=true;
                                        $emailincoming->id=null;
                                        return $emailincoming->save();
                                }

                          }
                    /**
                * Returns records of EmailIncoming.
                * @param string search condition
                * @return EmailIncoming[] the model records
                * @soap
                */
                public function getEmailIncoming_list($condition=''){
                    return $this->getModel("emailincoming","EmailIncoming_list",$condition);
                }
                            /**
                * Returns a record of EmailIncoming.
                * @param string search condition
                * @return EmailIncoming[] the model records
                * @soap
                */
                public function getEmailIncoming_detail($condition=''){
                    return $this->getModelRecord("emailincoming","EmailIncoming_detail",$condition);
                }
                                
                        /**
                         * Updates or inserts a emailoutgoing.
                         * If the ID is null, an insertion will be performed;
                         * Otherwise it updates the existing one.
                         * @param EmailOutgoing model
                         * @return boolean whether saving is successful
                         * @soap
                         */
                         public function saveEmailOutgoing($emailoutgoing)
                        {
                                if($emailoutgoing->id > 0) // update
                                {
                                        $emailoutgoing->isNewRecord=false;
                                        if(($oldemailoutgoing =  EmailOutgoing::model()->findByPk($student->id))!==null)
                                        {
                                                $oldemailoutgoing->attributes=$emailoutgoing->attributes;
                                                return $oldemailoutgoing->save();
                                        }
                                        else
                                                return false;
                                }
                                else // insert
                                {
                                        $emailoutgoing->isNewRecord=true;
                                        $emailoutgoing->id=null;
                                        return $emailoutgoing->save();
                                }

                          }
                    /**
                * Returns records of EmailOutgoing.
                * @param string search condition
                * @return EmailOutgoing[] the model records
                * @soap
                */
                public function getEmailOutgoing_list($condition=''){
                    return $this->getModel("emailoutgoing","EmailOutgoing_list",$condition);
                }
                            /**
                * Returns a record of EmailOutgoing.
                * @param string search condition
                * @return EmailOutgoing[] the model records
                * @soap
                */
                public function getEmailOutgoing_detail($condition=''){
                    return $this->getModelRecord("emailoutgoing","EmailOutgoing_detail",$condition);
                }
                        
                        /**
                         * inserts a ozekimessagein record
                         * @param string params
                         * @return boolean whether saving is successful
                         * @soap
                         */
                         public function addOzekimessagein($params)
                        {
                               $params = WidgetHelper::explode_assoc($params, array(',','=>'));
                                $ozekimessagein = new Ozekimessagein();
                               // $ozekimessagein->id=null;
                                $ozekimessagein->sender = $params['sender'];
                                $ozekimessagein->receiver= $params['receiver'];
                                $ozekimessagein->msg= $params['msg'];
                                $ozekimessagein->senttime= $params['senttime'];
                                $ozekimessagein->receivedtime= $params['receivedtime'];
                                $ozekimessagein->operator= $params['operator'];
                                $ozekimessagein->msgtype= $params['msgtype'];
                                //$ozekimessagein->reference= $params['reference'];
                                return $ozekimessagein->save(false);
                                
                               // return "Tuko hapa";
                        

                          }        
                        /**
                         * Updates or inserts a ozekimessagein.
                         * If the ID is null, an insertion will be performed;
                         * Otherwise it updates the existing one.
                         * @param Ozekimessagein model
                         * @param string params
                         * @return string whether saving is successful
                         * @soap
                         */
                         public function saveOzekimessagein($ozekimessagein, $params='')
                        {     
                                 if($params){
                                    // return "tuko hapa";
                                 }
                                 else{  // return "Mbona hapa?";
	                                if($ozekimessagein->id > 0) // update
	                                {
	                                        $ozekimessagein->isNewRecord=false;
	                                        if(($oldozekimessagein =  Ozekimessagein::model()->findByPk($ozekimessagein->id))!==null)
	                                        {
	                                                $oldozekimessagein->attributes=$ozekimessagein->attributes;
	                                                return $oldozekimessagein->save();
	                                        }
	                                        else
	                                                return false;
	                                }
	                                else // insert
	                                {
	                                        $ozekimessagein->isNewRecord=true;
	                                        $ozekimessagein->id=null;
	                                        return $ozekimessagein->save();
	                                }
                                }

                          }
                    /**
                * Returns records of Ozekimessagein.
                * @param string search condition
                * @return Ozekimessagein[] the model records
                * @soap
                */
                public function getOzekimessagein_list($condition=''){
                    return $this->getModel("ozekimessagein","Ozekimessagein_list",$condition);
                }
                
                /**
                * Returns a record of Ozekimessagein.
                * @param string search condition
                * @return Ozekimessagein[] the model records
                * @soap
                */
                public function getOzekimessagein_detail($condition=''){
                    return $this->getModelRecord("ozekimessagein","Ozekimessagein_detail",$condition);
                }
                                
                        /**
                         * Updates or inserts a ozekimessageout.
                         * If the ID is null, an insertion will be performed;
                         * Otherwise it updates the existing one.
                         * @param Ozekimessageout model
                         * @return boolean whether saving is successful
                         * @soap
                         */
                         public function saveOzekimessageout($ozekimessageout)
                        {
                                if($ozekimessageout->id > 0) // update
                                {
                                        $ozekimessageout->isNewRecord=false;
                                        if(($oldozekimessageout =  Ozekimessageout::model()->findByPk($ozekimessageout->id))!==null)
                                        {
                                                $oldozekimessageout->attributes=$ozekimessageout->attributes;
                                                return $oldozekimessageout->save();
                                        }
                                        else
                                                return false;
                                }
                                else // insert
                                {
                                        $ozekimessageout->isNewRecord=true;
                                        $ozekimessageout->id=null;
                                        return $ozekimessageout->save();
                                }

                          }
                /**
                * Returns records of Ozekimessageout.
                * @param string search condition
                * @return Ozekimessageout[] the model records
                * @soap
                */
                public function getOzekimessageout_list($condition=''){
                    return $this->getModel("ozekimessageout","Ozekimessageout_list",$condition);
                }
                /**
                * Returns a record of Ozekimessageout.
                * @param string search condition
                * @return Ozekimessageout[] the model record
                * @soap
                */
                public function getOzekimessageout_detail($condition=''){
                    return $this->getModelRecord("ozekimessageout","Ozekimessageout_detail",$condition);
                }
                                
                /**
                * Returns records of Messageout.
                * @param string search condition
                * @return Messageout[] the model records
                * @soap
                */
                public function getMessageout_list($condition=''){
                    return $this->getModel("messageout","Messageout_list",$condition);
                }
                
                /**
                * Updates or inserts a Messageout.
                * If the ID is null, an insertion will be performed;
                * Otherwise it updates the existing one.
                * @param Messageout model
                * @return boolean whether saving is successful
                * @soap
                */
                public function saveMessageout($messageout)
               {
                       if($messageout->Id > 0) // update
                       {
                               $messageout->isNewRecord=false;
                               if(($oldmessageout =  Messageout::model()->findByPk($messageout->Id))!==null)
                               {
                                      // $oldmessageout->attributes=$messageout->attributes;
                                       $oldmessageout->IsSent = $messageout->IsSent;
                                       return $oldmessageout->save();
                               }
                               else
                                       return false;
                       }
                       else // insert
                       {
                               $messageout->isNewRecord=true;
                               $messageout->Id=null;
                               return $messageout->save();
                       }

                 }
                 
                /**
                * Returns a record of Messageout.
                * @param string search condition
                * @return Messageout[] the model record
                * @soap
                */
                public function getMessageout_detail($condition=''){
                    return $this->getModelRecord("Messageout","Messageout_detail",$condition);
                }
                
                /**
                * inserts a Messagein record
                * @param string params
                * @return boolean whether saving is successful
                * @soap
                */
                public function addMessagein($params)
               {
                      $params = WidgetHelper::explode_assoc($params, array(',','=>'));
                       $messagein = new Messagein();
                      // $ozekimessagein->id=null;
                       $messagein->MessageFrom = $params['sender'];
                       $messagein->MessageTo= $params['receiver'];
                       $messagein->MessageText= $params['msg'];
                       $messagein->SendTime= $params['senttime'];
                       $messagein->ReceiveTime= $params['receivedtime'];
                       $messagein->Gateway= $params['operator'];
                       $messagein->MessageType= $params['msgtype'];
                       $messagein->dest_org = $params['dest_org'];
                       //$ozekimessagein->reference= $params['reference'];
                       return $messagein->save(false);

                      // return "Tuko hapa";


                 }        
                       
    
}