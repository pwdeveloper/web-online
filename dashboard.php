<?php
	include 'content/dashboard.content.php';
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
    <link href="styles/main.css" rel="stylesheet" type="text/css">
    <style id="holderjs-style" type="text/css">
</style>
</head>

<body role="document">
    <!-- Fixed navbar -->

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse"><span class="sr-only">Toggle navigation</span></button> <a class="navbar-brand" href="#">Bootstrap theme</a>
            </div>

            <div class="navbar-collapse collapse navbar-right">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Home</a></li>

                    <li><a href="#about">About</a></li>

                    <li><a href="#contact">Contact</a></li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown</a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Action</a></li>

                            <li><a href="#">Another action</a></li>

                            <li><a href="#">Something else here</a></li>

                            <li class="dropdown-header">Nav header</li>

                            <li><a href="#">Separated link</a></li>

                            <li><a href="#">One more separated link</a></li>
                        </ul>
                    </li>
                    
                    <li><a href="#logout">Logout</a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>

    <div class="container theme-showcase margin-top-3 margin-bottom-3" role="main">
        <!-- Main jumbotron for a primary marketing message or call to action -->
        <div class="jumbotron">
            <h1><?php echo "Hello, {$username}"; ?></h1>

            <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>

            <p><a href="#" class="btn btn-primary btn-lg" role="button">Learn more »</a></p>
        </div>

        <div class="row">
            <div class="col-md-6">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>

                            <th>Username</th>

                            <th>Password</th>

                            <th>Priviliges</th>
                        </tr>
                    </thead>

                    <tbody>
	                    <?php
							foreach ($results_users as $row)
							{
								echo "<tr>";
								echo "<td>" . $row->id . "</td>";
								echo "<td>" . $row->username . "</td>";
								echo "<td>" . $row->password . "</td>";
								echo "<td>" . $row->priviliges . "</td>";
								echo "</tr>";
							}
						?>
                    </tbody>
                </table>
            </div>
			<div class="col-md-6">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
							
                            <th>Title</th>

                            <th>Organisation</th>

                            <th>Priviliges</th>
                        </tr>
                    </thead>

                    <tbody>
	                    <?php
							foreach ($results_documents as $row)
							{
								echo "<tr>";
								echo "<td>" . $row->id . "</td>";
								echo "<td>" . $row->title . "</td>";
								echo "<td>" . $row->organisation . "</td>";
								echo "<td>" . $row->priviliges . "</td>";
								echo "</tr>";
							}
						?>
                    </tbody>
                </table>
            </div>
        </div>

        


       
    </div><!-- /container -->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js" type="text/javascript">
</script><!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" type="text/javascript">
</script>
</body>
</html>
