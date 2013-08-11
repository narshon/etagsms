<?php $this->beginContent('//layouts/main'); ?>
<div class="container">
        <div class="span-5 first">
		<div id="sidebar">
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
                        print " </div> ";
                        ?> <br/>
                       
                        <?php
                        
			$this->endWidget();
                           
                        }
                        
                        $leftcount++;
                    }
                   Yii::app()->session->add("portletCount_left",$leftcount);
                        
		?> 
		</div><!-- sidebar -->
	</div>
	<div class="span-14">
		<div id="content">
			<?php echo $content; ?>
		</div><!-- content -->
	</div>
	
</div>
<?php $this->endContent(); ?>