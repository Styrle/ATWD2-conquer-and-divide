<?php
# set timezone
@date_default_timezone_set("GMT"); 

# set resource requirements
ini_set('memory_limit', '512M');
ini_set('max_execution_time', '120');
ini_set('auto_detect_line_endings',TRUE);

# start the timer
$st = strtotime("now");

# initialise the header
$header = 'siteID,ts,nox,no2,no,pm10,nvpm10,vpm10,nvpm2.5,pm2.5,vpm2.5,co,o3,so2,loc,lat,long'."\r\n";

# open 18 file handles and write the header in each
$f188 = fopen('data_188.csv', 'a+');
fputs($f188, $header);

$f203 = fopen('data_203.csv', 'a+');
fputs($f203, $header);

$f206 = fopen('data_206.csv', 'a+');
fputs($f206, $header);

$f209 = fopen('data_209.csv', 'a+');
fputs($f209, $header);

$f213 = fopen('data_213.csv', 'a+');
fputs($f213, $header);

$f215 = fopen('data_215.csv', 'a+');
fputs($f215, $header);

$f228 = fopen('data_228.csv', 'a+');
fputs($f228, $header);

$f270 = fopen('data_270.csv', 'a+');
fputs($f270, $header);

$f271 = fopen('data_271.csv', 'a+');
fputs($f271, $header);

$f375 = fopen('data_375.csv', 'a+');
fputs($f375, $header);

$f395 = fopen('data_395.csv', 'a+');
fputs($f395, $header);

$f447 = fopen('data_447.csv', 'a+');
fputs($f447, $header);

$f452 = fopen('data_452.csv', 'a+');
fputs($f452, $header);

$f459 = fopen('data_459.csv', 'a+');
fputs($f459, $header);

$f463 = fopen('data_463.csv', 'a+');
fputs($f463, $header);

$f481 = fopen('data_481.csv', 'a+');
fputs($f481, $header);

$f500 = fopen('data_500.csv', 'a+');
fputs($f500, $header);

$f501 = fopen('data_501.csv', 'a+');
fputs($f501, $header);

# open the input CSV file and throw away the first (header) line
$fp = fopen("air-quality-data-2004-2019.csv","r") or die("failed to open file");
fgetcsv($fp); //this is what is slow, use fget and explode. 

# initialise line counter & error-lines counter
$ln = 0;
$er = 0;

# now process one line at a time
while($row = fgetcsv($fp, 500, ";")) {

    # select the file
    switch ($row[4]) {
        case 188:
           $fo = $f188;
           break;
        case 203:
           $fo = $f203;
           break;
        case 206:
           $fo = $f206;
           break;
        case 209:
           $fo = $f209;
           break;
        case 213:
           $fo = $f213;
           break;
        case 215:
           $fo = $f215;
           break;
        case 228:
           $fo = $f228;
           break;
        case 270:
           $fo = $f270;
           break;
        case 271:
           $fo = $f271;
           break;
        case 375:
           $fo = $f375;
           break;
        case 395:
           $fo = $f395;
           break;
        case 447:
           $fo = $f447;
           break;
        case 452:
           $fo = $f452;
           break;
        case 459:
           $fo = $f459;
           break;
        case 463:
           $fo = $f463;
           break;
        case 481:
           $fo = $f481;
           break;
        case 500:
           $fo = $f500;
           break;
        case 501:
           $fo = $f501;
           break;
    }
    
	# ensure CO2 or CO exist and write out record
    if (!empty($row[1]) OR !empty($row[11])) {
        $r = $row[4].','.strtotime($row[0]).','.$row[1].','.$row[2].','.$row[3].','.$row[4].','.$row[5].','.$row[6].','
            .$row[7].','.$row[8].','.$row[9].','.$row[10].','.$row[11].','.$row[12].','.$row[13].','.$row[17].','.$row[18]."\r\n";
            
        fwrite($fo, $r);
    }
    # else count as rejected line
    else {
			$er++;
    }
    
	# count total lines processed
    $ln++;
}

# stop the counter
$et = strtotime("now");

# report
echo '<p>'.$ln. ' lines processed</p>';
echo '<p>'.$er . ' empty records filtered out</p>';
echo '<p>It took ';
echo $et - $st;
echo ' seconds to process';
?>
