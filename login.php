<?php 
	include 'login.content.php';
	?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Theme Template for Bootstrap</title><!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" type="text/css"><!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css" type="text/css"><!-- Custom styles for this template -->
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="styles/main.css" rel="stylesheet" type="text/css">
    <style id="holderjs-style" type="text/css">
</style>
</head>

<body role="document">
    <!-- Fixed navbar -->

    

    <div class="container theme-showcase" role="main">
        <!-- Main jumbotron for a primary marketing message or call to action -->

        <div class="row login">
            <div class="col-lg-3 col-lg-offset-4">
                
                <form role="form" action="formhandler.php" method="POST" enctype="multipart/form-data" class="form-horizontal">
                    <div class="form-group">    
                        <div class="input-group col-lg-12">                    	
							<h2>Log In</h2>                        
                        </div>
                    </div>
                	    
                    <div class="form-group">    
                        <div class="input-group col-lg-12">                    	
                        	<div class="input-group-addon"><i class="fa fa-user"></i></div>
	                        <input type="text" name="username" class="form-control" id="exampleInputEmail1" placeholder="Enter Username">
                        </div>
                    </div>

                    <div class="form-group">
                    	<div class="input-group col-lg-12">                 
                        	<div class="input-group-addon"><i class="fa fa-lock"></i></div>                    
							<input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Password">
                    	</div>
                    </div>

                    <div class="form-group">   
                    	<div class="input-group col-lg-12">             
		                    <input type="submit" name="submit" class="btn btn-success" value="Submit"></input>
		                </div>
					</div>	                    
                </form>
            </div>
        </div>

    </div>    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js" type="text/javascript">
</script><!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" type="text/javascript">
</script>
</body>
</html>
