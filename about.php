<?php
include_once 'database.php';
error_reporting(E_ERROR | E_PARSE);
session_start();
?>
<!doctype html>
<html lang="en">

<!-- Mirrored from demo.themefisher.com/adrian/about.php by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 09 Feb 2020 18:31:42 GMT -->

<head>
    <!-- Required meta tags -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content=AdrianE-CommerceTemplate ">
        <meta name="author " content="Themefisher.com ">
        <title>Madhuban | Homepage</title>
        <!-- Favicon -->
        <link rel="shortcut icon " type="image/x-icon " href="images/favicon.png " />
        <!-- Themefisher Icon font -->
        <link rel="stylesheet " href="plugins/themefisher-font/style.css ">
        <!-- bootstrap.min css -->
        <link rel="stylesheet " href="plugins/bootstrap/css/bootstrap.min.css ">
        <link rel="stylesheet " href="plugins/bootstrap-slider/bootstrap-slider.min.css ">
        <!-- Main Slider -->
        <link rel="stylesheet " href="plugins/slick-carousel/slick/slick.css ">
        <link rel="stylesheet " href="plugins/slick-carousel/slick/slick-theme.css ">
        <!-- Main Stylesheet -->
        <link rel="stylesheet " href="css/style.css ">
        <meta charset="utf-8 ">
        <meta name="viewport " content="width=device-width, initial-scale=1 ">
        <link rel="stylesheet " href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css ">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js "></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js "></script>
        <link rel="stylesheet " href="css/b4megamenu.css">


</head>

