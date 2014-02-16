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
									<span class="label label-success profile-page" id="driver" name="isDriver"></span>
								</td>
							</tr>
							<tr id="vehicle_info">
								<td>
									<p>
										<span class="label label-info">Авто (марка, модель):</span>
										<strong><span class="profile-page" type="text" id="vehicle" name="vehicle"></span></strong>
									</p>
									<p>
										<span class="label label-info">Колір:</span>
										<strong><span class="profile-page" type="text" id="v_color" name="v_color"></span></strong>
									</p>
									<p>
										<span class="label label-info">Наявність клімат контролю:</span>
										<strong><span  class="profile-page" id="climat" name="climat"></span></strong>
									</p>
									<p>
										<span class="label label-info">Стаж водіння:</span>
										<strong><span class="profile-page" id="experience"></span></strong>
									</p>
								</td>
							</tr>
							<tr>
								<td>
									<span class="label label-info">Куріння:</span>
									<strong><span class="profile-page" id="smoking" name="smoking"></span></strong>
								</td>
							</tr>
							<tr>
								<td>
									<p>
										<span class="label label-info">E-mail:</span>
										<strong><span class="profile-page" type="text" id="email" name="email"></span></strong>
									</p>
									
									<span class="label label-info">Телефон:</span>
									<strong><span class="profile-page" type="text" id="phone" name="phone"></span></strong>
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
			<table class="table table-hover">
				<thead>
					<tr>
					</tr>
				</thead>
			<tbody class="tbody">
			</tbody>
			</table>
			<div class="text-center">
				<!-- <button id="showUserRoutes" class="btn btn-info">Всі маршрути</button> -->
				<a href="#" id="showUserRoutes">Всі маршрути...</a>
			</div>
		</div>
	</li>
</ul>

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
<script type="text/javascript" src="/js/top_routes.js"></script>
<script type="text/javascript" src="/js/profile.js"></script>
<script type="text/javascript" src="/js/validation2.js"></script>
<?php include '_partials/footer.php'; ?>