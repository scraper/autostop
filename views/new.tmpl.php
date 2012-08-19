<?php include '_partials/header.php'; ?>

	<div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="./">autostop</a>
          <div class="nav-collapse">
            <ul class="nav">
              <li class="active"><a href="./">Home</a></li>
              <li><a href="#about">About</a></li>
              <li><a href="#contact">Contact</a></li>
            </ul>
            <p class="navbar-text pull-right">Logged in as <a href="#">username</a></p>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

<div class="container-fluid">
    <div class="row-fluid">
        <div class="span3">
          <div class="well sidebar-nav">
            <ul class="nav nav-list">
              <li class="nav-header">Для водія</li>
              <!-- <li class="active"><a href="#">Link</a></li> -->
              <li><a href="new.php">Новий</a></li>
              <li><a href="route.php">Пошук</a></li>
              <li class="nav-header">Для пасажира</li>
              <li><a href="new.php">Новий</a></li>
              <li><a href="route.php">Пошук</a></li>
              <li class="nav-header">Sidebar</li>
              <li><a href="view.php">View</a></li>
            </ul>
          </div><!--/.well -->
        </div><!--/span-->

    	<div class="span9">
    		<div class="row-fluid">
    			<div class="span4">
    				<h2>Карта</h2>
    				<div id="map" style="width:100%;height:400px;"></div>
    			</div><!--/span-->
    			<div class="span4">
    				<h2>Маршрут</h2>
    				<div id="controls">
						<form class="well" action="index.php" method="post">
							<div class="directions">
								<li>
									<label id="a" for="start">З:</label>
									<input class="text_input" type="text" id="start" name="origin"/>
									<label id="b" for="end">До:</label>
									<input class="text_input" type="text" id="end" name="destination"/>
								</li>
								<li id="seats">
									<label>Вільних місць: <input id="seats_i" class="text_input" type="text" name="seats"></label>
								</li>
								<li>	
									<label>Дата: <input type="text" id="date" name="date"></label>
									<label>Ціна за місце: <input type="text" id="date" name="price"></label>
								</li>
								<li>
									<label><input class="radio_input" type="radio" id="driver" name="whoiam">Я - Водій</label>
									<label><input class="radio_input" type="radio" id="passenger" name="whoiam">Я - Пасажир</label>
								</li>
								<div class="btn-group">
									<button class="btn btn-info" id="build_route">Прокласти маршрут</button>
									<button class="btn btn-success" id="submit" type="submit">Додати маршрут</button>
								</div>
							</div>
						</form>
					</div>
    			</div><!--/span-->
    		</div><!--/row-->
   		</div><!--/span-->

    </div><!--/row-->

    <hr>

    <footer>
    	<p>&copy; Company 2012</p>
    </footer>

</div><!--/.fluid-container-->

<script src="js/get_route.js"></script>

<script src="js/ui.js"></script>

<?php include '_partials/footer.php'; ?>