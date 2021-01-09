# Set a temporary variable for the path to the local JSON files.
# Edit this as is appropriate for your server environment.
tmpJsonPath=/path/to/your/website/sme

# You don't need to change anything below here.
wget -q https://soccermanagerelite.com/stats/bestmanagers.json -O $tmpJsonPath/bestmanagers.json.tmp
sleep 0.5
if [ -s $tmpJsonPath/bestmanagers.json.tmp ] ; then
  #File is good, so replace old one.
  rm $tmpJsonPath/bestmanagers.json
  mv $tmpJsonPath/bestmanagers.json.tmp $tmpJsonPath/bestmanagers.json
  touch -m $tmpJsonPath/bestmanagers.json
# else
  #File is bad - leave the old one
fi

wget -q https://soccermanagerelite.com/stats/clubs.json -O $tmpJsonPath/clubs.json.tmp
sleep 0.5
if [ -s $tmpJsonPath/clubs.json.tmp ] ; then
  #File is good, so replace old one.
  rm $tmpJsonPath/clubs.json
  mv $tmpJsonPath/clubs.json.tmp $tmpJsonPath/clubs.json
  touch -m $tmpJsonPath/clubs.json
# else
  #File is bad - leave the old one
fi

wget -q https://soccermanagerelite.com/stats/leagues.json -O $tmpJsonPath/leagues.json.tmp
sleep 0.5
if [ -s $tmpJsonPath/leagues.json.tmp ] ; then
  #File is good, so replace old one.
  rm $tmpJsonPath/leagues.json
  mv $tmpJsonPath/leagues.json.tmp $tmpJsonPath/leagues.json
  touch -m $tmpJsonPath/leagues.json
# else
  #File is bad - leave the old one
fi

wget -q https://soccermanagerelite.com/stats/players.json -O $tmpJsonPath/players.json.tmp
sleep 0.5
if [ -s $tmpJsonPath/players.json.tmp ] ; then
  #File is good, so replace old one.
  rm $tmpJsonPath/players.json
  mv $tmpJsonPath/players.json.tmp $tmpJsonPath/players.json
  touch -m $tmpJsonPath/players.json
# else
  #File is bad - leave the old one
fi

wget -q https://soccermanagerelite.com/stats/res_totals.json -O $tmpJsonPath/res_totals.json.tmp
sleep 0.5
if [ -s $tmpJsonPath/res_totals.json.tmp ] ; then
  #File is good, so replace old one.
  rm $tmpJsonPath/res_totals.json
  mv $tmpJsonPath/res_totals.json.tmp $tmpJsonPath/res_totals.json
  touch -m $tmpJsonPath/res_totals.json
# else
  #File is bad - leave the old one
fi

wget -q https://soccermanagerelite.com/stats/transfers.json -O $tmpJsonPath/transfers.json.tmp
sleep 0.5
if [ -s $tmpJsonPath/transfers.json.tmp ] ; then
  #File is good, so replace old one.
  rm $tmpJsonPath/transfers.json
  mv $tmpJsonPath/transfers.json.tmp $tmpJsonPath/transfers.json
  touch -m $tmpJsonPath/transfers.json
# else
  #File is bad - leave the old one
fi

wget -q https://soccermanagerelite.com/stats/ticker/ticker_clubshares.json -O $tmpJsonPath/ticker/ticker_clubshares.json.tmp
sleep 0.5
if [ -s $tmpJsonPath/ticker/ticker_clubshares.json.tmp ] ; then
  #File is good, so replace old one.
  rm $tmpJsonPath/ticker/ticker_clubshares.json
  mv $tmpJsonPath/ticker/ticker_clubshares.json.tmp $tmpJsonPath/ticker/ticker_clubshares.json
  touch -m $tmpJsonPath/ticker/ticker_clubshares.json
# else
  #File is bad - leave the old one
fi

