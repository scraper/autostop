<?php include '_partials/header.php'; ?>

<div class="container-fluid">
	<div class="row-fuid">
		<div class="span5">
			<h4 id="profile_legend">Профіль</h4>
			<div id="controls">
				<form>
					<table class="table table-hover">
						<tbody>
							<tr>
								<!-- <label id="label_vehicle">Мій автомобіль:</label> -->
								<td>
									<label id="label_vehicle" for="vehicle">Модель:</label>
									<input class="span5" type="text" id="vehicle" name="vehicle"/>
									
									<label id="label_v_color" for="v_color">Колір:</label>
									<input class="span5" type="text" id="v_color" name="v_color"/>
									
									<label class="radio inline">
										<input type="radio" name="climat" value="1">Клімат контроль/кондиціонер
									</label>
								
									<label class="radio inline">
										<input type="radio" name="climat" value="0">Немає кондиціонеру
									</label>
								</td>
							</tr>
							<tr>
								<!-- <label id="label_vehicle">Про мене:</label> -->
								<td>
									<label id="label_experience" for="experience">Стаж водіння:</label>
									<input class="span5" type="text" id="experience" name="experience"/>

									<label class="radio inline">
										<input type="radio" name="smoking" value="0">Не курю
									</label>

									<label class="radio inline">
										<input type="radio" name="smoking" value="1">Курю
									</label>
								</td>
							</tr>
							<tr>
								<td>
									<label id="label_email" for="email">E-mail:</label>
									<input class="span5" type="text" id="email" name="email"/>
									<label id="label_phone" for="phone">Телефон:</label>
									<input class="span5" type="text" id="phone" name="phone"/>
									<label id="label_languages" for="languages">Володіння мовами:</label>
									<input class="span5" type="text" id="languages" name="languages"/>
								</td>
							</tr>
						</tbody>
					</table>
					<button id="btn" class="btn btn-success" onclick="getUserDetailes()">Зберегти</button>
					<input id="user_id" type="hidden">
				</form>
			</div>
		</div>

	</div>
</div>

<script type="text/javascript" src="./js/profile.js"></script>
<?php include '_partials/footer.php'; ?>