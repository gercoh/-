<?php

use common\Router;

/**
 * @var \application\models\CvDataFactory $parts
 */

?>
<div class="col-lg-4 col-md-5">
    <div class="card card-user">
        <?php if ($parts->getPersonal()->getPhoto()) : ?>
            <div class="image">
                <img src="/public/administration/img/background.jpg" alt="CV"/>
            </div>
        <?php endif; ?>
        <div class="content">
            <div class="author <?= empty($parts->getPersonal()->getPhoto()) ? 'no-margin' : ''; ?>">
                <?php if ($parts->getPersonal()->getPhoto()) : ?>
                    <img class="avatar border-white" src="<?= $parts->getPersonal()->getPhoto(); ?>"
                         alt="<?= $parts->getPersonal()->getName(); ?>"/>
                <?php endif; ?>
                <h4 class="title"><?= $parts->getPersonal()->getName(); ?><br/>
                    <a href="#">
                        <small><?= $parts->getPersonal()->getPosition(); ?></small>
                    </a>
                </h4>
            </div>
            <p class="description text-center">
                <?= nl2br($parts->getPersonal()->getInformation()); ?>
            </p>
            <p class="description text-center">
                <a href="/<?= Router::getInstance()->getRoutMarker() ?>/personal" class="btn btn-info btn-fill btn-wd">
                    Edit personal data
                </a>
            </p>
        </div>
    </div>



    </div>

</div>
<div class="col-lg-8 col-md-7">
    <div class="card">
        <div class="header">
            <h4 class="title">
                Work Experience
                <a href="/<?= Router::getInstance()->getRoutMarker() ?>/experience" class="pull-right">
                    <small>Edit</small>
                </a>
            </h4>
        </div>
        <div class="content">
            <ul class="list-unstyled team-members">
                <?php foreach ($parts->getExperience() as $experience) : ?>
                    <li>
                        <p>
                            <span class="text-success"><small><?= $experience->getPeriod(); ?></small></span>
                            <br>
                            <?= $experience->getPosition(); ?> in
                            <span class="text-success"><?= $experience->getCompany(); ?></span>
                        </p>
                        <blockquote>
                            <p><?= nl2br($experience->getDescription()); ?></p>
                        </blockquote>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>

    </div>

    </div>
</div>