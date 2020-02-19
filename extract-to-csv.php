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

    define ('LOC', array (
      203 => 'Brislington Depot',
      206 => 'Rupert Street',
      209 => 'IKEA M32',
      213 => 'Old Market',
      215 => 'Parson Street School',
      228 => 'Temple Meads Station',
      270 => 'Wells Road',
      271 => "Trailer Portway P&R",
      375 => 'Newfoundland Road',
      395 => "Shiner's Garage",
      452 => 'AURN St Pauls',
      447 => 'Bath Road',
      459 => 'Cheltenham Road \ Station road',
      463 => 'Fishponds Road',
      481 => 'CREATE Centre Roof',
      500 => 'Temple Way',
      501 => 'Colston Avenue'
));

$header = 'siteID,ts,nox,no2,no,pm10,nvpm10,vpm10,nvpm2.5,pm2.5,vpm2.5,co,o3,so2,loc,lat,long'."\r\n";

//$st = strtotime("now");

  foreach (LOC as $k=>$v) {
    $fo = fopen('data_'.$k. 'csv', 'a+');
    fputs($fo, $header);
  }
unset($fo);
    ?>
    </body>
</html>
