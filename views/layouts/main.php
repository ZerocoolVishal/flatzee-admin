<?php

/* @var $this \yii\web\View */

/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Yii::$app->name . ' - ' . Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<!-- Sidenav -->
<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main"
                aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand pt-0" href="./index.html">
            <?= Html::img('http://www.flatzee.com/uploads/7b6600718647854f1fc5ee0d2f9d6d33_flatzeelogo.png', ['class' => 'navbar-brand-img']) ?>
            <div class="d-none d-md-block mb--5">
                <p>Admin Dashboard</p>
            </div>
        </a>
        <!-- User -->
        <ul class="nav align-items-center d-md-none">
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                   aria-expanded="false">
                    <div class="media align-items-center">
              <span class="avatar avatar-sm rounded-circle">
                <!--<img alt="Image placeholder" src="./assets/img/theme/team-1-800x800.jpg">-->
                <?= Html::img('@web/img/theme/team-1-800x800.jpg') ?>
              </span>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Welcome!</h6>
                    </div>
                    <?= Html::a('<i class="ni ni-single-02"></i><span>My profile</span>', ['backend-user/view', 'id' => Yii::$app->user->identity->getId()], ['class' => 'dropdown-item']) ?>
                    <div class="dropdown-divider"></div>
                    <?= Html::a('<i class="ni ni-user-run"></i><span>Logout</span>', ['site/logout'], ['class' => 'dropdown-item']) ?>
                </div>
            </li>
        </ul>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="./index.html">
                            <?= Html::img('http://www.flatzee.com/uploads/7b6600718647854f1fc5ee0d2f9d6d33_flatzeelogo.png', ['class' => 'navbar-brand-img']) ?>
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse"
                                data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false"
                                aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Navigation -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <?= Html::a('<i class="ni ni-tv-2 text-primary"></i> Dashboard', ['site/'], ['class' => (Yii::$app->controller->id == "site")? 'nav-link active' : 'nav-link']) ?>
                </li>
                <li class="nav-item">
                    <?= Html::a('<i class="ni ni-archive-2 text-indigo"></i> Appointments', ['appointment/'], ['class' => (Yii::$app->controller->id == "appointment")? 'nav-link active' : 'nav-link']) ?>
                </li>
                <li class="nav-item">
                    <?= Html::a('<i class="ni ni-single-02 text-blue"></i> Users', ['users/'], ['class' => (Yii::$app->controller->id == "users")? 'nav-link active' : 'nav-link']) ?>
                </li>
                <li class="nav-item">
                    <?= Html::a('<i class="ni ni-badge text-green"></i> Backend Users', ['backend-user/'], ['class' => (Yii::$app->controller->id == "backend-user")? 'nav-link active' : 'nav-link']) ?>
                </li>
                <li class="nav-item">
                    <?= Html::a('<i class="ni ni-tie-bow text-yellow"></i> Agents', ['agents/'], ['class' => (Yii::$app->controller->id == "agents")? 'nav-link active' : 'nav-link']) ?>
                </li>
                <li class="nav-item">
                    <?= Html::a('<i class="ni ni-key-25 text-orange"></i> Property Owners', ['property-owner/'], ['class' => (Yii::$app->controller->id == "property-owner")? 'nav-link active' : 'nav-link']) ?>
                </li>
                <li class="nav-item">
                    <?= Html::a('<i class="ni ni-building text-red"></i> Properties', ['property/'], ['class' => (Yii::$app->controller->id == "property")? 'nav-link active' : 'nav-link']) ?>
                </li>
                <li class="nav-item">
                    <?= Html::a('<i class="ni ni-spaceship text-primary"></i> Amenities', ['amenities/'], ['class' => (Yii::$app->controller->id == "amenities")? 'nav-link active' : 'nav-link']) ?>
                </li>
                <li class="nav-item">
                    <?= Html::a('<i class="ni ni-shop text-indigo"></i> Property Types', ['property-types/'], ['class' => (Yii::$app->controller->id == "property-types")? 'nav-link active' : 'nav-link']) ?>
                </li>
                <li class="nav-item">
                    <?= Html::a('<i class="ni ni-air-baloon text-blue"></i> Property Status', ['property-status/'], ['class' => (Yii::$app->controller->id == "property-status")? 'nav-link active' : 'nav-link']) ?>
                </li>
                <li class="nav-item">
                    <?= Html::a('<i class="ni ni-money-coins text-green"></i> Plans', ['plans/'], ['class' => (Yii::$app->controller->id == "plans")? 'nav-link active' : 'nav-link']) ?>
                </li>
            </ul>

            <!-- Divider -->
            <hr class="my-3">
            <!-- Navigation -->
            <ul class="navbar-nav mb-md-3">
                <li class="nav-item">
                    <?= Html::a('<i class="ni ni-user-run"></i> Logout', ['site/logout'], ['class' => 'nav-link', 'data-method' => 'POST']) ?>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Main content -->
<div class="main-content">

    <?= Breadcrumbs::widget([
        'itemTemplate' => "<li style='margin-right:5px'>{link} /</li>\n",
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>
    <?= Alert::widget() ?>

    <!-- Page content -->
    <?= $content ?>

    <div class="container-fluid mt-4">
        <!-- Footer -->
        <footer class="footer">
            <div class="row align-items-center justify-content-xl-between">
                <div class="col-xl-6">
                    <div class="copyright text-center text-xl-left text-muted">
                        &copy; 2018 <a href="#" class="font-weight-bold ml-1" target="_blank">FlatZee</a>
                    </div>
                </div>
                <div class="col-xl-6">
                    <ul class="nav nav-footer justify-content-center justify-content-xl-end">

                    </ul>
                </div>
            </div>
        </footer>
    </div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
