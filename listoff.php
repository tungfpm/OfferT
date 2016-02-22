<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title> app and game for moble </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        
        <!-- Fonts -->




        <!-- CSS -->

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/owl.carousel.css">
        <link rel="stylesheet" href="css/owl.theme.css">
        <link rel="stylesheet" href="css/animate.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/responsive.css">
        

        <!-- Js -->
        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/wow.min.js"></script>
        <script src="js/main.js"></script>
        <script>
         new WOW(
            ).init();
        </script>

    </head>
    <body>

    


    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="app-showcase wow fadeInDown" data-wow-delay=".5s">
                        <img src="images/iphone.png" alt="">
                    </div>
                    
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="block wow fadeInRight" data-wow-delay="1s">
                        <h2>Download app and Game</br>all app for Android and iOS</h2>     
                   </div>

                    </div>
                </div>
            </div>
        </div>
    </header>

    


    

    <section id="service">
        <div class="container">
            <div class="row">
                    <div class="col-md-12">
			 		<ul class="nav nav-tabs">
			 			<li> <a class="active" href ="#Android" data-toggle="tab">Android</a></li>
			 			<li> <a href ="#IOS" data-toggle="tab">IOS </a></li>
						<li> <a href ="#PC" data-toggle="tab"> PC </a></li>
			 		</ul>
			 		<div  class="tab-content">
			 			<div class="tab-pane active" id="Android">
			 	 					   <?php
										$ip= $_SERVER['REMOTE_ADDR'];
										$get_info_ip = "http://freegeoip.net/json/".$ip;
										$info_ip = file_get_contents($get_info_ip);
										$info_ip = json_decode($info_ip, true);
										$countries = $info_ip["country_code"];
										$off = file_get_contents("http://api.artofclick.com/web/Api/v2.0/offer.json?api_key=59fbe5402c7a3ec194de906a31c720ae3e9ede20d15a1157646138bef3011372");
										$off1  = json_decode($off,true);
										foreach ($off1["offers"] as $key => $value) {
										 	$os = $value["os"];
										 	foreach ($value["countries"] as $key => $value2) {
										 		if ($value2==$countries) {
										 			foreach ($os as $key => $value1) {
										 				if($value1 == "Android"){
										 				    $id_offer = $value["id"];

										 				      	$trackingUrl = $value["trackingUrl"];
										 					echo "<center>";
										 					echo $value["name"]."<br>";
                                                                                                                    
                                                                                                          
                                                              echo "<a href=".$trackingUrl."> download</a> <br>";                                                                            
                                                         
                                                         ?>
                                                         <div>
                                                        <div>
                                                        <input type="button" value="QR code" style="width:75px;font-size:10px;margin:0px;padding:0px;" onclick="if (this.parentNode.parentNode.getElementsByTagName('div')[1].getElementsByTagName('div')[0].style.display != '') { this.parentNode.parentNode.getElementsByTagName('div')[1].getElementsByTagName('div')[0].style.display = '';this.innerText = ''; this.value = 'Ẩn'; } else { this.parentNode.parentNode.getElementsByTagName('div')[1].getElementsByTagName('div')[0].style.display = 'none'; this.innerText = ''; this.value = 'QR code'; }">
                                                        </div>
                                                        <div>
                                                        <div style="display: none;">
                                                            <?php
                                                                echo  "<img src='http://api.qrserver.com/v1/create-qr-code/?data=".$trackingUrl."&size=150x150'/> <br>";
                                                            ?>
                                                        </div>
                                                        </div>
                                                        </div>   
                                                         <?php
										 					echo "</center>";
                                                                                                                       
										 					}
										 				}
										 			}
										 		}
										 	}

										?>
			 			</div>
			 			<div class="tab-pane " id="IOS">
                                                       <?php

										foreach ($off1["offers"] as $key => $value) {
										 	$os = $value["os"];
										 	foreach ($value["countries"] as $key => $value2) {
										 		if ($value2==$countries) {
										 			foreach ($os as $key => $value1) {
										 				if($value1 == "iOS"){
										 				    $id_offer = $value["id"];

										 					$trackingUrl = $value["trackingUrl"];
										 					echo "<center>";
										 					echo $value["name"]."<br>";
										 					echo "<a href=".$trackingUrl."> download</a> <br>";
										                                       
										 					 ?>
                                                         <div>
                                                        <div>
                                                        <input type="button" value="QR code" style="width:75px;font-size:10px;margin:0px;padding:0px;" onclick="if (this.parentNode.parentNode.getElementsByTagName('div')[1].getElementsByTagName('div')[0].style.display != '') { this.parentNode.parentNode.getElementsByTagName('div')[1].getElementsByTagName('div')[0].style.display = '';this.innerText = ''; this.value = 'Ẩn'; } else { this.parentNode.parentNode.getElementsByTagName('div')[1].getElementsByTagName('div')[0].style.display = 'none'; this.innerText = ''; this.value = 'QR code'; }">
                                                        </div>
                                                        <div>
                                                        <div style="display: none;">
                                                            <?php
                                                                 echo  "<img src='http://api.qrserver.com/v1/create-qr-code/?data=".$trackingUrl."&size=150x150'/> <br>";
                                                            ?>
                                                        </div>
                                                        </div>
                                                        </div>   
                                                         <?php
                                                            echo "</center>";
										 					}
										 				}
										 			}
										 		}
										 	}

										?>
                                                      
			 			</div>
			 			<div class="tab-pane " id="PC"> PC </div>	
			 		</div>

			 	</div>
         </div>  
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-default" role="navigation">
                      <div class="container-fluid">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                          </button>
                          <a class="navbar-brand" href="#">
                              app and game
                          </a>
                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse text-center" id="bs-example-navbar-collapse-1">
                          <ul class="nav navbar-nav ">
                            <li><a href="#">Download</a></li>
                            <li><a href="#">Support</a></li>
                            <li><a href="#">Developers</a></li>
                            <li><a href="#">Privacy</a></li>
                          </ul>
                           <div class="social-link pull-right">
                            <ul>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-facebook"></i>    
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-twitter"></i>    
                                    </a>
                                </li>
                            </ul>
                        </div>

                        </div><!-- /.navbar-collapse -->
                       
                      </div><!-- /.container-fluid -->
                    </nav>
                </div>
            </div>
        </div>
    </footer>




        
        

        
    </body>
</html>
