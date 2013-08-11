<?php echo '<?php'; ?>
 
class <?php echo $this->className; ?>Controller extends CController
{
    public function actions()
    {
        return array(
            
            'sus'=>array(
                        'class'=>'CWebServiceAction',
                        'classMap'=>array(
                                <?php   
                                    $service=Service::model()->findAll();
                                    foreach($service as $serve){
                                        if($serve->model != ''){
                                                        echo "'$serve->model',\n\t\t\t\t\t";
                                        }
                                    }
                                ?>
				
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
    
    <?php
        
        // get a list of all views and generate webservices
        $views=Views::model()->findAll();
        foreach($views as $view){
            if($view->view_type=="list" or $view->view_type=="grid"){
                //generate getModel service to return all records.
                ?>
/**
                * Returns records of <?php echo $view->view_model; ?>.
                * @param string search condition
                * @return <?php echo $view->view_model; ?>[] the model records
                * @soap
                */
                public function get<?php echo $view->name_alias; ?>($condition=''){
                    return $this->getModel("<?php echo $view->service->service_name; ?>","<?php echo $view->name_alias; ?>",$condition);
                }
                <?php
                
                if($view->view_type=="grid"){
                ?>
/**
                * Deletes a record.
                * @param integer id of record to be deleted
                * @soap
                */
                public function delete<?php echo $view->name_alias; ?>Record($id){
                     $this->deleteModelRecord("<?php echo $view->service->service_name; ?>","<?php echo $view->name_alias; ?>",$id);
                }
                <?php
                }
              
            }
            
            elseif($view->view_type=="detail"){
            ?>
            /**
                * Returns a record of <?php echo $view->view_model; ?>.
                * @param string search condition
                * @return <?php echo $view->view_model; ?>[] the model records
                * @soap
                */
                public function get<?php echo $view->name_alias; ?>($condition=''){
                    return $this->getModelRecord("<?php echo $view->service->service_name; ?>","<?php echo $view->name_alias; ?>",$condition);
                }
                <?php    
            }
            
              elseif($view->view_type=="_form"){
                    ?>
                
                        /**
                         * Updates or inserts a <?php echo strtolower($view->view_model); ?>.
                         * If the ID is null, an insertion will be performed;
                         * Otherwise it updates the existing one.
                         * @param <?php echo $view->view_model; ?> model
                         * @return boolean whether saving is successful
                         * @soap
                         */
                         public function save<?php echo $view->view_model; ?>($<?php echo strtolower($view->view_model); ?>)
                        {
                                if($<?php echo strtolower($view->view_model); ?>->id > 0) // update
                                {
                                        $<?php echo strtolower($view->view_model); ?>->isNewRecord=false;
                                        if(($old<?php echo strtolower($view->view_model); ?> =  <?php echo $view->view_model; ?>::model()->findByPk($student->id))!==null)
                                        {
                                                $old<?php echo strtolower($view->view_model); ?>->attributes=$<?php echo strtolower($view->view_model); ?>->attributes;
                                                return $old<?php echo strtolower($view->view_model); ?>->save();
                                        }
                                        else
                                                return false;
                                }
                                else // insert
                                {
                                        $<?php echo strtolower($view->view_model); ?>->isNewRecord=true;
                                        $<?php echo strtolower($view->view_model); ?>->id=null;
                                        return $<?php echo strtolower($view->view_model); ?>->save();
                                }

                          }
                    <?php
                }
            
            
           
        }
        
    ?>
    
    
}