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
                <a href="managers.php">Managers</a>
                <a href="club-shares.php" class="active">Club Shares</a>
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
        $string = file_get_contents("clubs.json");
        $data = json_decode($string, true);
        $results = $data;
        foreach ($results as $key =>  $val ) {
            $results[$key]['market_cap'] = (int) $val['last_price'] * (int) $val['num_shares'];
            
        }

        $keys = array_column($results, 'market_cap');
        array_multisort($keys, SORT_DESC, $results);


        $display = 9999; // Change this variable to display number of records
      ?>

      <div class="row">
        <div class="col-12">
          <div class="cont-tbl">

            <div class="hr-table-heading">Club Shares</div>
            <table class="table tbl-hr tbl-hr-cs display responsive nowrap" width="100%" id="tbl-clubshares"
              data-page-length="20" data-length-menu="[10,20,50,100]">
              <thead>
                <tr>
                  <th data-searchable="false">#</th>
                  <th data-priority="1">Club Id</th>
                  <th data-searchable="false">Best Ask</th>
                  <th data-searchable="false">Best Bid</th>
                  <th data-searchable="false" data-priority="2">Last Price</th>
                  <th data-searchable="false">Num Shares</th>

                  <th data-searchable="false" class="text-left" data-priority="3">Market Cap</th>
                </tr>
              </thead>
              <tbody>
                <?php $i=1; ?>
                <?php foreach ( $results as $key => $val ): ?>

                <?php if ($key <= $display) : ?>

                <tr>
                  <td><?php echo $i;?></td>
                  <td><i class="gg-shield" style="background-color:#<?php echo $val['home_colour'];?>"></i><span
                      class="clubid-txt"><?php echo $val['share']['club'];?></span>
                  </td>
                  <td class="colspanright"><?php echo  (!empty($val['best_ask']))?'&#8375; '.$val['best_ask']:'';?></td>
                  <td class="colspanright"><?php echo  (!empty($val['best_bid']))?'&#8375; '.$val['best_bid']:'';?></td>
                  <td class="colspanright"><?php echo  (!empty($val['last_price']))?'&#8375; '.$val['last_price']:'';?>
                  </td>
                  <td><?php echo $val['num_shares'];?></td>

                  <td class="text-left colspanright">
                    <?php echo  '&#8375; '.number_format($val['market_cap'],0,'.',',');?></td>
                </tr>
                <?php $i++;endif;?>
                <?php  endforeach; ?>
              </tbody>
            </table>
          </div>

        </div>
      </div>
    </div>
    <!-- Content -->
  </div>

  <script type="text/javascript" src="libraries/acmeticker.js"></script>
  <script type="text/javascript" src="libraries/main.js"></script>

  <script type="text/javascript">
  $(document).ready(function() {
    initNewsTicker();
    initStickyHeader();

    $('#tbl-clubshares').DataTable({
      "language": {
        "search": "Search Club ID:"
      }
    });

  });
  </script>
</body>

</html>