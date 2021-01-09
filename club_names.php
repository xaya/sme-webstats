<?php

// $club_pack is set in "set_pack.php". It's for switching to 
// and alternate pack.

// The $club_pack file is serialized data in a flat file, e.g. clubs.data.
$obj = file_get_contents($club_pack);

// The $clubs variable now contains all of the club names and other data
$clubs = unserialize($obj);
// $clubs is used like this:
// $club_id   = $clubs["$club_id"];
// OR
// $club_id   = $clubs["$club_id"]['id'];
// $club_name = $clubs["$club_id"]['name'];
// $club_logo = $clubs["$club_id"]['image'];

// This accepts a club_id and the club data to look in, i.e. $clubs.
// It gets the name of the club, e.g. Antigonish Crows
function GetClubName($club_id, $clubs)
{
  return $clubs["$club_id"]['name']; 
}

// This accepts a club_id and the club data to look in, i.e. $clubs.
// It gets the image data, e.g. a URL
function GetClubLogo($club_id, $clubs)
{
  echo $clubs["$club_id"]['image']; 
}

?>

