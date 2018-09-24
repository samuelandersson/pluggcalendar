<?php include "calIncludes/calCode.php"?>

<!DOCTYPE html>
    <head>
        <title>Pluggcalenndar</title>
        <link rel="stylesheet" type="text/css" href="stylesheet.css">
    </head>
    <body>
        <div id="topbar">
            <?php include "calIncludes/topbar.php" ?>
        </div>
        <table id="calAndInfo" cellspacing="0" cellpadding="0">
            <th id="calendar">
                <?php include "calIncludes/calendar.php"?>
            </th>
            <th id="sidebar">
                <?php include "calIncludes/sidebar.php" ?>
            </th>
        </table>
    </body>
</html>