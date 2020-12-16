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
                <a href="leagues.php" class="active">Leagues</a>
                <a href="managers.php">Managers</a>
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
        $string = file_get_contents("leagues.json");
        $data = json_decode($string, true);
        $results = $data['leagues'];//['data'];
        $main_data = array();

        foreach($results as $key=>$val):
          array_push($main_data,strval($key));
        endforeach;
        sort($main_data);
      ?>

      <div class="row">
        <div class="col-12">
          <!-- Table Container -->
          <div class="cont-tbl">
            <div class="hr-table-heading">
              <div class="hr-cont-dropdown">
                <div class="hr-dropdown-active"></div>
                <ul class="hr-dropdown-list">
                  <?php foreach ( $main_data as $vals ):?>
                  <li data-clname=".hr-cont-tbl-<?php echo $vals;?>">
                    <?php echo $vals;?>
                  </li>
                  <?php endforeach;?>
                </ul>
              </div>
            </div>
            <?php foreach ( $results as $keys => $vals ):?>
            <div class="hr-cont-tbl hr-cont-tbl-<?php echo $keys?>">

              <table class="table tbl-hr tbl-hr-league hr-tbl-datatables display responsive nowrap" width="100%"
                id="tbl-<?php echo $keys?>">
                <thead>
                  <tr>
                    <th scope="col">POS</th>
                    <th scope="col">Club</th>
                    <th scope="col" data-priority="2">Manager</th>
                    <th scope="col">PL</th>
                    <th scope="col">W</th>
                    <th scope="col">D</th>
                    <th scope="col">L</th>
                    <th scope="col">G+</th>
                    <th scope="col">G-</th>
                    <th scope="col">GD</th>
                    <th scope="col">F</th>
                    <th scope="col" data-priority="1">P</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ( $vals as $key => $val ):?>
                  <tr>
                    <td><?php echo $val['new_position'];?></td>
                    <td><i class="gg-shield" style="background-color:#<?php echo $val['home_colour'];?>"></i><span
                        class="clubid-txt"><?php echo $val['club_id'];?></span></td>
                    <td><?php echo $val['manager_name'];?></td>
                    <td class="colspanright"><?php echo $val['played'];?></td>
                    <td class="colspanright"><?php echo $val['won'];?></td>
                    <td class="colspanright"><?php echo $val['drawn'];?></td>
                    <td class="colspanright"><?php echo $val['lost'];?></td>
                    <td class="colspanright"><?php echo $val['goals_for'];?></td>
                    <td class="colspanright"><?php echo $val['goals_against'];?></td>
                    <td class="colspanright"><?php echo $val['goals_for'] - $val['goals_against']?></td>
                    <td class="colspanright">
                      <span class="tbl-league-form tbl-league-form-<?php echo substr($val['form'], 0,1);?>"></span>
                      <span class="tbl-league-form tbl-league-form-<?php echo substr($val['form'], 1,1);?>"></span>
                      <span class="tbl-league-form tbl-league-form-<?php echo substr($val['form'], 2,1);?>"></span>
                      <span class="tbl-league-form tbl-league-form-<?php echo substr($val['form'], 3,1);?>"></span>
                      <span class="tbl-league-form tbl-league-form-<?php echo substr($val['form'], 4,1);?>"></span>
                      <span class="tbl-league-form tbl-league-form-<?php echo substr($val['form'], 5,1);?>"></span>

                    </td>
                    <td class="colspanright"><?php echo $val['pts'];?></td>
                  </tr>
                  <?php endforeach; ?>

                </tbody>
              </table>
            </div>

            <?php endforeach; ?>
          </div>
          <!-- Table Container -->
        </div>
      </div>
    </div>
    <!-- Content -->
  </div>

  <script type="text/javascript" src="libraries/acmeticker.js"></script>
  <script type="text/javascript" src="libraries/main.js"></script>

  <script type="">
    $(document).ready(function(){
      initNewsTicker();
      initStickyHeader();
			if($('.hr-tbl-datatables').length)
			{
				$('.hr-tbl-datatables').each(function(){
					$("#" + $(this).attr("id")).DataTable({
            // responsive:true,
						"searching": false,
            "paginate":false,
            "info":false
					});
				});
				//show first table
				$($('.hr-dropdown-list>li:first').data('clname')).show();
				$('.hr-dropdown-active').html('LEAGUE '+$('.hr-dropdown-list>li:first').html());
				$('.hr-dropdown-list>li:first').addClass('active');
				$('.hr-dropdown-active').click(function(){
					$('.hr-dropdown-list').show();
				});
				//league selection
				$('.hr-dropdown-list li').click(function(){
					$('.hr-dropdown-list>li.active').removeClass('active');
					$('.hr-cont-tbl').hide();
					$($(this).data('clname')).show();
					$(this).addClass('active');
				$('.hr-dropdown-active').html('LEAGUE '+$(this).html());
					$('.hr-dropdown-list').hide();
				});
			}
               

		});
		</script>
</body>

</html>