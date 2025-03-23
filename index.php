<?php 
session_start();
require_once 'koneksi.php';

if (isset($_POST['kirim'])) {
	$nama = $_POST['nama'];
	$email = $_POST['email'];
	$subject = $_POST['subject'];
	$pesan = $_POST['pesan'];
	$cekEmail = mysqli_query($conn, "SELECT * FROM contact WHERE email = '$Email'");
	$rowEmail = mysqli_fetch_assoc($cekEmail);

	if ($rowEmail) {
		header("location: index.php");
		die;
	} else {
		$insert = mysqli_query($conn, "INSERT INTO contact (nama, email, subjek, pesan) VALUES ('$nama', '$email', '$subject',' $pesan')");
		if ($insert) {
			header("location: index.php?#contact-section&contact=berhasil");
		}
	}
}


$selectabout = mysqli_query($conn, "SELECT * FROM setting Where id= 1");
$rowabout = mysqli_fetch_assoc($selectabout);

$selectskill = mysqli_query($conn, "SELECT * FROM skill");
$rowskill = mysqli_fetch_all($selectskill, MYSQLI_ASSOC);

$selectproject = mysqli_query($conn, 
    "SELECT project.*, kategori.nama AS kategori_nama 
     FROM project 
     JOIN kategori ON project.kategori_id = kategori.id"
);
$projects = mysqli_fetch_all($selectproject, MYSQLI_ASSOC);

$selectblog = mysqli_query($conn, "SELECT blog.*, categories.nama_kategori FROM blog JOIN categories ON blog.id_kategori = categories.id");
$rowsblog = mysqli_fetch_all($selectblog, MYSQLI_ASSOC);

