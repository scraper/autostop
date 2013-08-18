var ui = {
	init: function(config){
		this.config = config;
		this.isAdvanced();
		this.initFB();
		this.isAuthenticated();
	},

	isAdvanced: function() {	
		var advanced = this.config.advanced_div;
		var search = this.config.search;

		//hide advanced search options on page load search.tmpl.php
		this.config.advanced_div.hide();
		//show or hide advanced search options search.tmpl.php
		this.config.nopost_buttons_4.click(function(e){
			e.preventDefault();
			if(advanced.attr('style') == 'display: none;') {
				advanced.show('slow');
				search.prop('disabled', true);
			}
			else {
				advanced.hide('slow');
				search.prop('disabled', false);
			}
			
		});

		//initializing current date, datepicker and it's default value
		var today = new Date();
		var day = ('0' + today.getDate()).slice(-2);
		var month = (('0' + (today.getMonth()+1)).slice(-2));
		var year = today.getFullYear();
		var date = (year + '-' + month + '-' + day);
		//works for advanced search dp2
		this.config.date_input.attr('Value', date);
		this.config.date_input.datepicker({
		format: 'yyyy-mm-dd'});
		this.config.date_input2.attr('Value', date);
		this.config.date_input2.datepicker({
			format: 'yyyy-mm-dd'});

	},
	initFB: function() {
		FB.init({
			appId      : '430939383625961', // App ID from the App Dashboard
			channelUrl : '//WWW.YOUR_DOMAIN.COM/channel.html', // Channel File for x-domain communication
			status     : true, // check the login status upon init?
			cookie     : true, // set sessions cookies to allow your server to access the session?
			xfbml      : true  // parse XFBML tags on this page?
		});
	},
	isAuthenticated: function() {
		var is_auth_user = this.config.is_auth_user;
		var is_auth_user_link = this.config.is_auth_user_link;
		var user_profile_href = this.config.user_profile_href;
		FB.getLoginStatus(function(response) {
			if(response.status === 'connected') {
			//set FB.username cookie value
				var c_name = "user_id";
				var c_value = document.cookie;
				//calculating chars to the c_name in cookie
				var c_start = c_value.indexOf(" " + c_name + "=");
				//check if cookie user_id exists
				if (c_start == -1) {
					c_start = c_value.indexOf(c_name + "=");
					//if c_name cookie does not exist then create it with parameters 
					document.cookie = "user_id=" + ";domain=.gokit.tk;path=/";
				}
				if (c_start == -1) {
					c_value = null;
					//if c_name cookie does not exist then create it with parameters
					document.cookie = "user_id=" + ";domain=.gokit.tk;path=/";
				}
				//if c_name cookie exists
				else {
					//calculate length of the value of the c_name cookie
					c_start = c_value.indexOf("=", c_start) + 1;
					var c_end = c_value.indexOf(";", c_start);
					if (c_end == -1) {
						c_end = c_value.length;
					}
					//get the c_name cookie value
					c_value = unescape(c_value.substring(c_start,c_end));
					//if c_name cookie value equals 0 get user name from FB.api
					if (c_value.length == 0) {
						FB.api('/me', function(response) {
							document.cookie = "user_id=" + response.name + ";domain=.gokit.tk;path=/";
							is_auth_user_link.text(response.name);
							user_profile_href.attr('href','./profile.php?id=' + response.id);
						});
					}
					else {
						is_auth_user_link.text(c_value);
						FB.api('./me', function(response) {
							user_profile_href.attr('href','./profile.php?id=' + response.id);
						});
					}
				};
				// is_auth_user_link.text(c_value);
				// user_profile_href.attr('href','./profile.php?id=');
				// FB.api('/me', function(response) {
				// 	user_profile_href.attr('href','./profile.php?id=' + response.id);
				// });
				is_auth_user.hide();

			//set FB.id cookie value
				var c_id = "fb_id";
				var c_id_value = document.cookie;
				//calculating chars to the c_name in cookie
				var c_id_start = c_id_value.indexOf(" " + c_id + "=");
				//check if cookie user_id exists
				if (c_id_start == -1) {
					c_id_start = c_id_value.indexOf(c_id + "=");
					//if c_name cookie does not exist then create it with parameters 
					document.cookie = "fb_id=" + ";domain=.gokit.tk;path=/";
				}
				if (c_id_start == -1) {
					c_id_value = null;
					//if c_name cookie does not exist then create it with parameters
					document.cookie = "fb_id=" + ";domain=.gokit.tk;path=/";
				}
				//if c_name cookie exists
				else {
					//calculate length of the value of the c_name cookie
					c_id_start = c_id_value.indexOf("=", c_id_start) + 1;
					var c_id_end = c_id_value.indexOf(";", c_id_start);
					if (c_id_end == -1) {
						c_id_end = c_id_value.length;
					}
					//get the c_name cookie value
					c_id_value = unescape(c_id_value.substring(c_id_start,c_id_end));
					//if c_name cookie value equals 0 get user name from FB.api
					if (c_id_value.length == 0) {
						FB.api('/me', function(response) {
							document.cookie = "fb_id=" + response.id + ";domain=.gokit.tk;path=/";
						});
					}
					else {
						$('#user_id').val(c_id_value);
					}
				};

			}
			else if(response.status === 'not_authorized') {
				is_auth_user_link.hide();
			}
			else {
				is_auth_user_link.hide();
			}
		})
	}
};
//html elements initialization
ui.init({
	date_input: $('#dp1'),
	date_input2: $('#dp2'),
	nopost_buttons_4:$('#advanced_btn'),
	search: $('#search'),
	advanced_div: $('#advanced'),
	is_auth_user: $('#is_auth_user'),
	is_auth_user_link: $('#is_auth_user_link'),
	user_profile_href: $('#user_profile_href'),
	auth_new_route: $('#auth_new_route'),
	loader: $('#loader')
});