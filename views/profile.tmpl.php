<?php include '_partials/header.php'; ?>

<div class="container-fluid">
	<div class="row-fluid">
		<div class="span3">
			<div>
				<h4 id="profile_legend">Профіль <img class="img" src="./imgs/ajax-loader2.gif"></h4>			
				<img id="picture" src="" style="border-radius:5px">
			</div>
			<p></p>
			<div>
				<button id="showUserRoutes" class="btn btn-info">Мої маршрути</button>
				<button id="save_btn" class="btn btn-success" onclick="saveUserDetailes()">Зберегти</button>
			</div>
		</div>		
		<div class="span5">
			<h4>Мої дані:</h4>			
			<!-- <img id="picture" src="" style="border-radius:5px">
			<p></p> -->
			<div id="controls">
				<form id="form">
					<table class="table table-hover">
						<tbody>
							<tr>
								<td>
									<label class="radio inline">
										<input class="profile-page" id="driver_1" type="radio" name="isDriver" value="1">Я водій
									</label>

									<label class="radio inline">
										<input class="profile-page" id="driver_0" type="radio" name="isDriver" value="0">Я пасажир
									</label>									
								</td>
							</tr>
							<tr id="vehicle_info">
								<td>
									<label id="label_vehicle" for="vehicle">Авто (марка, модель):</label>
									<input class="span12 profile-page" type="text" id="vehicle" name="vehicle"/>
									
									<label id="label_v_color" for="v_color">Колір:</label>
									<input class="span12 profile-page validate" type="text" id="v_color" name="v_color"/>
									
									<label class="radio inline">
										<input class="profile-page" id="climat_1" type="radio" name="climat" value="1">Клімат контроль/кондиціонер
									</label>
								
									<label class="radio inline">
										<input class="profile-page" id="climat_0" type="radio" name="climat" value="0">Немає кондиціонеру
									</label>
									<p></p>
									<label id="label_experience" for="experience">Стаж водіння:</label>
									
									<select class="span12 profile-page" id="experience">
										<option value="менше 1 року">менше 1 року</option>
										<option value="1 рік">1 рік</option>
										<option value="2 роки">2 роки</option>
										<option value="3 роки">3 роки</option>
										<option value="4 роки">4 роки</option>
										<option value="5 років">5 років</option>
										<option value="більше 5 років">більше 5 років</option>
									</select>
								</td>
							</tr>
							<tr>
								<td>
									<label class="radio inline">
										<input class="profile-page" id="smoking_0" type="radio" name="smoking" value="0">Не курю
									</label>

									<label class="radio inline">
										<input class="profile-page" id="smoking_1" type="radio" name="smoking" value="1">Курю
									</label>
								</td>
							</tr>
							<tr>
								<td>
									<label id="label_email" for="email">E-mail:</label>
									<input class="span12 profile-page" type="text" id="email" name="email"/>
									<label id="label_phone" for="phone">Телефон:</label>
									<input class="span12 profile-page" type="text" id="phone" name="phone"/>
									<!-- <label id="label_languages" for="languages">Володіння мовами:</label> -->
									<!-- <input class="span12 profile-page" type="text" id="languages" name="languages"/> -->
								</td>
							</tr>
						</tbody>
					</table>
					
					
				</form>
			</div>
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

<script type="text/javascript" src="./js/profile.js"></script>
<script type="text/javascript" src="./js/validation2.js"></script>
<?php include '_partials/footer.php'; ?>