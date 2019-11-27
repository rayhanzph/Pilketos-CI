<!DOCTYPE html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <!-- Meta Tags -->
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="ASTRHOST - Responsive Hosting Template">
    <meta name="author" content="nedjai">
    <link rel="icon" href="favicon.ico">
    <!-- Tittle -->
    <title><?= $title; ?> </title>

    <!-- Stylesheet -->
    <link href="<?= base_url('assets/pilih/'); ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/pilih/'); ?>css/style.css" rel="stylesheet">
    <link href="<?= base_url('assets/pilih/'); ?>css/responsive.css" rel="stylesheet">
    <link href="<?= base_url('assets/pilih/'); ?>css/flaticon.css" rel="stylesheet">
    <link href="<?= base_url('assets/pilih/'); ?>css/font-awesome.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/pilih/'); ?>css/animate.css" rel="stylesheet" />
    <link href="<?= base_url('assets/pilih/'); ?>css/select2.min.css" rel="stylesheet" />

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style type="text/css">
        
/*#hositng-plans .pricing-container .plan .planone{
    background: url(img/plans/plan01.jpg) no-repeat top center;
}

#hositng-plans .pricing-container .plan .plantwo{
    background: url(img/plans/plan02.jpg) no-repeat top center;
}

#hositng-plans .pricing-container .plan .plantree{
    background: url(img/plans/plan03.jpg) no-repeat top center;
}*/
    </style>
</head>
<!-- BODY START -->
<body data-spy="scroll" data-offset="80">

    <section id="hositng-plans"><!-- HOSTING PLANS START -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="head-tittle">
                        <h5>Pilketos Online</h5>
                        <span>Pilih kandidat sesuai dengan pilihan hati anda</span>
                    </div>
                    <div class="col-md-10 col-md-push-1">
                        <div class="pricing-container">
                            <?php foreach($candidate as $c) : ?>
                            <div class="col-md-4">
                                <div class="plan wow fadeInLeft" data-wow-delay="0.1s"><!-- START PLAN -->
                                   <!--  <div class="paln-head planone" style="background: url(<?= base_url('assets/img/candidate/') . $c['foto']; ?>) no-repeat top center; background-position: center;">
                                        
                                    </div> -->
                                    <img src="<?= base_url('assets/img/candidate/') . $c['foto']; ?>" width="100%" height="250" style="border-top-left-radius: 10px; border-top-right-radius: 10px;">
                                    <?php  ?>
                                    <div class="plans-tag"><?= substr($c['nama'], 0,20); ?></div>
                                    <div class="plans-body">
                                        <ul>
                                            <li>Kelas : <?= $c['kelas']; ?></li>
                                            <li><center>Motto</center><h5><center><?= $c['motto']; ?></center></h5></li>
                                            <li>Visi  : <center><?= $c['visi']; ?></center></li>
                                            <li>Misi  : <?= $c['misi']; ?></li>
                                        </ul>
                                    </div>
                                    <div class="plans-footer">
                                        <a href="<?= base_url('Voter/pilih'); ?>/<?= $c['id']; ?>" class="btn btn-primary" onclick="return confirm('Anda yakin akan memilih kandidat?');" style="color:  #fff; border: none;">Pilih</a>
                                    </div>
                                </div><!-- END PLAN -->
                            </div>
                            <?php endforeach; ?>
<!-- 
                            <div class="col-md-4">
                                <div class="plan wow fadeInLeft" data-wow-delay="0.3s">
                                    <div class="paln-head plantwo" style="background: url(<?= base_url('assets/pilih/'); ?>img/plans/plan02.jpg) no-repeat top center;">
                                        
                                    </div>
                                    <div class="plans-tag">bussines</div>
                                    <div class="plans-body">
                                        <ul>
                                            <li><i class="fa fa-database" aria-hidden="true"></i> <b>Unlimited</b> Storage</li>
                                            <li><i class="fa fa-download" aria-hidden="true"></i> <b>Unlimited</b> Bandwith</li>
                                        </ul>
                                    </div>
                                    <div class="plans-footer">
                                        <a href="#">purchase</a>
                                    </div>
                            </div>


                            <div class="col-md-4">
                                <div class="plan wow fadeInLeft" data-wow-delay="0.5s">
                                    <div class="paln-head plantree" style="background: url(<?= base_url('assets/pilih/'); ?>img/plans/plan03.jpg) no-repeat top center;">
                                    </div>
                                    <div class="plans-tag">business</div>
                                    <div class="plans-body">
                                        <ul>
                                            <li><i class="fa fa-database" aria-hidden="true"></i> <b>Unlimited</b> Storage</li>
                                            <li><i class="fa fa-download" aria-hidden="true"></i> <b>Unlimited</b> Bandwith</li>
                                        </ul>
                                    </div>
                                    <div class="plans-footer">
                                        <a href="#">purchase</a>
                                    </div>
                                </div>
                            </div> -->
                    </div>

                </div>

            </div>
 <!-- TEC ON SERVER END -->
        </div>
    </section><!-- END HOST SERCTION -->

    <footer id="footer-area"> <!-- START FOOTER -->
        <div class="container">
            <center><span class="text-center text-white" style="color:#fff" >Copyrights : <a href="http://hitrash.id"> &copy 2019</a></span></center>
        
        </div>
    </footer><!-- END FOOTER -->

    <!-- JAVASCRIPT -->
    <script src="<?= base_url('assets/pilih/'); ?>js/wow.min.js"></script>
    <script src="<?= base_url('assets/pilih/'); ?>js/jquery.min.js"></script>
    <script src="<?= base_url('assets/pilih/'); ?>js/bootstrap.min.js"></script>
    <script src="<?= base_url('assets/pilih/'); ?><?= base_url('assets/pilih/'); ?>js/text-changer.js"></script>
    <script src="<?= base_url('assets/pilih/'); ?>js/select2.min.js"></script>
    <script src="<?= base_url('assets/pilih/'); ?>js/contact.js"></script>
    <script src="<?= base_url('assets/pilih/'); ?>js/smoothscroll.js"></script>
    <script src="<?= base_url('assets/pilih/'); ?>js/counter.js"></script>
    <script src="<?= base_url('assets/pilih/'); ?>js/page.js"></script>
    <script src="<?= base_url('assets/pilih/'); ?>js/responsive-menu.js"></script>

</body><!-- END BODY -->

</html>