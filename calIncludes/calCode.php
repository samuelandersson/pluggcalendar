<?php
//Code help: https://www.youtube.com/watch?v=rDsdBAAXkAU

date_default_timezone_set("Europe/Stockholm");

// Get previous and next month
if (isset($_GET['ym'])) {
    $ym = $_GET['ym'];
}
else {
    // This month
    $ym = date('Y-m');
}

//Check format
$timestamp = strtotime($ym . '-01');

if ($timestamp === false) {
    $ym = date('Y-m');
    $timestamp = strtotime($ym . '-01');
}

//Today
$today = date("Y-m-j", time());

// For H3 title
$html_title = date('Y / m', $timestamp);


//Create previous and next month link.........mktime(hour,minute,second,month,day,year)
    $prev = date('Y-m', mktime(0, 0, 0, date('m', $timestamp)-1, 1, date('Y', $timestamp)));
    $next = date("Y-m", mktime(0, 0, 0, date("m", $timestamp)+1, 1, date("Y", $timestamp)));

//Number of days in the month
$day_count = date("t", $timestamp);

//0:sun 1:mon 2:tue....
$str = date("w", mktime(0, 0, 0, date("m", $timestamp), 1, date("Y", $timestamp)));

//Create calendar
$weeks = array();
$week = '';

//Add empty cell
$week .= str_repeat('<th></th>', $str);

for ( $day = 1; $day <= $day_count; $day++, $str++) {
     
    $date = $ym . '-' . $day;
     
    if ($today == $date) {
        $week .= '<th class="today"><p>' . $day . '</p>';
    } else {
        $week .= '<th><p>' . $day .'</p>';
    }
    $week .= '</th>';
     
    // End of the week OR End of the month
    if ($str % 7 == 6 || $day == $day_count) {
        if ($day == $day_count) {
            // Add empty cell
            $week .= str_repeat('<th></th>', 6 - ($str % 7));
        }

        $weeks[] = '<tr>' . $week . '</tr>';
        
        // Prepare for new week
        $week = '';
    }
}
?>