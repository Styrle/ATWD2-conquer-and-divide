<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Header script</title>
  </head>
  <body>
    <?php

    @date_defult_timezone_set("GMT");

    ini_set('memory_limit', '512M');
    ini_set('max_execution_time', '180');
    ini_set('auto_detect_line_endings', TRUE);

    define (LOCATION, array (
      203 => 'Brislington Depot',
      206 => 'Rupert Street',
      209 => 'IKEA M32',
      213 => 'Old Market',
      215 => 'Parson Street School',
      228 => 'Temple Meads Station',
      270 => 'Wells Road',
      271 => 'Trailer Portway P&R',
      375 => 'Newfoundland Road',
      395 => 'Shiners Garage',
      452 => 'AURN St Pauls',
      447 => 'Bath Road',
      459 => 'Cheltenham Road',
      463 => 'Fishponds Road',
      481 => 'CREATE Centre Roof',
      500 => 'Temple Way',
      501 => 'Colston Avenue'
));

$st = strtotime("now");

foreach (LOCATION as $k=> £v   $x = fopen('data_'.$k. 'csv', );
    ?>
    </body>
</html>
