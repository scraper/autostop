<?php include '_partials/header.php'; ?>
<ul class="thumbnails">
	<li class="span2">
		<div class="thumbnail">
			<img id="picture" src="" data-src="holder.js/300x200" alt="">
		</div>
	</li>
	<li class="span5">
		<div class="thumbnail">
			<h4 id="profile_legend"></h4>
			<div id="controls">
				<form id="form">
					<table class="table table-hover">
						<tbody>
							<tr>
								<td>
									<span class="profile-page" id="driver" name="isDriver"></span>
								</td>
							</tr>
							<tr id="vehicle_info">
								<td>
									<label id="label_vehicle" for="vehicle">Авто (марка, модель):</label>
									<span class="profile-page" type="text" id="vehicle" name="vehicle"></span>
									
									<label id="label_v_color" for="v_color">Колір:</label>
									<span class="profile-page" type="text" id="v_color" name="v_color"></span>
									
									<label id="label_climat" for="climat">Наявність клімат контролю:</label>
									<span  class="profile-page" id="climat" name="climat"></span>
									<p></p>
									
									<label id="label_experience" for="experience">Стаж водіння:</label>
									<span class="profile-page" id="experience"></span>
								</td>
							</tr>
							<tr>
								<td>
									<label id="label_smoking" for="smoking">Куріння:</label>
									<span class="profile-page" id="smoking" name="smoking"></span>
								</td>
							</tr>
							<tr>
								<td>
									<label id="label_email" for="email">E-mail:</label>
									<span class="profile-page" type="text" id="email" name="email"></span>

									<label id="label_phone" for="phone">Телефон:</label>
									<span class="profile-page" type="text" id="phone" name="phone"></span>
								</td>
							</tr>
						</tbody>
					</table>
					
					
				</form>
			</div>
		</div>
	</li>
	<li class="span5">
		<div class="thumbnail">
			<h4>Останні маршрути:</h4>
			<div>
				<button id="showUserRoutes" class="btn btn-info">Всі маршрути</button>
			</div>
		</div>
	</li>
</ul>

<div class="container-fluid">
	<div class="row-fluid">
<!-- 		<div class="span3">
			<div>
				<h4 id="profile_legend"></h4>
				<img id="picture" src="" style="border-radius:5px">
			</div>
			<p></p>
			<div>
				<button id="showUserRoutes" class="btn btn-info">Маршрути користувача</button>
			</div>
		</div>	 -->	
		<div class="span5">
			<!-- <h4>Мої дані:</h4>			 -->

<!-- 			<div id="controls">
				<form id="form">
					<table class="table table-hover">
						<tbody>
							<tr>
								<td>
									<span class="profile-page" id="driver" name="isDriver"></span>
								</td>
							</tr>
							<tr id="vehicle_info">
								<td>
									<label id="label_vehicle" for="vehicle">Авто (марка, модель):</label>
									<span class="span12 profile-page" type="text" id="vehicle" name="vehicle"></span>
									
									<label id="label_v_color" for="v_color">Колір:</label>
									<span class="span12 profile-page" type="text" id="v_color" name="v_color"></span>
									
									<label id="label_climat" for="climat">Наявність клімат контролю:</label>
									<span  class="profile-page" id="climat" name="climat"></span>
									<p></p>
									
									<label id="label_experience" for="experience">Стаж водіння:</label>
									<span class="span12 profile-page" id="experience"></span>
								</td>
							</tr>
							<tr>
								<td>
									<label id="label_smoking" for="smoking">Куріння:</label>
									<span class="profile-page" id="smoking" name="smoking"></span>
								</td>
							</tr>
							<tr>
								<td>
									<label id="label_email" for="email">E-mail:</label>
									<span class="span12 profile-page" type="text" id="email" name="email"></span>

									<label id="label_phone" for="phone">Телефон:</label>
									<span class="span12 profile-page" type="text" id="phone" name="phone"></span>
								</td>
							</tr>
						</tbody>
					</table>
					
					
				</form>
			</div> -->
		</div>
		
	</div>
</div>

<div id="myModal" class="modal hide fade in">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
		<h3>Профіль збережено</h3>
	</div>
	<div class="modal-body">
		<p>Ваші дані успішно збережені</p>
	</div>
	<div class="modal-footer">
		<a href="#" class="btn btn-info" data-dismiss="modal">OK</a>
	</div>
</div>
<script type="text/javascript" src="/js/profile.js"></script>
<script type="text/javascript" src="/js/validation2.js"></script>
<?php include '_partials/footer.php'; ?>