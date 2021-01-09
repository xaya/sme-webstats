<?php

// $player_pack is set in "set_pack.php". It's for switching to 
// and alternate pack.

// The $player_pack file is serialized data in a flat file, e.g. players.data.
$obj = file_get_contents($player_pack);
// The $players variable now contains all of the player names and other data
$players = unserialize($obj);
// $players is used like this:
// $player_id = $players["$player_id"];
// OR
// $player_id        = $players["$player_id"]['id'];
// $player_firstname = $players["$player_id"]['firstname'];
// $player_lastname  = $players["$player_id"]['lastname'];
// $player_photo     = $players["$player_id"]['image'];

// This accepts a player_id and the player data to look in, i.e. $players.
// It gets the full name of the player, e.g. Murray ROTHBARD
function GetPlayerName($player_id, $players)
{
  return $players["$player_id"]['firstname'] . ' ' . $players["$player_id"]['lastname']; 
}

// This accepts a player_id and the player data to look in, i.e. $players.
// It gets the image data, e.g. a URL
function GetPlayerImage($player_id, $players)
{
  return $players["$player_id"]['image']; 
}

// This is a test that you can uncomment and run.
//echo 'NAME ==> ' . GetPlayerName('85260', $players) . ' ' . GetPlayerImage('85260', $players);

?>

