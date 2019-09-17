


<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>SLIMS</title>
<!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<!-- Bootstrap 3.3.7 -->
<link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>css/bootstrap.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>css/AdminLTE.min.css">

<link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>css/toastr.min.css">

<script src="<?php echo base_url()."assets/"; ?>js/sketch.min.js"></script>



<div class="login-box">
	<div class="login-logo">
		<a style="color: #3c8dbc" ><b>SLIMS</a>
	</div>
	<!-- /.login-logo -->
	<div class="login-box-body">
		<!-- <p class="login-box-msg">Sign in to start your session</p> -->

		<form id="form">
			<div class="form-group has-feedback">
				<input type="text" class="form-control" placeholder="Username" id="txtUsername" name="txtUsername">
				<span class="glyphicon glyphicon-user form-control-feedback"></span>
			</div>
			<div class="form-group has-feedback">
				<input type="password" class="form-control" placeholder="Password" id="txtPassword" name="txtPassword">
				<span class="glyphicon glyphicon-lock form-control-feedback"></span>
			</div>
		</form>

		<div class="row">
			<div class="col-xs-4 pull-right">
				<button  id="btnLogin" onclick="login()" class="btn btn-primary btn-block btn-flat">Log In</button>
			</div>
		</div>


	      <!-- <div class="social-auth-links text-center">
	        <p>- OR -</p>
	        <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
	          Facebook</a>
	        <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
	          Google+</a>
	      </div> -->
	      <!-- /.social-auth-links -->

		<a href="#">I forgot my password.</a><br>
	</div>
 	 <!-- /.login-box-body -->
</div>


<!-- jQuery 3 -->
<script src="<?php echo base_url()."assets/"; ?>js/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url()."assets/"; ?>js/bootstrap.min.js"></script>

<script src="<?php echo base_url()."assets/"; ?>js/sketch-custom.js"></script>

<script src="<?php echo base_url()."assets/"; ?>js/toastr.min.js"></script>




<script>
	function login(){ 
		var url;
		$.ajax(
		{  
			url : "<?php echo site_url('login/login')?>",
			type: "POST",
			data: $('#form').serialize(),
			dataType: "JSON",
			success:function(data)  
			{
				if(data.status == 'success')
				{
					switch (data.module[0]) {
						case '1':
						url = "<?php echo base_url() ?>admin/accounts";
						break;
						case '2':
						url = "<?php echo base_url() ?>acquisitions/new_acquisitions";
						break;
						case '3':
						url = "<?php echo base_url() ?>holdings/home";
						break;
						default:
						url = "<?php echo base_url() ?>admin/updateprofile";
						break;
						break;
					}

					localStorage.setItem('Success', data.message);
					window.location.href = url;
				}
				else
					toastr.error(data.message);
			}  
		});
	}

	function toIntArray(string) {
		var array = string.split(',');
		for(var i = 0 ; i < array.length; i++) {
			array[i] = parseInt(array[i], 10)
		}

		return array;
	}

	$("input").keyup(function(event) {
		if (event.keyCode === 13) {
			$("#btnLogin").click();
		}
	});

	// Toastr.js
	toastr.options = {
		"progressBar": true,
		"positionClass": "toast-bottom-right"
	}

	// Toastr Notifications
	if (localStorage.getItem("Success")){
		toastr.success(localStorage.getItem("Success"));
		localStorage.clear();
	} else if (localStorage.getItem("Error")){
		toastr.error(localStorage.getItem("Error"));
		localStorage.clear();
	}

</script>
</body>


<style media="screen">

	html {
		overflow:hidden;
	}

	.login-box {
		background: #fff none repeat scroll 0 0;
		left: 50%;
		padding: 20px;
		position: absolute;
		top: 25%;
		transform: translate(-50%, -50%);
	}

	html, body {
		font-family: 'Play', sans-serif;
		background: ;
		background-image: radial-gradient(circle, #177ee4,#063375,#03275c);
		/*background-image: url(../../../assets/dist/img/bg.png)  */
		background-repeat:no-repeat; background-position:center;
		background-size:cover;
		margin: 0;
	}
	
	input:-webkit-autofill,
	input:-webkit-autofill:hover, 
	input:-webkit-autofill:focus
	textarea:-webkit-autofill,
	textarea:-webkit-autofill:hover
	textarea:-webkit-autofill:focus,
	select:-webkit-autofill,
	select:-webkit-autofill:hover,
	select:-webkit-autofill:focus {
	  border: 1px solid #cce8ff;
	  -webkit-text-fill-color: #333;
	  -webkit-box-shadow: inset 0 0 0px 9999px #cce8ff;
	  transition: background-color 5000s ease-in-out 0s;
	}

	#info {
		position: absolute;
		left: 10px;
		top: 10px;
	}

	#info {
		background: rgba(0,0,0,0.8);
		padding: 12px 10px;
		margin-bottom: 1px;
		color: #fff;
	}

	#info h1 {
		line-height: 22px;
		font-weight: 300;
		font-size: 18px;
		margin: 0;
	}

	#info h2 {
		line-height: 14px;
		font-weight: 300;
		font-size: 12px;
		color: rgba(255,255,255,0.8);
		margin: 0 0 6px 0;
	}

	#info a {
		text-transform: uppercase;
		text-decoration: none;
		border-bottom: 1px dotted rgba(255,255,255,0.2);
		margin-right: 4px;
		line-height: 20px;
		font-size: 10px;
		color: rgba(255,255,255,0.5);
	}

	#info a:hover {
		border-bottom: 1px dotted rgba(255,255,255,0.6);
		color: rgba(255,255,255,1.0);
	}

</style>