wget -q https://soccermanagerelite.com/stats/ticker/ticker_lasttransfers.json -O $tmpJsonPath/ticker/ticker_lasttransfers.json.tmp
sleep 0.5
if [ -s $tmpJsonPath/ticker/ticker_lasttransfers.json.tmp ] ; then
  #File is good, so replace old one.
  rm $tmpJsonPath/ticker/ticker_lasttransfers.json
  mv $tmpJsonPath/ticker/ticker_lasttransfers.json.tmp $tmpJsonPath/ticker/ticker_lasttransfers.json
  touch -m $tmpJsonPath/ticker/ticker_lasttransfers.json
# else
  #File is bad - leave the old one
fi

wget -q https://soccermanagerelite.com/stats/ticker/ticker_league1.json -O $tmpJsonPath/ticker/ticker_league1.json.tmp
sleep 0.5
if [ -s $tmpJsonPath/ticker/ticker_league1.json.tmp ] ; then
  #File is good, so replace old one.
  rm $tmpJsonPath/ticker/ticker_league1.json
  mv $tmpJsonPath/ticker/ticker_league1.json.tmp $tmpJsonPath/ticker/ticker_league1.json
  touch -m $tmpJsonPath/ticker/ticker_league1.json
# else
  #File is bad - leave the old one
fi

wget -q https://soccermanagerelite.com/stats/ticker/ticker_manageragentnews.json -O $tmpJsonPath/ticker/ticker_manageragentnews.json.tmp
sleep 0.5
if [ -s $tmpJsonPath/ticker/ticker_manageragentnews.json.tmp ] ; then
  #File is good, so replace old one.
  rm $tmpJsonPath/ticker/ticker_manageragentnews.json
  mv $tmpJsonPath/ticker/ticker_manageragentnews.json.tmp $tmpJsonPath/ticker/ticker_manageragentnews.json
  touch -m $tmpJsonPath/ticker/ticker_manageragentnews.json
# else
  #File is bad - leave the old one
fi

wget -q https://soccermanagerelite.com/stats/ticker/ticker_playershares.json -O $tmpJsonPath/ticker/ticker_playershares.json.tmp
sleep 0.5
if [ -s $tmpJsonPath/ticker/ticker_playershares.json.tmp ] ; then
  #File is good, so replace old one.
  rm $tmpJsonPath/ticker/ticker_playershares.json
  mv $tmpJsonPath/ticker/ticker_playershares.json.tmp $tmpJsonPath/ticker/ticker_playershares.json
  touch -m $tmpJsonPath/ticker/ticker_playershares.json
# else
  #File is bad - leave the old one
fi

wget -q https://soccermanagerelite.com/stats/ticker/ticker_richpoor.json -O $tmpJsonPath/ticker/ticker_richpoor.json.tmp
sleep 0.5
if [ -s $tmpJsonPath/ticker/ticker_richpoor.json.tmp ] ; then
  #File is good, so replace old one.
  rm $tmpJsonPath/ticker/ticker_richpoor.json
  mv $tmpJsonPath/ticker/ticker_richpoor.json.tmp $tmpJsonPath/ticker/ticker_richpoor.json
  touch -m $tmpJsonPath/ticker/ticker_richpoor.json
# else
  #File is bad - leave the old one
fi

wget -q https://soccermanagerelite.com/stats/ticker/ticker_topauctions.json -O $tmpJsonPath/ticker/ticker_topauctions.json.tmp
sleep 0.5
if [ -s $tmpJsonPath/ticker/ticker_topauctions.json.tmp ] ; then
  #File is good, so replace old one.
  rm $tmpJsonPath/ticker/ticker_topauctions.json
  mv $tmpJsonPath/ticker/ticker_topauctions.json.tmp $tmpJsonPath/ticker/ticker_topauctions.json
  touch -m $tmpJsonPath/ticker/ticker_topauctions.json
# else
  #File is bad - leave the old one
fi

