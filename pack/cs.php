<?php
require "ids.php"; 

$clubs = array();

if (($handle = fopen("clubs.csv", "r")) !== FALSE) {
   while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
      $id = $data[0];
      $name = $data[1];
      $image = $data[2];

      $valid_club = in_array($id, $club_ids);

      if ($valid_club) {
        $clubs[$id] = array(
          "id" => $id, 
          "name" => $name, 
          "image" => $image
        );
      }
   }
   fclose($handle);
}

// Now save serialized club data
$ser = serialize($clubs);
file_put_contents('clubs-alternate.data', $ser);
echo 'Saved clubs-alternate.data to disk';

?>