$selectservice = mysqli_query($conn, "SELECT * FROM service");
$rowsservice = mysqli_fetch_all($selectservice, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta charset="UTF-8">
    <title>RAKAPRATAMA</title>

    <!-- ====== Google Fonts ====== -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600" rel="stylesheet">

    <!-- ====== ALL CSS ====== -->
    <link rel="stylesheet" href="assets/fecss/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fecss/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fecss/lightbox.min.css">
    <link rel="stylesheet" href="assets/fecss/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/fecss/animate.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="assets/fecss/responsive.css">

</head>

<body data-spy="scroll" data-target=".navbar-nav">
    
     <!-- Preloader -->
    <div class="preloader">
        <div class="spinner">
            <div class="cube1"></div>
            <div class="cube2"></div>
        </div>
    </div>
    <!-- // Preloader -->
    

    <!-- ====== Header ====== -->
    <header id="header" class="header">
        <!-- ====== Navbar ====== -->
        <nav class="navbar navbar-expand-lg fixed-top">
            <div class="container">
                <!-- Logo -->
                <h1 style="color: crimson;"><i>RAKAPRATAMA</i></h1>
                <!-- // Logo -->

                <!-- Mobile Menu -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-expanded="false"><span><i class="fa fa-bars"></i></span></button>
                <!-- Mobile Menu -->

                <div class="collapse navbar-collapse main-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active"><a class="nav-link" href="#home">HOME</a></li>
                        <li class="nav-item"><a class="nav-link" href="#about">ABOUT</a></li>
                        <li class="nav-item"><a class="nav-link" href="#service">SERVICE</a></li>
                        <li class="nav-item"><a class="nav-link" href="#portfolio">PORTFOLIO</a></li>
                        <li class="nav-item"><a class="nav-link" href="#blog">BLOG</a></li>
                        <li class="nav-item"><a class="nav-link pr0" href="#contact">CONTACT</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- ====== // Navbar ====== -->
    </header>
    <!-- ====== // Header ====== -->

    <!-- ====== Hero Area ====== -->
    <div class="hero-aria" id="home">
        <!-- Hero Area Content -->
        <div class="container">
            <div class="hero-content h-100">
                <div class="d-table">
                    <div class="d-table-cell">
                        <h2 class="text-uppercase">Let's Begin</h2>
                        <h3 class="text-uppercase"><span class="typed"></span></h3>
                        <p>Make designed by as Begindot.</p>
                        <a href="#about" class="button smooth-scroll">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- // Hero Area Content -->
        <!-- Hero Area Slider -->
        <div class="hero-area-slids owl-carousel">
            <div class="single-slider">
                <!-- Single Background -->
                <div class="slider-bg" style="background-image: url(assets/images/hero-area/img-1.jpg)"></div>
                <!-- // Single Background -->
            </div>
            <div class="single-slider">
                <!-- Single Background -->
                <div class="slider-bg" style="background-image: url(assets/images/hero-area/img-2.jpg)"></div>
                <!-- // Single Background -->
            </div>
        </div>
        <!-- // Hero Area Slider -->
    </div>
    <!-- ====== //Hero Area ====== -->

    <!-- ====== Featured Area ====== -->
    <section id="featured" class="section-padding pb-70">
        <div class="container">
            <div class="row">
                <!-- single featured item -->
                <div class="col-lg-4 col-md-6">
                    <div class="single-featured-item-wrap">
                        <h3><a href="#">Graphic Design</a></h3>
                        <div class="single-featured-item">
                            <div class="featured-icon">
                                <i class="fa fa-edit"></i>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. In, voluptatibus, sunt. Recusandae ab aliquid voluptate exercitationem dicta ipsa, odio cumque sapiente quaerat nisi ad rem dolor iusto.</p>
                        </div>
                    </div>
                </div>
                <!-- single featured item -->
                <!-- single featured item -->
                <div class="col-lg-4 col-md-6">
                    <div class="single-featured-item-wrap">
                        <h3><a href="#">Web Design</a></h3>
                        <div class="single-featured-item">
                            <div class="featured-icon">
                                <i class="fa fa-code"></i>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. In, voluptatibus, sunt. Recusandae ab aliquid voluptate exercitationem dicta ipsa, odio cumque sapiente quaerat nisi ad rem dolor iusto.</p>
                        </div>
                    </div>
                </div>
                <!-- single featured item -->
                <!-- single featured item -->
                <div class="col-lg-4 col-md-6">
                    <div class="single-featured-item-wrap">
                        <h3><a href="#">SEO Services</a></h3>
                        <div class="single-featured-item">
                            <div class="featured-icon">
                                <i class="fa fa-search"></i>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. In, voluptatibus, sunt. Recusandae ab aliquid voluptate exercitationem dicta ipsa, odio cumque sapiente quaerat nisi ad rem dolor iusto.</p>
                        </div>
                    </div>
                </div>
                <!-- single featured item -->
            </div>
        </div>
    </section>
    <!-- ====== //Featured Area ====== -->

    <!-- ====== About Area ====== -->
    <section id="about" class="section-padding about-area bg-light">
        <div class="container">
            <!-- Section Title -->
            <div class="row justify-content-center">
                <div class="col-lg-6 ">
                    <div class="section-title text-center">
                        <h2>About Me</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus placeat unde non modi, facilis, quae?</p>
                    </div>
                </div>
            </div>
            <!-- //Section Title -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-bg" style="background-image: url(<?= "assets/uploads/" . $rowabout['logo'] ?>);">
                        <!-- Social Link -->
                        <div class="social-aria">
                            <a target="_blank" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a target="_blank" href="#"><i class="fab fa-twitter"></i></a>
                            <a target="_blank" href="#"><i class="fab fa-instagram"></i></a>
                            <a target="_blank" href="#"><i class="fab fa-pinterest"></i></a>
                            <a target="_blank" href="#"><i class="fab fa-youtube"></i></a>
                        </div>
                        <!-- // Social Link -->
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-content">
                        <h2>Hello, I am <span><?= $rowabout['nama_lengkap'] ?></span></h2>
                        <h4><?= $rowabout['nama_judul'] ?></h4>
                        <p><?= $rowabout['isi'] ?></p>
                        <ul class="about-info mt-4 px-md-0 px-2">
								<li class="d-flex"><span><?= $rowabout['tanggal_lahir'] ?></span></li>
								<li class="d-flex"><span><?= $rowabout['alamat'] ?></span></li> 
								<li class="d-flex"><span><?= $rowabout['email'] ?></span></li>
								<li class="d-flex"><span><?= $rowabout['tlpn'] ?></span></li>
							</ul>
                        <h5>My Skills</h5>
                        <!-- Skill Area -->
                        <div id="skills" class="skill-area">
                            <?php foreach ($rowskill as $row) { ?>
                            <!-- Single skill -->
                            <div class="single-skill">
                                <div class="skillbar bg-warning" style="width:<?= $row['persentase'] ?>%">
                                    <div class="skillbar-title"><span><?= $row['nama_skill'] ?></span></div>
                                    <div class="skillbar-bar"></div>
                                    <div class="skill-bar-percent"><?= $row['persentase']?>%</div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                        <!-- //Skill Area -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ====== // About Area ====== -->


    <!-- ====== Fact Counter Section ====== -->
    <!-- ====================================================================
            NOTE: You need to change  'data-count="10"' and 'p' Eliments 
        ===================================================================== -->
    <section class="section-padding pb-70 bg-img fact-counter" id="counter" style="background-image: url(assets/images/fan-fact-bg.jpg)">
        <div class="container">
            <div class="row">
                <!-- Single Fact Counter -->
                <div class="col-lg-3 co col-md-6 l-md-6 text-center">
                    <div class="single-fun-fact">
                        <h2><span class="counter-value" data-count="08">0</span>+</h2>
                        <p>Years Experience</p>
                    </div>
                </div>
                <!-- // Single Fact Counter -->
                <!-- Single Fact Counter -->
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="single-fun-fact">
                        <h2><span class="counter-value" data-count="600">0</span>+</h2>
                        <p>Happy Clients</p>
                    </div>
                </div>
                <!-- // Single Fact Counter -->
                <!-- Single Fact Counter -->
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="single-fun-fact">
                        <h2><span class="counter-value" data-count="09">0</span>+</h2>
                        <p>Awards Win</p>
                    </div>
                </div>
                <!-- // Single Fact Counter -->
                <!-- Single Fact Counter -->
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="single-fun-fact">
                        <h2><span class="counter-value" data-count="451">0</span>+</h2>
                        <p>Cups of Coffee</p>
                    </div>
                </div>
                <!-- // Single Fact Counter -->
            </div>
        </div>
    </section>
    <!-- ====== //Fact Counter Section ====== -->

    <!-- ====== Service Section ====== -->
    <section id="service" class="section-padding pb-70 service-area bg-light">
        <div class="container">
            <!-- Section Title -->
            <div class="row justify-content-center">
                <div class="col-lg-6 ">
                    <div class="section-title text-center">
                        <h2>Service</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    </div>
                </div>
            </div>
            <!-- //Section Title -->

            <div class="row">
                <?php foreach ($rowsservice as $row) { ?>
                <!-- Single Service -->
                <div class="col-lg-4 col-md-6">
                    <div class="single-service">
                        <div class="service-icon">
                            <i class="<?= $row['icon'] ?>"></i>
                        </div>
                        <h2><?= $row['nama_service'] ?></h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente minima repudiandae amet, accusamus ea impedit aperiam consectetur libero. Deleniti id sit minima.</p>
                    </div>
                </div>
                <?php } ?>
                <!-- //Single Service -->
            </div>

        </div>
    </section>
    <!-- ====== //Service Section ====== -->

    <!-- ====== Why choose Me Section ====== -->
    <section id="" class="section-padding why-choose-us pb-70" style="background-image: url(img/sok.jpg)">
        <div class="container">
            <!-- Section Title -->
            <div class="row justify-content-center">
                <div class="col-lg-6 ">
                    <div class="section-title text-center">
                        <h2>Why choose Me</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    </div>
                </div>
            </div>
            <!-- //Section Title -->
            <div class="row">
                <!-- Single Why choose me -->
                <div class="col-md-6">
                    <div class="single-why-me why-me-left">
                        <div class="why-me-icon">
                            <div class="d-table">
                                <div class="d-table-cell">
                                    <i class="fa fa-clock"></i>
                                </div>
                            </div>
                        </div>
                        <h4>Completed on right time</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem laboriosam, soluta voluptate, quod dolore facilis iusto eligendi.</p>
                    </div>
                </div>
                <!-- // Single Why choose me -->

                <!-- Single Why choose me -->
                <div class="col-md-6">
                    <div class="single-why-me why-me-right">
                        <div class="why-me-icon">
                            <div class="d-table">
                                <div class="d-table-cell">
                                    <i class="fa fa-calendar-check"></i>
                                </div>
                            </div>
                        </div>
                        <h4>Completed on right time</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem laboriosam, soluta voluptate, quod dolore facilis iusto eligendi.</p>
                    </div>
                </div>
                <!-- // Single Why choose me -->

                <!-- Single Why choose me -->
                <div class="col-md-6">
                    <div class="single-why-me why-me-left">
                        <div class="why-me-icon">
                            <div class="d-table">
                                <div class="d-table-cell">
                                    <i class="fa fa-history"></i>
                                </div>
                            </div>
                        </div>
                        <h4>Completed on right time</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem laboriosam, soluta voluptate, quod dolore facilis iusto eligendi.</p>
                    </div>
                </div>
                <!-- // Single Why choose me -->

                <!-- Single Why choose me -->
                <div class="col-md-6">
                    <div class="single-why-me why-me-right">
                        <div class="why-me-icon">
                            <div class="d-table">
                                <div class="d-table-cell">
                                    <i class="fa fa-phone-volume"></i>
                                </div>
                            </div>
                        </div>
                        <h4>Completed on right time</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem laboriosam, soluta voluptate, quod dolore facilis iusto eligendi.</p>
                    </div>
                </div>
                <!-- // Single Why choose me -->
            </div>
        </div>
    </section>
    <!-- ====== //Why choose Me Section ====== -->

    <!-- ====== Portfolio Section ====== -->
   <section id="portfolio" class="section-padding pb-85 portfolio-area bg-light"> 
    <div class="container">
        <!-- Section Title -->
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-title text-center">
                    <h2>Recent Work</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                </div>
            </div>
        </div>
        <!-- //Section Title -->
        
        <div class="row justify-content-center">
            <!-- Work List Menu -->
            <div class="col-lg-8">
                <div class="work-list text-center">
                    <ul>
                        <li class="filter" data-filter="all">ALL</li>
                        <li class="filter" data-filter=".profile">Profile</li>
                        <li class="filter" data-filter=".e-commerce">E-Commerce</li>
                        <li class="filter" data-filter=".content">Content</li>
                        <li class="filter" data-filter=".community">Community</li>
                        <li class="filter" data-filter=".management">Management</li>
                    </ul>

                </div>
            </div>
            <!-- // Work List Menu -->
        </div>

        <div class="row portfolio">
        <?php foreach ($projects as $row) { ?>
            <div class="col-lg-4 col-md-6 mix <?= strtolower(str_replace(' ', '-', $row['kategori_nama'])) ?>">
                <div class="single-portfolio" style="background-image: url('assets/uploads/<?= $row['foto'] ?>')">
                    <div class="portfolio-icon text-center">
                        <a data-lightbox="lightbox" href="assets/uploads/<?= $row['foto'] ?>">
                            <i class="fas fa-expand-arrows-alt"></i>
                        </a>
                    </div>
                    <div class="portfolio-hover">
                        <h4>Project <span><?= $row['nama'] ?></span></h4>
                    </div>
                </div>
            </div>
        <?php } ?>
        </div>
    </div>
</section>

    <!-- ====== // Portfolio Section ====== -->

    <!-- ====== Blog Section ====== -->
    <section id="blog" class="section-padding pb-70 blog-section bg-light bg-secondary">
        <div class="container">
            <!-- Section Title -->
            <div class="row justify-content-center">
                <div class="col-lg-6 ">
                    <div class="section-title text-center">
                        <h2>Blog Area</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    </div>
                </div>
            </div>
            <!-- //Section Title -->
            <div class="row">
            <?php foreach ($rowsblog as $row) { ?>
                <!-- Single Blog -->
                <div class="col-lg-4 col-md-6">
                    <div class="single-blog">
                        <div class="blog-thumb" style="background-image: url('assets/uploads/<?= $row['foto'] ?>')"></div>
                        <h4 class="blog-title"><a href="single-blog.html"></a><?= $row['nama_kategori'] ?></h4>
                        <p class="blog-meta"><a href="#"><?= $row['penulis'] ?></a>
                        <?php
                         $date = date("M d", strtotime($row['created_at']));
                         $year = date("Y", strtotime($row['created_at']));?>
                         <p><?php echo $date . " , " . $year  ?></p>
                        <p><?= $row['isi'] ?></p>
                        <a href="blog.php" class="button">Read More</a>
                    </div>
                </div>
                <?php } ?>
                <!-- Single Blog -->
                <!-- Single Blog -->
                <!-- Single Blog -->
                <!-- Single Blog -->
                <!-- Single Blog -->
            </div>
        </div>
    </section>
    <!-- ====== // Blog Section ====== -->

    <!-- ====== Call to Action Area ====== -->
    <section class="section-padding call-to-action-aria">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <h2>Lorem ipsum dolor sit amet</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla fugit optio voluptatem modi, nemo, cupiditate vel, aspernatur, quae consequatur officia unde totam.</p>
                </div>
                <div class="col-lg-3">
                    <div class="cta-button">
                        <div class="d-table">
                            <div class="d-table-cell">
                                <a href="#" class="button">Contact me</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ====== // Call to Action Area ====== -->

    <!-- ====== Contact Area ====== -->
    <section id="contact" class="section-padding contact-section" style="position: relative; overflow: hidden;">
    <video autoplay loop muted playsinline 
    style="position: absolute; top: 50%; left: 50%; width: 100%; height: 100%; object-fit: cover; transform: translate(-50.01%, -50%); z-index: -1;">
        <source src="videos/small.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>
        <div class="container">
            <!-- Section Title -->
            <div class="row justify-content-center">
                <div class="col-lg-6 ">
                    <div class="section-title text-center">
                        <h2 style="color: white;">Contact Me</h2>
                    </div>
                </div>
            </div>
            <!-- //Section Title -->

            <!-- Contact Form -->
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    	<form action="" method="post" class="p-4 p-md-4 contact-form" style="background-image: url(img/saas.jpg)">
                            <div class="row">
						<div class="col-lg-6 form-group">
							<input type="text" name="nama" class="form-control" required placeholder="Your Name">
						</div>
						<div class="col-lg-6 form-group">
							<input type="text" name="email" class="form-control" required placeholder="Your Email">
						</div>
                        </div>
						<div class="form-group">
							<input type="text" name="subject" class="form-control" required placeholder="Subject">
						</div>
						<div class="form-group">
							<textarea name="pesan" id="" cols="30" rows="7" class="form-control" required placeholder="Message"></textarea>
						</div>
						<div align="center" class="form-group mt-5">
							<input  type="submit" name="kirim" value="Send Message" class="btn btn-primary py-3 px-5">
						</div>
					</form>
                    <!-- // Form -->
                </div>
            </div>
            <!-- // Contact Form -->
        </div>
    </section>
    <!-- ====== // Contact Area ====== -->


    <!-- ====== Footer Area ====== -->
    <footer class="footer-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="copyright-text">
                        <p class="text-white">&copy; 2018 <a href="https://www.begindot.com/">A Template Designed by Rakaprtm</a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ====== // Footer Area ====== -->






     <!-- ====== ALL JS ====== -->
     <script src="assets/fejs/bootstrap.min.js"></script>
     <script src="assets/fejs/jquery-3.3.1.min.js"></script>
    <script src="assets/fejs/lightbox.min.js"></script>
    <script src="assets/fejs/owl.carousel.min.js"></script>
    <script src="assets/fejs/jquery.mixitup.js"></script>
    <script src="assets/fejs/wow.min.js"></script>
    <script src="assets/fejs/typed.js"></script>
    <script src="assets/fejs/skill.bar.js"></script>
    <script src="assets/fejs/fact.counter.js"></script>
    <script src="assets/fejs/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/mixitup@3/dist/mixitup.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.mixitup/latest/jquery.mixitup.min.js"></script>
</body>

</html>
