<?php
// This allows using an alternate data set, e.g. you could create a data set of movie or cartoon characters for players, etc. See below for how to create a new pack.
$pack = $_GET['pack']; // Data passed as ?pack=<name>
$player_pack = 'players.data'; // The default player pack
$club_pack = 'clubs.data';     // The default club
// Setting $pack should be done in a session variable or a cookie. GET is used in the example above as it's easy to test during development.

// An example of a pack named "alternate" being set
if ($pack == 'alternate') {
  $player_pack = 'players-alternate.data';
  $club_pack = 'clubs-alternate.data';
  }

// $club_pack and $player_pack are used in the club_names.php and player_names.php files.

// CREATING A NEW PACK
// 
// Full working examples for creating packs from CSV files are
// available in cs.php and ps.php.
// 
// The data in the default pack is created like so:
// We need to know all of the club and player IDs that are used in the
// game. You can get that from the SM Elite SQLite database located in:
// %appdata%\..\Roaming\XAYA-Electron\scmdata\smc\main\storage.sqlite
// Open that in a SQLite brower then get the players like this:
// select player_id from players
// order by player_id
// And the clubs like this:
// select club_id from clubs 
// order by club_id 
// Assembling that data into an array gives us something like this (check the file contents - it's too large to consume here):
// require "ids.php";
// If you run out of memory, consider splitting the player IDs into many different variables. 
// Create an array to hold the club and player data:
// $clubs = array();
// Loop over whatever data source you're pulling data from. This example assumes a SimpleXML object, but it could be anything, e.g. a CSV file.
// for ($i = 0; $i < count($list); $i++) {
//   $id = $list[$i]->attributes()->id->__toString ( ); 
//   $name = $list[$i]->attributes()->n->__toString ( ); 
//   $image = $list[$i]->attributes()->i->__toString ( );
// You must check that you only create clubs/players that are used in the game. The following line uses the data in the ids.php file. 
//   $valid_club = in_array($id, $club_ids);
// 
//   if ($valid_club) {
//     $clubs[$id] = array(
//       "id" => $id, 
//       "name" => $name, 
//       "image" => $image
//     );
//   }
// }
// The player data was created like so:
//   $players[$id] = array(
//     "id" => $id, 
//     "firstname" => $first_name, 
//     "lastname" => $last_name, 
//     "image" => $image
//   );
// Data is then simply serialised to disk like this:
// $ser = serialize($players);
// file_put_contents('players.data', $ser);
//
// Make sure to give your own pack a unique name


?>