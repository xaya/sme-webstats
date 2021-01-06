<?php
require "ids.php"; 

$players = array();

if (($handle = fopen("players.csv", "r")) !== FALSE) {
   while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
      $id = $data[0];
      $firstname = $data[1];
      $lastname = $data[2];
      $image = $data[3];

      $valid_player = in_array($id, $player_ids);

      if ($valid_player) {
        $players[$id] = array(
          "id" => $id, 
          "firstname" => $firstname, 
          "lastname" => $lastname, 
          "image" => $image
        );
      }
   }
   fclose($handle);
}

// Now save serialized players data
$ser = serialize($players);
file_put_contents('players-alternate.data', $ser);
echo 'Saved players-alternate.data to disk';

?>
