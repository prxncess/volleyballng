<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">


            <title><?php echo $__env->yieldContent('title'); ?></title>
    <!-- Bootstrap CSS -->
    <link href="<?php echo e(asset('css/bootstrap2.min.css')); ?>" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="<?php echo e(asset('css/bootstrap-theme.css')); ?>" rel="stylesheet">

    <link href="<?php echo e(asset('css/font-awesome.min.css')); ?>" rel="stylesheet" />


    <!-- Custom styles -->
    <link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/style-responsive.css')); ?>" rel="stylesheet" />

    <!-- =======================================================
        Theme Name: NiceAdmin
        Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
        Author: BootstrapMade
        Author URL: https://bootstrapmade.com
    ======================================================= -->
</head>

<body>
<!-- container section start -->
<section id="container" class="">

<?php echo $__env->make('.admin.navbar.navbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <!--sidebar end-->

    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <?php echo $__env->yieldContent('content'); ?>

        </section>
    <!--main content end-->
    </section>
<!-- container section start -->
</section>
<!-- javascripts -->
<script src=" <?php echo e(asset('js/jquery-1.11.1.js')); ?>"></script>
<script src="<?php echo e(asset('js/jquery-ui-1.10.4.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('js/jquery-ui-1.9.2.custom.min.js')); ?>"></script>
<!-- bootstrap -->
<script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
<!-- nice scroll -->


<!--custome script for all page-->
<script src="<?php echo e(asset('js/scripts.js')); ?>"></script>
<!-- custom script for this page-->

<script src="<?php echo e(asset('js/morris.min.js')); ?>"></script>

<?php echo $__env->yieldContent('footer-scripts'); ?>
<script>

    //knob
    $(function() {
        $(".knob").knob({
            'draw' : function () {
                $(this.i).val(this.cv + '%')
            }
        })
    });

    //carousel

    //custom select box

    $(function(){
        $('select.styled').customSelect();
    });

    /* ---------- Map ---------- */

</script>

</body>
</html>
