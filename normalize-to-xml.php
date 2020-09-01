<?php
$xml = new XMLWriter();
$files = ['188','203','206','209','213','215','228','270','271','375','395','447','452','459','463','481','500','501'];


#here we are setting up our files and where they will be put
for($i = 0; $i < sizeof($files); $i++) {
    $workingFile = fopen('data_' . $files[$i] . '.csv', 'r');
    $xml->openUri('data_' . $files[$i] . '.xml');

    $xml->startDocument('1.0', 'utf-8');

    while(!feof($workingFile)) {
      $row = explode(",", fgets($workingFile));

      #strlen is used to make sure that our element contains the same ID
      if(strlen($row[0]) > 3) { continue; }

      #here we are creating our element ready to be turned into a xml element aling with it's attributes, we have also combines the geocode into one attribute of data from long and lat
      $xml->startElement('station');
      $xml->writeAttribute('id', $row[0]);
      $xml->writeAttribute('name', $row[14]);
      $xml->writeAttribute('geocode', $row[15] . "," . $row[16]);
      $xml->setIndent(1);

      break;

    }

    fclose($workingFile);

    $workingFile = fopen('data_' . $files[$i] . '.csv', 'r');

    #Writes the opening element
    while(!feof($workingFile)) {

        $row = explode(",", fgets($workingFile));

        if(strlen($row[0]) > 3) { continue; }
        # Here we are saying to check for no, nox and no2 so that we have no empty attributes when we change to XML
        if(strlen($row[2]) > 0 && strlen($row[4]) > 0 && strlen($row[3]) > 0 ) {

          $xml->startElement('rec');
          $xml->writeAttribute('ts', strftime("%Y-%m-%dT%H:%M:%SZ" , $row[1]));
          $xml->writeAttribute('nox', $row[2]);
          $xml->writeAttribute('no', $row[4]);
          $xml->writeAttribute('no2', $row[3]);
          $xml->endElement();


        }

    }

    $xml->endElement();

    fclose($workingFile);
    # stop the counter

  #  echo $et - $st;
  #  echo ' seconds to process';

}


?>
