<!DOCTYPE html>
<html lang="en">

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
      <header>
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
                <a href="managers.php" class="active">Managers</a>
                <a href="club-shares.php">Club Shares</a>
                <a href="player-shares.php">Player Shares</a>
                <a href="transfers.php">Transfers</a>
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
$string = file_get_contents("bestmanagers.json");
$data = json_decode($string, true);
$results = $data['result']['data'];
$results_name_merged = array();

foreach($results as $key=>$val):
  if($val['manager_name']!=''):
    if (array_key_exists($val['manager_name'],$results_name_merged))
    {
      $results_name_merged[$val['manager_name']]['lost'] = intval($results_name_merged[$val['manager_name']]['lost'])+intval($val['lost']);
      $results_name_merged[$val['manager_name']]['drawn'] = intval($results_name_merged[$val['manager_name']]['drawn'])+intval($val['drawn']);
      $results_name_merged[$val['manager_name']]['won'] = intval($results_name_merged[$val['manager_name']]['won'])+intval($val['won']);
      $results_name_merged[$val['manager_name']]['points'] = (intval($results_name_merged[$val['manager_name']]['points']))+(intval($val['won'])-intval($val['lost']));
    }
    else
    {
      $results_name_merged[$val['manager_name']] = $val;
      $results_name_merged[$val['manager_name']]['points'] = (intval($val['won'])-intval($val['lost']));
      
    }
  endif;
endforeach;
$keys = array_column($results_name_merged, 'points');
array_multisort($keys, SORT_DESC, $results_name_merged);
$display = 1000; // Change this variable to display number of records

?>

      <div class="row">
        <div class="col-12">
          <div class="cont-tbl">

            <div class="hr-table-heading">
              Managers
            </div>
            <table class="table tbl-hr tbl-hr-bm display responsive nowrap" id="tbl-managers" width="100%"
              cellspacing="3" data-page-length="20" data-length-menu="[10,20,50,100]">
              <thead>
                <tr>
                  <th scope="col" data-searchable="false">POS</th>
                  <!-- <th scope="col" data-searchable="false">CLUB id</th> -->
                  <th scope="col" class="text-left" data-priority="2">MANAGER NAME</th>
                  <th scope="col" data-searchable="false">W</th>
                  <th scope="col" data-searchable="false">D</th>
                  <th scope="col" data-searchable="false">L</th>
                  <th scope="col" data-searchable="false">G</th>
                  <th scope="col" data-searchable="false" data-priority="1">P</th>
                </tr>
              </thead>
              <tbody>
                <?php $i=1; ?>
                <?php foreach ( $results_name_merged as $key => $val ): 
							 if($val['manager_name']!=''):
                ?>
                <?php if ($key <= $display) : ?>
                <tr>
                  <td><?php echo $i;?></td>

                  <!-- <td><?php //echo (!$val['end_date']>0)?$val['club_id']:'';?></td> -->
                  <td class="text-left"><?php echo $val['manager_name'];?></td>
                  <td class="colspanright"><?php echo $val['won'];?></td>
                  <td class="colspanright"><?php echo $val['drawn'];?></td>
                  <td class="colspanright"><?php echo $val['lost'];?></td>
                  <td class="colspanright"><?php echo $val['num_games'];?></td>
                  <td class="colspanright"><?php echo $val['points'];?></td>
                </tr>
                <?php $i++;endif;?>
                <?php endif;?>
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

    initNewsTicker();
    initStickyHeader();
    
      $(document).ready(function() {
    $('#tbl-managers').DataTable({
      "language": {
        "search": "Search Manager:"
      },
      "order": [
        [0, "asc"]
      ]
    });

  });
		</script>
</body>

</html>