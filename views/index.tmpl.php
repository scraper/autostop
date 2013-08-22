<?php include '_partials/header.php'; ?>

<script type="text/javascript" src="./js/search.js"></script>
<style type="text/css">

.span3:hover {
    -webkit-box-shadow: 0 8px 6px -6px black;
       -moz-box-shadow: 0 8px 6px -6px black;
            box-shadow: 0 8px 6px -6px black;
},

.thumbnails {cursor: default;}
</style>
      
<div class="container-fluid">
	<div id="main" class="span10">
		<ul class="thumbnails">
			
        <li class="span3" onclick="location.href='/new.php';">
  				<div class="thumbnail" style="height:316px;cursor: pointer;">
  					<img src="/imgs/1352332454_Contacts.png">
  					<div class="caption">
  						<h3>Додати маршрут</h3>
  						<p>Соціальний сервіс, який дозволяє об'єднати водіїв і пасажирів, яким по дорозі. Добавте маршрут та подорожуйте весело й економно!</p>
  					</div>
  				</div>
  			</li>
      
			
        <li class="span3" onclick="location.href='/search.php';">
          <div class="thumbnail" style="cursor: pointer;">
            <img src="/imgs/1352332584_Search.png" alt="">
            <div class="caption">
              <h3>Пошук</h3>
              <p>Ви можете знайти тут водіїв, які шукають попутчиків, або ж пасажирів, яким потрібно дістатись того ж міста, що й Вам, якщо ви водій.</p>
            </div>
          </div>
        </li>
      
      
        <li class="span4">
          <div class="thumbnail" style="height:316px;cursor: default;">
            <img alt="">
            <div class="caption">
              <h4>Нові маршрути:</h4>
              <table class="table table-hover">
                <thead>
                  <tr>
                    <!-- <th>Нові маршрути:</th> -->
                  </tr>
                </thead>
                <tbody class="tbody">
                 
                </tbody>
              </table>
            </div>
          </div>
        </li>
      

	  </ul>

	</div>
</div>

      </div><!--/row-->

      <hr>

      <footer>
        <p>&copy; Company 2012</p>
      </footer>

    </div><!--/.fluid-container-->

</div>

</div>
<script type="text/javascript" src="/js/top_routes.js"></script>
<?php include '_partials/footer.php'; ?>