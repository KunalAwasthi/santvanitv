<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

<div class="col-sm-3 col-md-2 sidebar">
			<div class="top-navigation">
				<div class="t-menu">MENU</div>
				<div class="t-img">
					<img src="images/lines.png" alt="" />
				</div>
				<div class="clearfix"> </div>
			</div>
				<div class="drop-navigation drop-navigation">
				  <ul class="nav nav-sidebar">
					<li class="active"><a href="index.php" class="home-icon"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
					<li><a href="mostViewed.php" class="user-icon"><span class="glyphicon glyphicon-home glyphicon-blackboard" aria-hidden="true"></span>Most Viewed</a></li>
					<li><a href="recent.php" class="sub-icon"><span class="glyphicon glyphicon-home glyphicon-hourglass" aria-hidden="true"></span>Recent Videos</a></li>
					<li><a href="#" class="menu1"><span class="glyphicon glyphicon-film" aria-hidden="true"></span>Category<span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span></a></li>
						<ul class="cl-effect-2">
							<li><a href="bhagwat_katha.php">Bhagwat Katha</a></li>                                             
							<li><a href="mahera.php">Mahera</a></li>
							<li><a href="ram_katha.php">Ram Katha</a></li> 
						</ul>
						<!-- script-for-menu -->
						<script>
							$( "li a.menu1" ).click(function() {
							$( "ul.cl-effect-2" ).slideToggle( 300, function() {
							// Animation complete.
							});
							});
						</script>
					<li><a href="#" class="menu"><span class="glyphicon glyphicon-film glyphicon-king" aria-hidden="true"></span>Katha Vyas<span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span></a></li>
						<ul class="cl-effect-1">
							<li><a href="ramprasadji_maharaj.php">Ramprasad Ji Maharaj</a></li>                                             
							<li><a href="radhakishanji.php">Radhakishan Ji</a></li>
							<li><a href="pundrikji.php">Pundrik Ji</a></li> 
							<li><a href="allArtists.php">More</a></li>  
						</ul>
						<!-- script-for-menu -->
						<script>
							$( "li a.menu" ).click(function() {
							$( "ul.cl-effect-1" ).slideToggle( 300, function() {
							// Animation complete.
							});
							});
						</script>
					<li><a href="bhajan.php" class="song-icon"><span class="glyphicon glyphicon-music" aria-hidden="true"></span>Bhajan</a></li>
					<li><a href="news.php" class="news-icon"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>News</a></li>
				  </ul>
				  <!-- script-for-menu -->
						<script>
							$( ".top-navigation" ).click(function() {
							$( ".drop-navigation" ).slideToggle( 300, function() {
							// Animation complete.
							});
							});
						</script>
					<div class="side-bottom">
						<div class="side-bottom-icons">
							<ul class="nav2">
								<li><a href="https://www.facebook.com/santvanitv" class="facebook" target="_blank"> </a></li>
								<li><a href="https://twitter.com/GopalCh03196393" class="facebook twitter" target="_blank"> </a></li>
								<li><a href="https://www.youtube.com/channel/UCjHSaymdy1qD5a0wBDAgDKA" class="facebook youtube" target="_blank"> </a></li>
								<li><a href="https://plus.google.com/u/0/+SantvaniTV" class="facebook google_plus" target="_blank"> </a></li>
							</ul>
						</div>
						<div class="copyright">
							<p>Copyright © <?php echo date("Y"); ?> Santvani TV. All Rights Reserved.</p>
						</div>
					</div>
				</div>
        </div>