<body id="body ">
<nav class="navbar navbar-expand-lg navbar-light bg-white w-100 navigation" id="navbar">
  <div class="container">
  <a class="navbar-brand font-weight-bold" href="index.php"><img height="45" width="180" src="images/slider/logo/logo.png" ></a>    <button class="navbar-toggler" type="button"  data-target="#main-navbar"
      aria-controls="main-navbar" aria-expanded="false" aria-label="Toggle navigation">
      <li class="list-inline-item ">
        <a href="" class="search_toggle " id="search-icon "><i class="tf-ion-android-search "></i></a>
      </li>
    </button>


    <button class="navbar-toggler" type="button" data-target="#main-navbar"
      aria-controls="main-navbar" aria-expanded="false" aria-label="Toggle navigation">
      <li class="dropdown cart-nav dropdown-slide list-inline-item ">
        <a href="# " class="dropdown-toggle cart-icon " data-toggle="dropdown " data-hover="dropdown ">
          <i class="tf-ion-android-cart "></i>
        </a>
        <div class="dropdown-menu cart-dropdown ">
        <?php

          if(!empty($_SESSION["shopping_cart"]))
          {
              $total = 0;
              $count = 0;
              $end = 3;?>

              <div class="cart-summary ">
            <span class="h6 "><center>CART ITEMS</center></span>
        </div>
        <div class="media">
          <div class="media-body">
           </div>
        </div>
        <?php
              foreach($_SESSION["shopping_cart"] as $keys => $values)
              {
                $count++;
        ?>

        <div class="media">
          <div class="media-body">
            <h6>  <?php echo $values["item_name"]; ?>  </h6>
            <div class="cart-price">
              <span>  <?php echo $values["item_quantity"];?> kg x </span>
              <span> ₹<?php echo $values["item_price"]; ?></span>
              <span>= ₹<?php error_reporting(E_ERROR | E_PARSE);echo number_format($values["item_quantity"] * $values["item_price"], 1);?></span>
            </div>
          </div>
        </div>

            <?php
                  $total = $total + ($values["item_quantity"] * $values["item_price"]);
                  if ($count == $end) break;
                }
            ?>
            <div class="cart-summary ">
              <span class="h6 ">
                <?php
                if( count($_SESSION["shopping_cart"]) == '4')
                {

                  echo count($_SESSION["shopping_cart"]) - '3';?> More Item in cart<?php
                }
                else if(count($_SESSION["shopping_cart"]) > '4')
                {

                  echo count($_SESSION["shopping_cart"]) - '3';?> More Items in cart<?php
                }
                else{

                }
                ?>
              </span>

            <div class="text-center cart-buttons mt-3 ">
              <a href="cart.php " class="btn btn-small btn-transparent btn-block ">View Cart</a>
              <a href="client_additional_details.php" class="btn btn-small btn-main btn-block ">Checkout</a>
            </div>
          </div><?php
        }
            else
            {?>
            <center>
              <?php echo "Cart is Empty !"; ?>
            </center>
            <?php
            }
            ?>
        </div>
      </li>
    </button>



    <button class="navbar-toggler" type="button" data-target="#main-navbar"
      aria-controls="main-navbar" aria-expanded="false" aria-label="Toggle navigation">
      <li class="dropdown cart-nav dropdown-slide list-inline-item ">
        <a data-toggle="dropdown " data-hover="dropdown"><i class="tf-ion-ios-person mr-3 "></i></a>
        <div class="dropdown-menu cart-dropdown ">
          <div class="text-center cart-buttons">
          <?php if(isset($_SESSION['login_user']))
          {?>

          <i class="tf-ion-ios-person mr-3 "> |</i><span class="h5 "><?php echo $_SESSION['login_user']; ?></span>
            <div class="media ">
              <div class="media-body ">
                <a href="profile-details.php" class="btn btn-small btn-transparent btn-block ">My Profile</a>
                <a href="client_show_order_history.php" class="btn btn-small btn-transparent btn-block ">My Orders</a>
                <a href="logout.php" class="btn btn-small btn-main btn-block ">Logout</a>
              </div>
            </div>
          </div>
            <?php }
            else{?>
            <a href="login.php" class="btn btn-small btn-transparent btn-block ">LOGIN</a>
            <span class="h5 ">OR</span>
            <a href="signup.php" class="btn btn-small btn-main btn-block ">REGISTER</a>
            <?php }?>
        </div>
      </li>
    </button>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-navbar"
      aria-controls="main-navbar" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>&nbsp
    </button>
    <div class="collapse navbar-collapse " id="main-navbar">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Home </a>
        </li>
        <li class="nav-item dropdown dropdown-slide">
            <a class="nav-link dropdown-toggle" href="about.php" >About us</a>
        </li>
        <!-- Features -->
      <li class="nav-item dropdown mega-dropdown active">
        <a class="nav-link dropdown-toggle " id="navbarDropdownMenuLink2" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">Products
          <span class="sr-only">(current)</span>
        </a>
        <div class="dropdown-menu mega-menu v-2 z-depth-1 special-color py-5 px-3"
          aria-labelledby="navbarDropdownMenuLink2">
          <div class="row">
            <div class="col-md-8 col-xl-4 sub-menu mb-xl-0 mb-4">
            <h6><a class="btn btn-small btn-main btn-block " href="client_show_product.php" >All Products</a></h6>
              <h6><a class="btn btn-small btn-main btn-block " href="client_show_catagory_details.php?catagory=CAREALS_AND_PULSES" >CAREALS & PULSES</a></h6>
              <ul class="list-unstyled">
              <li><a class="btn btn-small btn-transparent btn-block "href="client_show_subcat.php?catagory1=JOWAR" >JOWAR</a></li>
              <li><a class="btn btn-small btn-transparent btn-block "href="client_show_subcat.php?catagory1=BAJRA" >BAJRA</a></li>
                <li><a class="btn btn-small btn-transparent btn-block "href="client_show_subcat.php?catagory1=WHEAT" >WHEAT</a></li>
                <li><a class="btn btn-small btn-transparent btn-block "href="client_show_subcat.php?catagory1=PADDY">PADDY</a></li>
                <li><a class="btn btn-small btn-transparent btn-block "href="client_show_subcat.php?catagory1=MAIZE" >MAIZE</a></li>
                <li><a class="btn btn-small btn-transparent btn-block "href="client_show_subcat.php?catagory1=GRAM">GRAM</a></li>

                </ul>
            </div>
            <div class="col-md-8 col-xl-4 sub-menu mb-xl-0 mb-4">
            <h6><a class="btn btn-small btn-main btn-block " href="client_show_catagory_details.php?catagory=FIBRE_AND_OIL_CROPS" >FIBRE & OIL CROPS</a></h6>

              <ul class="list-unstyled">
              <li><a class="btn btn-small btn-transparent btn-block "href="client_show_subcat.php?catagory1=COTTON" >COTTON</a></li>
              <li><a class="btn btn-small btn-transparent btn-block "href="client_show_subcat.php?catagory1=SUNFLOWER" >SUNFLOWER</a></li>
                <li><a class="btn btn-small btn-transparent btn-block "href="client_show_subcat.php?catagory1=SOYBEAN" >SOYBEAN</a></li>
                <li><a class="btn btn-small btn-transparent btn-block "href="client_show_subcat.php?catagory1=MUSTARD">MUSTARD</a></li>

                </ul>
            </div>
            <div class="col-md-8 col-xl-4 sub-menu mb-xl-0 mb-4">
            <h6><a class="btn btn-small btn-main btn-block " href="client_show_catagory_details.php?catagory=VEGITABLE_CROPS" >VEGITABLE CROPS</a></h6>
              <ul class="list-unstyled">
              <li><a class="btn btn-small btn-transparent btn-block "href="client_show_subcat.php?catagory1=HYBRID_OKRA(BHINDI)" >HYBRID OKRA(BHINDI)</a></li>
              <li><a class="btn btn-small btn-transparent btn-block "href="client_show_subcat.php?catagory1=HYBRID_CHILLI" >HYBRID CHILLI</a></li>
                <li><a class="btn btn-small btn-transparent btn-block "href="client_show_subcat.php?catagory1=HYBRID_BRINJAL" >HYBRID BRINJAL</a></li>
                <li><a class="btn btn-small btn-transparent btn-block "href="client_show_subcat.php?catagory1=HYBRID_TOMATO">HYBRID TOMATO</a></li>
                <li><a class="btn btn-small btn-transparent btn-block "href="client_show_subcat.php?catagory1=HYBRID_BOTTLE_GOURD">HYBRID BOTTLE GOURD</a></li>
                <li><a class="btn btn-small btn-transparent btn-block "href="client_show_subcat.php?catagory1=HYBRID_RIDGE_GOURD" >HYBRID RIDGE GOURD</a></li>
                <li><a class="btn btn-small btn-transparent btn-block "href="client_show_subcat.php?catagory1=HYBRID_BITTER_GOURD">HYBRID BITTER GOURD</a></li>
                <li><a class="btn btn-small btn-transparent btn-block "href="client_show_subcat.php?catagory1=HYBRID_CUCUMBER">HYBRID CUCUMBER</a></li>
                <li><a class="btn btn-small btn-transparent btn-block "href="client_show_subcat.php?catagory1=HYBRID_WATERMELON">HYBRID WATERMELON</a></li>
                <li><a class="btn btn-small btn-transparent btn-block "href="client_show_subcat.php?catagory1=HYBRID_CAULIFLOWER">HYBRID CAULIFLOWER</a></li>
                <li><a class="btn btn-small btn-transparent btn-block "href="client_show_subcat.php?catagory1=HYBRID_CABBAGE">HYBRID CABBAGE</a></li>
                <li><a class="btn btn-small btn-transparent btn-block "href="client_show_subcat.php?catagory1=IMPROVED_CORIANDER">IMPROVED CORIANDER</a></li>
                <li><a class="btn btn-small btn-transparent btn-block "href="client_show_subcat.php?catagory1=IMPROVED_RADDISH">IMPROVED RADDISH</a></li>
                <li><a class="btn btn-small btn-transparent btn-block "href="client_show_subcat.php?catagory1=IMPROVED_COWPEA">IMPROVED COWPEA</a></li>
              </ul>
            </div>

          </div>
        </div>
      </li>
        <li class="nav-item dropdown dropdown-slide">
            <a class="nav-link dropdown-toggle" href="client_show_product.php" id="navbarDropdown4" role="button" data-delay="350"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Department
          </a>
          <ul class="dropdown-menu " aria-labelledby="navbarDropdown3">
                <li><a href="research.php" >RESEARCH</a></li>
                <li><a href="development.php">DEVELOPMENT</a></li>
                <li><a href="production.php" >PRODUCTION</a></li>
                <li><a href="quality.php">QUALITY ASSURANCE</a></li>
                <li><a href="plant_processing.php" >PROCESSING</a></li>
            </ul>
        </li>


        <li class="nav-item dropdown dropdown-slide">
            <a class="nav-link dropdown-toggle" href="contact.php" >Contact us</a>
        </li>
    </ul>
    </div>
    <!-- Navbar-collapse -->

    <ul class="top-menu list-inline mb-0 d-none d-lg-block " id="top-menu ">
    <li class="list-inline-item ">
        <a href="" class="search_toggle " id="search-icon "><i class="tf-ion-android-search "></i></a>
      </li>
      <li class="dropdown cart-nav dropdown-slide list-inline-item ">
        <a href="# " class="dropdown-toggle cart-icon " data-toggle="dropdown " data-hover="dropdown ">
          <i class="tf-ion-android-cart "></i>
        </a>
        <div class="dropdown-menu cart-dropdown ">
        <?php

          if(!empty($_SESSION["shopping_cart"]))
          {
              $total = 0;
              $count = 0;
              $end = 3;?>

              <div class="cart-summary ">
            <span class="h6 "><center>CART ITEMS</center></span>
        </div>
        <div class="media">
          <div class="media-body">
           </div>
        </div>
        <?php
              foreach($_SESSION["shopping_cart"] as $keys => $values)
              {
                $count++;
        ?>



        <div class="media">
          <div class="media-body">
            <h6>  <?php echo $values["item_name"]; ?>  </h6>
            <div class="cart-price">
              <span>  <?php echo $values["item_quantity"];?> kg x </span>
              <span> ₹<?php echo $values["item_price"]; ?></span>
              <span>= ₹<?php error_reporting(E_ERROR | E_PARSE);echo number_format($values["item_quantity"] * $values["item_price"], 1);?></span>
            </div>
          </div>
        </div>

            <?php
                  $total = $total + ($values["item_quantity"] * $values["item_price"]);
                  if ($count == $end) break;
                }
            ?>
            <div class="cart-summary ">
              <span class="h6 ">
                <?php
                if( count($_SESSION["shopping_cart"]) == '4')
                {

                  echo count($_SESSION["shopping_cart"]) - '3';?> More Item in cart<?php
                }
                else if(count($_SESSION["shopping_cart"]) > '4')
                {

                  echo count($_SESSION["shopping_cart"]) - '3';?> More Items in cart<?php
                }
                else{

                }
                ?>
              </span>

            <div class="text-center cart-buttons mt-3 ">
              <a href="cart.php " class="btn btn-small btn-transparent btn-block ">View Cart</a>
              <a href="client_additional_details.php" class="btn btn-small btn-main btn-block ">Checkout</a>
            </div>
          </div><?php
        }
            else
            {?>
            <center>
              <?php echo "Cart is Empty !"; ?>
            </center>
            <?php
            }
            ?>
        </div>
      </li>
      <li class="dropdown cart-nav dropdown-slide list-inline-item ">
        <a data-toggle="dropdown " data-hover="dropdown " href="login.php "><i class="tf-ion-ios-person mr-3 "></i></a>
        <div class="dropdown-menu cart-dropdown ">
          <div class="text-center cart-buttons">
          <?php if(isset($_SESSION['login_user']))
          {?>

          <i class="tf-ion-ios-person mr-3 "> |</i><span class="h5 "><?php echo $_SESSION['login_user']; ?></span>
            <div class="media ">
              <div class="media-body ">
                <a href="profile-details.php" class="btn btn-small btn-transparent btn-block ">My Profile</a>
                <a href="client_show_order_history.php" class="btn btn-small btn-transparent btn-block ">My Orders</a>
                <a href="logout.php" class="btn btn-small btn-main btn-block ">Logout</a>
              </div>
            </div>
          </div>
            <?php }
            else{?>
            <a href="login.php" class="btn btn-small btn-transparent btn-block ">LOGIN</a>
            <span class="h5 ">OR</span>
            <a href="signup.php" class="btn btn-small btn-main btn-block ">REGISTER</a>
            <?php }?>
        </div>
      </li>
    </ul>
  </div>
