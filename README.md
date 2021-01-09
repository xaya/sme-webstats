# sme-webstats

This is a statistics website for Soccer Manager Elite (SM Elite). You can see a live version of it here:

https://soccermanagerelite.com/stats/leagues.php

# Running your own instance

You can run your own with the code provided here. 

You may use and modify the code and images, however it must be clearly stated somewhere that it is an unofficial website or a fan site.

The JSON data can be aquired from the `smcd.exe` Xaya GSP (daemon) or you can download the JSON data from the Soccer Manager Elite website (for now and if not abused). (The JSON files are updated every few minutes.) Use the `sme_downloader.sh` script in a cron job to periodically download the JSON. Change the path variable in `sme_downloader.sh` to suit your server environment. Make sure to move it outside of your website folder so that it is not publically accessible. Running it every 10 minutes should be more than enough. 

Included in the code are some static data JSON files for reference and testing. 

# Custom data packs

You can create your own custom data packs with your own theme, e.g. you could create a "sci-fi" theme with players having the names of famous sci-fi characters and clubs having the names of famous planets. You are only limited by your imagination. 

See the comments inside the `set_pack.php` file for more information. The `pack` folder contains additional files to help you. They are not required for the site to run and should be deleted from a production server. 


