<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of WebserviceCode
 *
 * @author nngao
 */
class WebserviceCode extends CCodeModel {
    public $className;
 
    public function rules()
    {
        return array_merge(parent::rules(), array(
            array('className', 'required'),
            array('className', 'match', 'pattern'=>'/^\w+$/'),
        ));
    }
 
    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(), array(
            'className'=>'Webservice Class Name',
        ));
    }
 
    public function prepare()
    {
        $path=Yii::getPathOfAlias('application.controllers.' . $this->className.'Controller') . '.php';
        $code=$this->render($this->templatepath.'/WebService.php');
 
        $this->files[]=new CCodeFile($path, $code);
    }
}

?>
