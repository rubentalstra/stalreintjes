<?php
if ($_SERVER['REQUEST_METHOD'] === "POST") {

	if (empty($_POST['firstname'])) {
		$firstnameError = '<div id="done-message" class="alert warning">
  <span class="closebtn">&times;</span>  
  <strong>Hu!</strong> u heeft geen naam ingevuld
</div>';
	} else {
		$firstname = $_POST['firstname'];
	}
	
	if (empty($_POST['email'])) {
		$emailError = '<div id="done-message" class="alert warning">
  <span class="closebtn">&times;</span>  
  <strong>Hu!</strong> Er is geen e-mailadres ingevuld
</div>';
	} else {
		$email = $_POST['email'];

		// validating the email
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$emailError = '<div id="done-message" class="alert">
  <span class="closebtn">&times;</span>  
  <strong>let op!</strong> Geen geldig e-mailadres
</div>';
		}
	}
	
	if (empty($_POST['message'])) {
		$messageError = '<div id="done-message" class="alert warning">
  <span class="closebtn">&times;</span>  
  <strong>Hu!</strong> er is geen bericht ingevuld
</div>';
	} else {
		$message = $_POST['message'];
	}
	
    $lastname = $_POST['lastname'];
	
	if (empty($emailError) && empty($messageError) && empty($firstnameError)) {
		$date = date('j, F Y h:i A');

		$emailBody = "
			<html>
			<head>
				<title>$email stuurt een bericht</title>
			</head>
			<body style=\"background-color:#fafafa;\">
				<div style=\"padding:20px;\">
					Datum: <span style=\"color:#888\">$date</span>
					<br>
					Naam: <span style=\"color:#888\">$firstname $lastname</span>
					<br>
					E-mailadres: <span style=\"color:#888\">$email</span>
					<br>
					Bericht: 
					<div style=\"color:#888\">$message</div>
				</div>
			</body>
			</html>
		";

		$headers = 	'From: Contact <contact@stalreintjes.nl>' . "\r\n" .
    				"Reply-To: $email" . "\r\n" .
    				"MIME-Version: 1.0\r\n" . 
					"Content-Type: text/html; charset=iso-8859-1\r\n";

		$to = 'rubentalstra1211@outlook.com';
		$subject = 'Stuurt een bericht';

		if (mail($to, $subject, $emailBody, $headers)) {
			$sent = true;	
		}
	}
}
?>
<html lang="nl">

<head>
    <title>Stal Reintjes &mdash; Contact</title>
	<meta name="description" content="150 words"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="shortcut icon" href="images/stalreintjes.ico" type="image/x-icon">

    <link href="https://fonts.googleapis.com/css?family=DM+Sans:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="css/aos.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="css/style.css">

	
<style>
.alert {
  padding: 20px;
  background-color: #f44336;
  color: white;
  opacity: 1;
  transition: opacity 0.6s;
  margin-bottom: 15px;
}

