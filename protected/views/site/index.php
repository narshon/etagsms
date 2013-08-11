<br/>
<br/>
<?php
//print_r($value_array); exit;
$data_array = array();
$categories_array =array();
$i=0;
$num = count($value_array);
foreach($value_array as $value){
    
    $val = array();
    for( $a=0; $a < $num; $a++ ){
        $val[]= 0;
    }
    
     $val[$i]= (int) $value;
     $data_array[] = array('name' => $month_array[$i], 'data' => $val);
     $categories_array[] = $month_array[$i];
    
    $i++;
}

$this->Widget('ext.highcharts.HighchartsWidget', array(
   'options'=>array(
      'chart'=>array('type'=>'column'),
      'title' => array('text' => 'Sent Messages'),
      'xAxis' => array(
		'categories' => $categories_array,
                'title' => array('text' => 'Months'),          
      ),
      'yAxis' => array(
         'title' => array('text' => 'Total count')
      ),
      'series' => $data_array
   )
));

print "<br/><br/>";
$data_array = array();
$categories_array =array();
$i=0;
$num = count($received_value_array);
foreach($received_value_array as $value){
    
    $val = array();
    for( $a=0; $a < $num; $a++ ){
        $val[]= 0;
    }
    
    $val[$i]= (int) $value;
    $data_array[] = array('name' => $received_month_array[$i], 'data' => $val);
    $categories_array[] = $received_month_array[$i];
    
    $i++;
}

$this->Widget('ext.highcharts.HighchartsWidget', array(
   'options'=>array(
      'chart'=>array('type'=>'column'),
      'title' => array('text' => 'Sent Messages'),
      'xAxis' => array(
		'categories' => $categories_array,
                'title' => array('text' => 'Months'),          
      ),
      'yAxis' => array(
         'title' => array('text' => 'Total count')
      ),
      'series' => $data_array
   )
));

?>