</nav>

<!--search overlay start-->
<div class="search-wrap ">
  <div class="overlay ">
    <form action="search.php " method="GET" class="search-form ">
      <div class="container ">
        <div class="row ">
          <div class="col-md-10 col-9 ">
            <input type="text "  name="search1" id="search1" class="form-control " placeholder="Search... " />
          </div>
          <div class="col-md-2 col-3 text-right ">
            <div class="search_toggle toggle-wrap d-inline-block ">
              <img class="search-close " src="images/close.png " alt=" " />
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>

<!--search overlay end-->

<section class="page-header ">
	<div class="overly "></div>
	<div class="container ">
		<div class="row justify-content-center ">
			<div class="col-lg-6 ">
				<div class="content text-center ">
					<h1 class="mb-3 ">About Us</h1>

				<nav aria-label="breadcrumb ">
				  </nav>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="about section ">
	<div class="container ">
		<div class="row ">
			<div class="">
				<div class="about-info ">
          <img src="images/about/a1.jpg">
					<h4 ">Our Mission</h4>
					<p>Welcome to Agro Seeds Pvt. Ltd.
 Agro Seeds participated and shared its role by producing and supplying quality hybrid seeds to the framers at affordable cost. Agro-11, the cotton hybrid introduced in 1992 is known for seed quality, tolerance to biotic and abiotic stresses. Ajeet-11 was followed by Ajeet-33 with distinguishing differences and attributes. Continued research had resulted in many hybrids in Jowar, Bajra, Maize, Sunflower, Vegetables and hybrid Bhendi Ajeet-311 was launched in 2002.  It was followed by hybrid Chilies, Brinjal, Tomato, Bottle Gourd, Bitter Gourd etc.


