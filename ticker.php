<!-- Ticker -->
<div class="cont-ticker">
  <div class="row">
    <div class="col-12">
      <div class="cont-hr-ticker">
        <!-- <div class="hr-ticker-heading">Share Trades</div> -->
        <div class="ticker-heading-icon">
          <img src="assets/icon-news.png">
        </div>
        <div class="cont-ticker-headings">
          <ul>
            <li><span>Share Trades</span></li>
            <li><span>Completed Transfers</span></li>
            <li><span>Rich & Poor</span></li>
            <li><span>Manager & Agents</span></li>
          </ul>
        </div>

        <div class="hr-ticker-box">
          <ul class="hr-ticker">

            <li>

              <?php
                    $string_ticker_clubshares = file_get_contents("ticker/ticker_clubshares.json");
                    $data_ticker_clubshares = json_decode($string_ticker_clubshares, true);
                    $results_ticker_clubshares = $data_ticker_clubshares['result']['data'];
            
                    $string_ticker_playershares = file_get_contents("ticker/ticker_playershares.json");
                    $data_ticker_playershares = json_decode($string_ticker_playershares, true);
                    $results_ticker_playershares = $data_ticker_playershares['result']['data'];
                  ?>
              <span class="ticker-cat" id="ticker-cat-0" data-catheading="Share Trades">
                <span class="ticker-cat-heading">Share Trades : </span>
                <span class="cont-ticker-data">
                  <?php foreach ( $results_ticker_clubshares as $key => $val ): 
                    ?>
                  <span class="ticker-data-single">Club <?php echo $val['share']['club'];?> -
                    <span
                      class="ticker-data-arrow ticker-data-<?php echo ($val['type']=='buy')?'green':'red';?>">&#8375;<?php echo $val['price'];?></span>
                  </span>
                  <?php endforeach; ?>
                  <?php foreach ( $results_ticker_playershares as $key => $val ): 
                    ?>
                  <span class="ticker-data-single">Player <?php echo $val['share']['player'];?> -
                    <span
                      class="ticker-data-arrow ticker-data-<?php echo ($val['type']=='buy')?'green':'red';?>">&#8375;<?php echo $val['price'];?></span>
                  </span>
                  <?php endforeach; ?>
                </span>
              </span>
              <!-- Ticker Category -->
              <?php
                    $string_ticker_completedtransfers = file_get_contents("ticker/ticker_lasttransfers.json");
                    $data_ticker_completedtransfers = json_decode($string_ticker_completedtransfers, true);
                    $results_ticker_completedtransfers = $data_ticker_completedtransfers['result']['data'];
                  ?>
              <span class="ticker-cat" id="ticker-cat-1" data-catheading="Completed Transfers">
                <span class="ticker-cat-heading">Completed Transfers : </span>
                <span class="cont-ticker-data">
                  <?php foreach ( $results_ticker_completedtransfers as $key => $val ): 
                    ?>
                  <span class="ticker-data-single">Player <?php echo $val['player'];?> > Club
                    <?php echo $val['newclub'];?>
                    for
                    <span class="ticker-data-green">&#8375;<?php echo number_format($val['amount'],0,'.',',');?></span>
                  </span>
                  <?php endforeach; ?>
                </span>
              </span>
              <!-- Ticker Category -->
              <?php
                      $string_ticker_richpoor = file_get_contents("ticker/ticker_richpoor.json");
                      $data_ticker_richpoor = json_decode($string_ticker_richpoor, true);
                      $results_ticker_poor = $data_ticker_richpoor['result']['data']['poor'];
                      $results_ticker_rich = $data_ticker_richpoor['result']['data']['rich'];
                  ?>
              <span class="ticker-cat" id="ticker-cat-2" data-catheading="Rich & Poor">
                <span class="ticker-cat-heading">Rich & Poor : </span>
                <span class="cont-ticker-data">
                  <?php foreach ( $results_ticker_poor as $key => $val ): 
                    ?>
                  <span class="ticker-data-single">Club <?php echo $val['club'];?> <span
                      class="ticker-data-arrow ticker-data-red">-&#8375;<?php echo number_format(abs($val['balance']),0,'.',',');?></span>
                  </span>
                  <?php endforeach; ?>
                  <?php foreach ( $results_ticker_rich as $key => $val ): 
                    ?>
                  <span class="ticker-data-single">Club <?php echo $val['club'];?> <span
                      class="ticker-data-arrow ticker-data-green">&#8375;<?php echo number_format(abs($val['balance']),0,'.',',');?></span>
                  </span>
                  <?php endforeach; ?>
                </span>
              </span>
              <!-- Ticker Category -->
              <!-- Ticker Category -->
              <?php
                $string_ticker_manageragents = file_get_contents("ticker/ticker_manageragentnews.json");
                $data_ticker_manageragents = json_decode($string_ticker_manageragents, true);
                $results_ticker_manageragents = $data_ticker_manageragents['result']['data'];
        ?>
              <span class="ticker-cat" id="ticker-cat-3" data-catheading="Manager Agents">
                <span class="ticker-cat-heading">Manager & Agents : </span>
                <span class="cont-ticker-data">
                  <?php foreach ( $results_ticker_manageragents as $key => $val ): 
                    ?>
                  <span class="ticker-data-single">
                    <?php
                    if($val['type']=='manager resigned')
                    {
                      echo '<span class="ticker-data">'.$val['name'].' Resigns</span>' . ((array_key_exists('club',$val))?' Club ' . $val['club']:' Player ' . $val['player']);
                    }
                    else
                    {
                      echo '<span class="ticker-data-yellow">'.$val['name'].'</span>' . ((array_key_exists('club',$val))?' Club ' . $val['club']:' Player ' . $val['player']);
                    }
                    ?>
                  </span>
                  <?php endforeach; ?>
                </span>
              </span>
              <!-- Ticker Category -->
            </li>
          </ul><!-- hr-ticker -->
        </div><!-- hr-ticker-box -->
      </div><!-- cont-hr-ticker -->
    </div><!-- col-12-->
  </div><!-- row -->
</div>
<!-- Ticker -->