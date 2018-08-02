<?php

/**
 * @var \application\models\cv\CvPartsFactory $parts
 */

?>

<!-- Start Sidebar -->
<aside class="col l4 m12 s12 sidebar z-depth-1" id="sidebar">
    <!--  Sidebar row -->
    <div class="row">
        <!--  top section   -->
        <div class="heading">

            <?php if ($parts->getPersonal()->getPhoto()) : ?>
                <div class="feature-img">
                    <a href="/"><img src="<?= $parts->getPersonal()->getPhoto(); ?>" class="responsive-img" alt=""></a>
                </div>
            <?php endif; ?>
            
            <div class="title col s12 m12 l9 right  wow fadeIn" data-wow-delay="0.1s">
                <h2><?= $parts->getPersonal()->getName(); ?></h2> <!-- title name -->
                <span><?= $parts->getPersonal()->getPosition(); ?></span>  <!-- tagline -->
            </div>
        </div>
        <!-- sidebar info -->
        <div class="col l12 m12 s12 sort-info sidebar-item">
            <div class="row">
                <div class="col m12 s12 l3 icon"> <!-- icon -->
                    <i class="fa fa-user"></i>
                </div>
                <div class="col m12 s12 l9 info wow fadeIn a1" data-wow-delay="0.1s"> <!-- text -->
                    <div class="section-item-details">
                        <?php
                        //<!--подзапрос в базу, можно упростить но небыло времени=)-->
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $dbname = 'cv';
    $db = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname) or die("хрень какая-то с подключением к базе данных ищи там");
    mysqli_select_db($db,$dbname) or die("ошибочка пацани сварачиваемся");

    $result = mysqli_fetch_assoc(mysqli_query($db,"SELECT `position` FROM `experience` WHERE id IN (SELECT MAX(`id`) FROM `experience`) "));

echo "Акционное предложение ". $result['position'];
?>

                    </div>
                </div>
            </div>
        </div>


    </div>   <!-- end row -->
</aside><!-- end sidebar -->



<section class="col s12 m12 l8 section">
    <div class="row">
        <div class="section-wrapper z-depth-1">
            <div class="section-icon col s12 m12 l2">
                <i class="fa fa-suitcase"></i>
            </div>
            <div class="custom-content col s12 m12 l10 wow fadeIn a1" data-wow-delay="0.1s">
                <h2>Школьная Форма</h2>
                <?php foreach ($parts->getExperience() as $id => $work) : ?>
                    <div class="custom-content-wrapper wow fadeIn a<?= $id + 2; ?>" data-wow-delay="0.2s">
                        <h3>
                            <?= $work->getPosition(); ?>
                            <span>@<?= $work->getCompany(); ?></span>
                        </h3>
                        <span><?= $work->getPeriod(); ?> </span>
                        <p><?= nl2br($work->getDescription()); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>




    </div><!-- end row -->
</section><!-- end section -->