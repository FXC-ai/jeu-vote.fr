<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= isset($title) ? $title : 'JeuxVote' ?></title>

    <!-- Bootstrap Core CSS -->
    <link href="/Web/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="/Web/css/freelancer.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="Web/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" class="index">
<div id="skipnav"><a href="#maincontent">Skip to main content</a></div>

    <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="#page-top">Jeu-Vote</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="/">Accueil</a>
                    </li>


                    <li>
                        <a href="/FormulairePresidentielle2017/">Lancer le questionnaire</a>
                    </li>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->
    <header>
        <div class="container" id="maincontent" tabindex="-1">
            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-text">
                        <h1 class="name">Jeu-Vote</h1>
                        <hr class="star-light">
                        <span class="skills">L'application qui vous aidera à questionner vos convictions politiques.</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
	
	    <section id="content">
        <div class="container">            
             <div class="row">
                <div class="col-lg-12">
                <?php if ($user->hasFlash()) echo '<div class="text-center"><p class="alert alert-info">', $user->getFlash(), '</p></div>'; ?>      
    			</div>
    			<div class="col-lg-12">
    			<?= $content ?>       
                </div>
                </div>
            </div>
        
    </section>
  
    <!-- Footer -->
    <footer class="text-center">
        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        Contact : webmaster@publec.fr
                    </div>
                    <div class="col-lg-6">
                        Copyright &copy; jeu-vote.fr 2017
                    </div>
                </div>
            </div>
        </div>
    </footer>

   

    <!-- jQuery -->
    <script src="/Web/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/Web/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="/Web/js/jqBootstrapValidation.js"></script>
    <script src="/Web/js/contact_me.js"></script>

    <!-- Theme JavaScript -->
    <script src="/Web/js/freelancer.min.js"></script>

</body>

</html>