Agro Seed is the first private seed company to introduce proprietory variety of Wheat Ajeet-102. The progress is continued and spontaneous. As a result the product profile of the company covers 22 crops and their 55 different hybrids-varieties.


With the clear understanding the pivotal role of Bio-technology in seed industry, a separate research division, Plant Biotechnology Research Center (PBRC) had been established in 2003 at Hanumantgaon, Taluka Gangapur.  This Center has been recognized as a Research Center by Dr. Babasaheb Ambedkar Marathwada University.


The Company established a “State of Art” laboratory supported by team of expert scientists headed by a Veteran Biotech Expert. The company is trying to develop own / indigenous transgenic technology for the crops which shall accelerate the progress furthermore in the nearest future.

Agro Seeds,  the company with many years of excellence and earnestly dedicated to farm prosperity, is already geared up for genetic research using crop bio-technology for the prosperity of Indian farmers.  Accordingly it has introduced genetically modified three Bt Cotton hybrids in Kharif-2006.</p>
				</div>
			</div>

		</div>
	</div>
</section>

<section class="team section ">
	<div class="container ">
		<div class="row justify-content-center ">
			<div class="col-lg-8 ">
				<div class="title text-center ">
					<h2>Team Members</h2>
					<p>Dedicated team behind the scene</p>
				</div>
			</div>
		</div>
		<div class="row ">
			<div class="col-lg-4 col-sm-6 col-md-6 ">
				<div class="team-member mb-5 mb-lg-0 ">
					<img class="img-fluid " src="images/team/1.jpg " alt=" ">
					<h4 class="mt-3 mb-0 ">PRIYA</h4>
					<p>Founder & Developer</p>
				</div>
			</div>
			<div class="col-lg-4 col-sm-6 col-md-6 ">
				<div class="team-member mb-5 mb-lg-0 ">
					<img class="img-fluid " src="images/team/1.jpg " alt=" ">
					<h4 class="mt-3 mb-0 ">PRIYA</h4>
					<p>Developer</p>
				</div>
			</div>
			<div class="col-lg-4 col-sm-6 col-md-6 ">
				<div class="team-member mb-5 mb-lg-0 ">
					<img class="img-fluid " src="images/team/1.jpg " alt=" ">
					<h4 class="mt-3 mb-0 ">PRIYA</h4>
					<p>Project Guide</p>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- instagram -->

