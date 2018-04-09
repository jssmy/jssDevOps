<!DOCTYPE html>
<html lang="es">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>jssDevOps| Iniciar Sesión</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
        <!---NO HAY-->
		<link rel="stylesheet" href="theme/login/css/form-elements.css">
        <link rel="stylesheet" href="theme/login/css/style.css">
        <!--aun no hay--->
    </head>

    <body>

        <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1><strong>jssDevOps</strong> usuarios</h1>
                            <div class="description">
                            	
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                        	<div class="form-top">
                        		<div class="form-top-left">
                        			<h3>Iniciar Sesión</h3>
                            		<p>Ingrese sus credenciales</p>
                        		</div>
                        		<div class="form-top-right">
                        			<i class="fa fa-lock"></i>
                        		</div>
                            </div>
                            <div class="form-bottom">

			                    <form role="form" action="{{ route('login') }}" method="post" class="login-form">
                                    @csrf
			                    	<div class="form-group">
			                    		<label class="sr-only" for="email">Usuario</label>
			                        	<input type="email" name="email" placeholder="Usuario..." class="form-username form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="email">
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
			                        </div>
			                        <div class="form-group">
			                        	<label class="sr-only" for="password">Contraseña</label>
			                        	<input type="password" name="password" placeholder="Contraseña..." class="form-password form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" id="password">
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif

			                        </div>
			                     <button type="submit" class="btn">Entrar</button>
			                    </form>
		                    </div>
                        </div>
                    </div>
                    
                </div>
            </div>
             <div class="row">
                 <div class="col-md-8 col-md-offset-2">
                     <a class="btn btn-primary" href="{{ route('github') }}">GitHub</a>
                     
                 </div>
            </div>
        </div>


        <!-- Javascript -->
        <script src="../../js/jquery.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="jquery.backstretch.min.js"></script>
        
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>