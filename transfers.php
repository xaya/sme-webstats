<!DOCTYPE html>
<html lang="en">
<?php
?>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SOCCER MANAGER ELITE</title>

  <link rel="stylesheet" type="text/css" href="//stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css"
    href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.dataTables.min.css">
  <script type="text/javascript" src="//code.jquery.com/jquery-3.5.1.min.js"></script>
  <script type="text/javascript" src="//stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js">
  </script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
    integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous" />

  <link rel="stylesheet" href="libraries/style.min.css">
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="responsive.css">

</head>

<body>
  <div class="container">
    <div class="cont-header">
      <!-- Header -->
      <header class="sticky-navbar-top">
        <div class="row">
          <div class="col-12 col-md-12 col-lg-4 text-center text-lg-left">
            <a href="https://soccermanagerelite.com/"><img src="assets/sme-logo2.png" alt="Soccer Manager Elite"></a>
          </div>
          <!-- Navigation -->
          <div class="col-12 col-md-12 col-lg-8">
            <nav class="navbar navbar-expand-md">
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navmenu"
                aria-controls="navmenu" aria-expanded="false" aria-label="Menu">
                <i class="fas fa-bars"></i>
              </button>

              <div class="collapse navbar-collapse" id="navmenu">
                <a href="leagues.php">Leagues</a>
                <a href="managers.php">Managers</a>
                <a href="club-shares.php">Club Shares</a>
                <a href="player-shares.php">Player Shares</a>
                <a href="transfers.php" class="active">Transfers</a>
              </div>
            </nav>
          </div>
          <!-- Navigation -->
        </div>
      </header>
      <!-- Header -->

      <!-- Statistics -->
      <div class="cont-statistics">
        <?php
          $str_totals = file_get_contents("res_totals.json");
          $data_totals = json_decode($str_totals, true);
        ?>
        <div class="row">
          <div class="col-lg-12 col-xl-6">
            <div class="stat-single float-left">

              <div class="stats-title">Total <span><img src="assets/icon-stats-total.png"></span></div>
              <div class="stats-val">Users
                <span><?php echo number_format($data_totals['total_players'],0,'.',',');?></span>
              </div>
              <div class="stats-val">Managers
                <span><?php echo number_format($data_totals['total_managers'],0,'.',',');?></span>
              </div>
            </div>
          </div>
          <div class="col-lg-12 col-xl-6">
            <div class="stat-single float-left float-lg-right">

              <div class="stats-title">Market Cap <span><img src="assets/icon-market-cap.png"></span></div>
              <div class="stats-val">Clubs
                <span><?php echo '&#8375; '.number_format($data_totals['ms_clubs'],0,'.',',');?></span>
              </div>
              <div class="stats-val">Players
                <span><?php echo  '&#8375; '.number_format($data_totals['ms_players'],0,'.',',');?></span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Statistics -->
      <?php include('ticker.php');?>
    </div>


    <!-- Content -->
    <div class="cont-content">

      <?php

        $current_block_orig = fopen("https://soccermanagerelite.com/stats/currentblock.txt","r");
        $current_block = fgets($current_block_orig);
        fclose($current_block_orig);

        $string = file_get_contents("transfers.json");
        $data = json_decode($string, true);
        $results = $data['result']['data'];
        $pos_array = ['1'=>'GK','2'=>'DL','4'=>'DC','8'=>'DR','16'=>'DML','32'=>'DMC','64'=>'DMR','128'=>'ML','256'=>'MC','512'=>'MR','1024'=>'AML','2048'=>'AMC','4096'=>'AMR','8192'=>'FL','16384'=>'FC','32768'=>'FR'];

        $display = 1000; // Change this variable to display number of records

        function secondsToTime($seconds) {
          $dtF = new \DateTime('@0');
          $dtT = new \DateTime("@$seconds");
          // return $dtF->diff($dtT)->format('%a days %h:%i:%s');
          if($dtF->diff($dtT)->format('%a')>0)
          {
            return ($dtF->diff($dtT)->format('%a')>1)?$dtF->diff($dtT)->format('%a days'):$dtF->diff($dtT)->format('%a day');
          }
          elseif($dtF->diff($dtT)->format('%a')<1 && $dtF->diff($dtT)->format('%h')>0)
          {
            return ($dtF->diff($dtT)->format('%h')>1)?$dtF->diff($dtT)->format('%h hours'):$dtF->diff($dtT)->format('%h hour');
          }
          elseif($dtF->diff($dtT)->format('%h')<1 && $dtF->diff($dtT)->format('%i')>0)
          {
            return ($dtF->diff($dtT)->format('%i')>0)?$dtF->diff($dtT)->format('%i minutes'):$dtF->diff($dtT)->format('%i minute');
          }
          else{
            return $dtF->diff($dtT)->format('%s seconds');
          }
        }

      ?>

      <div class="row">
        <div class="col-12">
          <div class="cont-tbl">
            <div class="hr-table-heading">
              Transfers
            </div>
            <table class="table tbl-hr tbl-hr-transfers display responsive nowrap" width="100%" cellspacing="3"
              id="tbl-transfers" data-page-length="20" data-length-menu="[10,20,50,100]">
              <thead>
                <tr>
                  <th scope="col" data-priority="1">POS</th>
                  <th scope="col" data-priority="2">Player ID</th>
                  <th scope="col" data-searchable="false" class="text-left">Club ID</th>
                  <th scope="col" data-searchable="false">Rating</th>
                  <th scope="col" data-searchable="false">Time Remaining</th>
                  <th scope="col" data-searchable="false" data-priority="3">Highest Bid</th>
                  <th scope="col" data-searchable="false">Bids</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ( $results as $key => $val ): 

            $remainingSeconds = (intval($val['end_height']) - intval($current_block))*30;

							?>
                <tr>
                  <td>
                    <?php echo (array_key_exists($val['position'],$pos_array))?$pos_array[$val['position']]:$val['position'];?>
                  </td>
                  <td><?php echo GetPlayerName($val['player_id'], $players) . ' (' . $val['player_id'] . ')';?></td>
                  <td class="text-left"><?php echo GetClubName($val['club_id'], $clubs) . ' (' . $val['club_id'] . ')';?></td>
                  <td class="colspanright"><?php echo $val['rating'];?></td>
                  <td class="colspanright" data-order="<?php echo abs($remainingSeconds);?>">
                    <?php echo secondsToTime($remainingSeconds);?></td>
                  <td class="colspanright">
                    <?php echo (!empty($val['current_bid']))?'&#8375; '.number_format(intval($val['current_bid']),0,'.',','):$val['current_bid'];?>
                  </td>
                  <td class="colspanright"><?php echo $val['num_bids'];?></td>
                </tr>
                <?php  endforeach; ?>
              </tbody>
            </table>
          </div>

        </div>
      </div>
    </div>
    <!-- Content -->
<?php include 'footer.php' ?>
  </div>

  <script type="text/javascript" src="libraries/acmeticker.js"></script>
  <script type="text/javascript" src="libraries/main.js"></script>

  <script type="">
    $(document).ready(function() {
      initNewsTicker();
      initStickyHeader();
    $('#tbl-transfers').DataTable({
      "language": {
        "search": "Filter by POS & Player ID:"
      },
      "order": [
        [4, "asc"]
      ]
    });

  });
		</script>
</body>

</html>