.alert.success {background-color: #4CAF50;}
.alert.info {background-color: #2196F3;}
.alert.warning {background-color: #ff9800;}

.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

.closebtn:hover {
  color: black;
}
</style>
</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

    <div class="site-wrap" id="home-section">

        <div class="site-mobile-menu site-navbar-target">
            <div class="site-mobile-menu-header">
                <div class="site-mobile-menu-close mt-3">
                    <span class="icon-close2 js-menu-toggle"></span>
                </div>
            </div>
            <div class="site-mobile-menu-body"></div>
        </div>

        <header class="site-navbar site-navbar-target bg-white" role="banner">

            <div class="container">
                <div class="row align-items-center position-relative">

                    <div class="col-lg-4">
                        <nav class="site-navigation text-right ml-auto " role="navigation">
                            <ul class="site-menu main-menu js-clone-nav ml-auto d-none d-lg-block">
                                <li><a href="index" class="nav-link">Home</a></li>
                                <li><a href="paarden" class="nav-link">Paarden</a></li>
                                <li><a href="services" class="nav-link">Tarieven</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-lg-4 text-center">
                        <div class="site-logo">
                            <a href="index">Stal Reintjes logo</a>
                        </div>

                        <div class="ml-auto toggle-button d-inline-block d-lg-none"><a href="#" class="site-menu-toggle py-5 js-menu-toggle text-white"><span class="icon-menu h3 text-primary"></span></a></div>
                    </div>
                    <div class="col-lg-4">
                        <nav class="site-navigation text-left mr-auto " role="navigation">
                            <ul class="site-menu main-menu js-clone-nav ml-auto d-none d-lg-block">
                                <li><a href="about" class="nav-link">Over Ons</a></li>
                                <li><a href="blog" class="nav-link">Blog</a></li>
                                <li class="active"><a href="contact" class="nav-link">Contact</a></li>
                            </ul>
                        </nav>
                    </div>

                </div>
            </div>

        </header>

        <div class="ftco-blocks-cover-1">
            <div class="ftco-cover-1" style="background-image: url('images/elvis2.jpg');">
                <div class="container">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-lg-12 text-center">
                            <div class="box-92819">
                                <h1 class="text-uppercase text-black mb-3">Contacteer ons</h1>
                                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus harum, error minima?</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="site-section">
            <div class="container">

                <div class="row">
                    <div class="col-lg-8 mb-5">
                        <form action="" method="post">
                            <div class="form-group row">
                                <div class="col-md-6 mb-4 mb-lg-0">
                                    <input type="text" class="form-control" placeholder="Voornaam*" name="firstname">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Achternaam" name="lastname">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" placeholder="E-mailadres*" name="email">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <textarea name="message" id="" class="form-control" placeholder="Schrijf uw bericht*" cols="30" rows="10"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6 mr-auto">
                                    <input type="submit" class="btn btn-block btn-primary text-white py-3 px-5 rounded-0" value="verstuur bericht">
                                </div>
                            </div>
                        </form>
						
						<?php if (isset($emailError) || isset($messageError)) : ?> 
	<div id="error-message">
		<?php 
		    echo isset($firstnameError) ? $firstnameError . '' : ''; 
			echo isset($emailError) ? $emailError . '' : ''; 
			echo isset($messageError) ? $messageError . '' : '';
		
		?>
	</div>
<?php endif; ?>


<?php if (isset($sent) && $sent === true) : ?> 
<div id="done-message" class="alert success">
  <span class="closebtn">&times;</span>  
  <strong>Bedankt!</strong> Uw bericht is succesvol verstuurd.
</div>
<?php endif; ?>
						
                    </div>
                    <div class="col-lg-4 ml-auto">
                        <div class="bg-white p-3 p-md-5">
                            <h3 class="heading-39291">Contact informatie</h3>
                            <ul class="list-unstyled footer-link">
                                <li class="d-block mb-3">
                                    <span class="d-block text-black small text-uppercase font-weight-bold">Address:</span>
                                    <span>123 straatnaam, stad naam hier, Nederland</span></li>
                                <li class="d-block mb-3"><span class="d-block text-black small text-uppercase font-weight-bold">Phone:</span><span>06 123456789</span></li>
                                <li class="d-block mb-3"><span class="d-block text-black small text-uppercase font-weight-bold">Email:</span><span>info@yourdomain.com</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="site-section section-4">
            <div class="container">

                <div class="row justify-content-center text-center">
                    <div class="col-md-7">
                        <div class="slide-one-item owl-carousel">
                            <blockquote class="testimonial-1">
                                <span class="quote quote-icon-wrap"><span class="icon-format_quote"></span></span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus totam sit delectus earum facere ex ea sunt, eos?</p>
                                <cite><span class="text-black">Naam</span> &mdash; <span class="text-muted">wat ze doen</span></cite>
                            </blockquote>

                            <blockquote class="testimonial-1">
                                <span class="quote quote-icon-wrap"><span class="icon-format_quote"></span></span>
                                <p>Eligendi earum ad perferendis dolores, dolor quas. Ullam in, eaque mollitia suscipit id aspernatur rerum! Sit quibusdam ullam tempora quis, in voluptatum maiores veritatis recusandae!</p>
                                <cite><span class="text-black">Naam</span> &mdash; <span class="text-muted">wat ze doen</span></cite>
                            </blockquote>

                            <blockquote class="testimonial-1">
                                <span class="quote quote-icon-wrap"><span class="icon-format_quote"></span></span>
                                <p> Officia, eius omnis rem non quis eos excepturi cumque sequi pariatur eaque quasi nihil dicta tempore voluptate culpa, veritatis incidunt voluptatibus qui?</p>
                                <cite><span class="text-black">Naam</span> &mdash; <span class="text-muted">wat ze doen</span></cite>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer class="site-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-7">
                                <h2 class="footer-heading mb-4">Over Ons</h2>
                                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>

                            </div>
                            <div class="col-md-4 ml-auto">
                                <h2 class="footer-heading mb-4">Features</h2>
                                <ul class="list-unstyled">
                                    <li><a href="about">Over Ons</a></li>
                                    <li><a href="paarden">Paarden</a></li>
                                    <li><a href="terms/terms_of_service">Terms of Service</a></li>
                                    <li><a href="terms/privacy">Privacy</a></li>
                                    <li><a href="contact">Contacteer ons</a></li>
                                </ul>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-4 ml-auto">
                        <h2 class="footer-heading mb-4">Volg ons</h2>
                        <a href="#" class="pl-3 pr-3"><span class="icon-facebook"></span></a>
                        <a href="#" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
                        <a href="#" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
                        <a href="#" class="pl-3 pr-3"><span class="icon-linkedin"></span></a>
                    </div>
                </div>
                <div class="row pt-5 mt-5 text-center">
                    <div class="col-md-12">
                        <div class="pt-5">
                            <p class="small">
                                Copyright &copy;
                                <script>
                                    document.write(new Date().getFullYear());
                                </script> All rights reserved | Made with <span style="color: #e25555;">&#9829;</span> by <a href="">Ruben Talstra</a>
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </footer>

    </div>

	
	<script>
var close = document.getElementsByClassName("closebtn");
var i;

for (i = 0; i < close.length; i++) {
  close[i].onclick = function(){
    var div = this.parentElement;
    div.style.opacity = "0";
    setTimeout(function(){ div.style.display = "none"; }, 600);
  }
}
</script>
	
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/jquery.fancybox.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/aos.js"></script>

    <script src="js/main.js"></script>

</body>

</html>