<!-- /instagram -->
<footer class="footer ">
            <div class="container ">
                <div class="row ">
                    <div class="col-md- col-lg-4 col-sm-6 mb-5 mb-lg-0 text-center text-sm-left mr-auto ">
                        <div class="footer-widget ">
                            <h4 class="mb-4 "><img src="images/slider/logo/logo.png " alt="Vaxon. " class="img-fluid "></h4>
                            <p class="lead "></p>

                            <div class=" ">
                                <p class="mb-0 "><strong>Location :</strong>
                                </p>
                                <p>M.G. Road,<br> Porbandar-360575,<br> Gujarat,<br>India.</p>
                                <p><strong>Support Email : </strong> agroseeds001@email.com</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-2 col-sm-6 mb-5 mb-lg-0 text-center text-sm-left ">
                        <div class="footer-widget ">
                            <h4 class="mb-4 ">Category</h4>
                            <ul class="pl-0 list-unstyled mb-0 ">
                                <li><a  href="client_show_catagory_details.php?catagory=CAREALS_AND_PULSES" >CAREALS & PULSES</a></li>
                                <li><a  href="client_show_catagory_details.php?catagory=FIBRE_AND_OIL_CROPS" >FIBRE & OIL CROPS</a></li>
                                <li><a  href="client_show_catagory_details.php?catagory=VEGITABLE_CROPS" >VEGITABLE CROPS</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-2 col-sm-6 mb-5 mb-lg-0 text-center text-sm-left ">
                        <div class="footer-widget ">
                            <h4 class="mb-4 ">Useful Link</h4>
                            <ul class="pl-0 list-unstyled mb-0 ">
                                <li><a href="faq.php ">FAQ</a></li>
                                <li><a href="about.php ">About Us</a></li>
                                <li><a href="contact.php ">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 col-sm-6 text-center text-sm-left ">
                        <div class="footer-widget ">
                            <h4 class="mb-4 ">Opening Hours</h4>
                            <ul class="pl-0 list-unstyled mb-5 ">
                                <li class="d-lg-flex justify-content-between ">Monday-Saturday <span>9:00 AM-9:00 PM</span></li>
                                <li class="d-lg-flex justify-content-between ">Sunday <span>9:00 AM-06-00 PM</span></li>
                            </ul>

                            <h5>Call Now : +91 (0286) 224 5725</h5>
                        </div>
                    </div>
                </div>
            </div>
        </footer>


        <div class="footer-btm py-4 ">
            <div class="container ">
                <div class="row ">
                    <div class="col-lg-6 ">
                        <p class="copyright mb-0 ">@ Copyright Reserved to Madhuban. </p>
                    </div>
                    <div class="col-lg-6 ">
                        <ul class="list-inline mb-0 footer-btm-links text-lg-right mt-2 mt-lg-0 ">
                            <li class="list-inline-item "><a href="404.php ">Privacy Policy</a></li>
                            <li class="list-inline-item "><a href="404.php ">Terms &amp; Conditions</a></li>
                            <li class="list-inline-item "><a href="404.php ">Cookie Policy</a></li>
                            <li class="list-inline-item "><a href="404.php ">Terms of Sale</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>



    <!--
    Essential Scripts
    =====================================-->

    <!-- Main jQuery -->
    <script src="plugins/jquery/dist/jquery.min.js "></script>
    <!-- Bootstrap 4.3.1 -->
    <script src="plugins/bootstrap/js/bootstrap.min.js "></script>
     <!-- Count Down Js -->
    <script src="plugins/SyoTimer/jquery.syotimer.min.js "></script>
    <script src="plugins/bootstrap-slider/bootstrap-slider.min.js "></script>
    <!-- Slick Slider -->
    <script src="plugins/slick-carousel/slick/slick.min.js "></script>
    <!-- rating star -->
    <script src="plugins/rating/rating.js "></script>
    <!-- Instagram Feed Js -->
    <script src="plugins/instafeed-js/instafeed.min.js "></script>
    <!-- Google Mapl -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCC72vZw-6tGqFyRhhg5CkF2fqfILn2Tsw "></script>
    <script src="plugins/google-map/gmap.js "></script>


    <!-- Main Js File -->
    <script src="js/script.js "></script>

  </body>

<!-- Mirrored from demo.themefisher.com/adrian/about.php by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 09 Feb 2020 18:32:53 GMT -->
</html>