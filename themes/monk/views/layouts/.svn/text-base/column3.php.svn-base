<?php $this->beginContent('//layouts/main'); ?>
<div class="container">
      <div class="span-5 first"><br/>
          <div class="sidebar" > 
            <?php   
                    $leftcount = 0;
                    for($i=0; $i<count($this->portlet); $i++){
                        
                        if(isset($this->portlet_title[$i])){
                        
                       
                        $contentdivid=$this->portlet_render."_left_".$i;
			$this->beginWidget('zii.widgets.CPortlet', array(
				'title'=>"<div class='plinkleft' id='plinkleft_$i'><a href='#' onClick='showPortletText(\"$contentdivid\",\"plinkleft_$i\");'> + </a> </div><div id='ptextleft'>".$this->portlet_title[$i]."</div>",
			));
                        
                        print "<div id=".$this->portlet_render."_left_".$i." > ";
                        
                         $this->widget('ext.CDropDownMenu.CDropDownMenu',array(
                                'style' => 'vertical', // or default or navbar
				'items'=>$this->portlet[$i],
				'htmlOptions'=>array('class'=>'p_operations'),
			));
                        print "</div> ";
                        ?><br/>
                        
                        <?php
                        
			$this->endWidget();
                           
                        }
                        
                        $leftcount++;
                    }
                   Yii::app()->session->add("portletCount_left",$leftcount);
                   //render data portlets
                   foreach($this->dataPortlets as $dataport){
                       echo $dataport.'<br/>';
                   }
                        
		?> 
             
        </div> 
    </div>
    
	<div class="span-14">
		<div id="content">
			<?php echo $content; ?>
		</div><!-- content -->
	</div>
	<div class="span-5 last">
		<div class="sidebar"> 
		<?php
                
                   
			$this->beginWidget('zii.widgets.CPortlet', array(
				'title'=>'Operations',
			));
			$this->widget('zii.widgets.CMenu', array(
				'items'=>$this->menu,
				'htmlOptions'=>array('class'=>'operations'),
			));
			
			
			
			$this->endWidget();
                   
		?>
                
                <?php
                
                    $rightcount=0;
                    
                    for($i=0; $i<count($this->portletRight); $i++){
                        
                        if(isset($this->portletRight_title[$i])){
                         
                        $contentdivid=$this->portletRight_render."_right_".$i;
                          
                       
			$this->beginWidget('zii.widgets.CPortlet', array(
				'title'=>"<div class='plinkright' id='plinkright_$i'><a href='#' onClick='showPortletText(\"$contentdivid\",\"plinkright_$i\");'> + </a> </div><div id='ptextright'>".$this->portletRight_title[$i]."</div>",
			));
                        
                        print "<div id=".$this->portletRight_render."_right_".$i." > ";
                        
			 $this->widget('ext.CDropDownMenu.CDropDownMenu',array(
                                'style' => 'vertical', // or default or navbar
				'items'=>$this->portletRight[$i],
				'htmlOptions'=>array('class'=>'p_operations'),
			));
                        ?> 
                </div> &nbsp; <?php
                        
			$this->endWidget();
                        
                        }  
                        
                        $rightcount++;
                    } 
                    
                    Yii::app()->session->add("portletCount_right",$rightcount);
                    //render data portlets
                   foreach($this->dataPortlets_right as $dataport){
                       echo $dataport.'<br/>';
                   }
		?>
                 
		
		</div><!-- sidebar -->
	

	</div>
</div>
<?php $this->endContent(); ?>