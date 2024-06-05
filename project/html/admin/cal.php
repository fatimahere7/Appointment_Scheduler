<?php
    function build_calendar($month,$year){
       $daysOfWeek = array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");
       $firstDayOfMonth = mktime(0,0,0,$month,1,$year);
       $numberDays = date('t',$firstDayOfMonth);
       $dateComponent = getdate($firstDayOfMonth);
       $monthName = $dateComponent['month'];
       //$daysOfWeek = $dateComponent['wday'];
       $dateToday= date('Y-m-d');
       
       $prev_month = date('m',mktime(0,0,0,$month-1,1,$year));
       $prev_year =  date('m',mktime(0,0,0,$month-1,1,$year));
       $next_month =  date('m',mktime(0,0,0,$month+1,1,$year));
       $next_year= date('m',mktime(0,0,0,$month+1,1,$year));
       $calendar ="<center><h2> $monthName $year</h2>";
       $calendar.= "<a class='btn btn-primary' href ='?month=".$prev_month." &year=".$prev_year." '>Prev Month</a>";
       $calendar.="<a class='btn btn-primary btn-xs' href='?month=".date('m')." &year=".date('Y')."'>Current Month</a>";
       $calendar.="<a class ='btn btn-primary btn-xs' href='?month=".$next_month." &year = $next_year'>Next Month</a></center>";
     
       $calendar.="<br><table class='table table-bordered'>";
       $calendar.="<tr>";
       foreach($daysOfWeek as $day){
          $calendar.="<th class='header'>$day</th>";
        }
        $daysOfWeek = $dateComponent['wday'];
        $calendar.="</tr><tr>";
        $currentDay =1;
        if($daysOfWeek >0){
            for($k=0;$k< $daysOfWeek;$k++){
                $calendar.="<td class ='empty'></td>";
            }
        }
        $month=str_pad($month,2,"0",STR_PAD_LEFT);
        while($daysOfWeek<=$numberDays){
            if($daysOfWeek ==7){
                $daysOfWeek=0;
                $calendar.="</tr><tr>";
            } 
            $currentDayRel = str_pad($currentDay,2,"0",STR_PAD_LEFT);
            $date="$year-$month-$currentDayRel";
            $dayName = strtolower(date('l',strtotime($date)));
            $today = $date==date('Y-m-d')? 'today' : '';
            $calendar.="<td class='$today'><h4>$currentDayRel</h4></td>";  
            $currentDay++;
            $daysOfWeek++;
        }
       return $calendar;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
    <style>
        @media only screen and (max-width:760px),
        (min-device-width:802px) and (max-device-width:1020px){
            /* force table to not be like tables anymore */
            table,thead,th,td,tr{
                display:block;
            }
            .empty{
                display:none;
            }
            th{
                position:absolute;
                top:-9999px;
                left:-9999px
            }
            tr{
                border:1px solid #ccc;
            
            }
            td:nth-of-type(1):before{
                content:"Sunday";
            }
            td:nth-of-type(2):before{
                content:"Monday";
            }
            td:nth-of-type(3):before{
                content:"Tuesday";
            }
            td:nth-of-type(4):before{
                content:"Wednesday";
            }
            td:nth-of-type(5):before{
                content:"Thursday";
            }
            td:nth-of-type(6):before{
                content:"Friday";
            }
            td:nth-of-type(7):before{
                content:"Saturday";
            }
        }
        @media(min-width:641px){
            table{
                table-layout:fixed;
            
            }
            td{
                width:33%;
            }
        }
        .row{
            margin-top:20px;
        }
        .today{
            background :yellow;
        }
    </style>
</head>
<body>
     <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                   $dateComponent = getdate();
                   if(isset($_GET['month']) && isset($_GET['year'])){
                      $month = $_GET['month'];
                      $year = $_GET['year'];
                   }
                   else{
                      $month = $dateComponent['mon'];
                      $year = $dateComponent['year'];
                   }
                   echo build_calendar($month,$year);
                ?>  
            </div>
        </div>
     </div>
</body>
</html>