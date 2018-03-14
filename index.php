<?php
	function GetSchedule ($startDate, $trainingCount, $schedule)
{   
    $arr_days = array(1=>'Mon',2=>'Tue',3=>'Wed',4=>'Thu',5=>'Fri',6=>'Sat',7=>'Sun');
    
    $dt = date_create_from_format('Y-m-d', $startDate);
     
    if(! $dt OR $trainingCount < 1 OR (array() == $schedule) OR !$schedule) return false;
         
    $totalDays = 0;
    $goneTraningDays = 0;
         
    do
    {
        foreach($schedule as $num_day)
        {
            if($arr_days[$num_day] == date_format($dt,'D'))
            {
                ++$goneTraningDays;
            }
        }       
        $dt->add(new DateInterval('P1D'));
        ++$totalDays;
    }while($goneTraningDays < $trainingCount);   
    return $totalDays;
}
 
 
echo getSchedule('2016-04-18', 6, array(2,4,6) );
?>