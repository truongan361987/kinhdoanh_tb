<?php
/**
 * Created by PhpStorm.
 * User: MinhDuc
 * Date: 4/22/2017
 * Time: 10:27 AM
 */
?>

<div class="page-header-inner ">
    <div class="page-logo">
        <a href="<?= Yii::$app->homeUrl ?>">
            <img src="<?= Yii::$app->homeUrl ?>resources/img/layout4/logo_q1.png" alt="logo" width="180px"
                 class="logo-default"/>  </a>

    </div>
    <div class="page-actions">
        <div class="btn-group">
            <a href="<?= Yii::$app->urlManager->createUrl('site/about') ?>" class="btn red-haze btn-sm dropdown-toggle input-circle" >
                <i class="fa fa-home"></i>
                <span class="hidden-sm hidden-xs">GIỚI THIỆU</span>

                </a>

        </div>
    </div>
    <div class="page-actions">
        <div class="btn-group">
            <a href="<?= Yii::$app->urlManager->createUrl('site') ?>" class="btn red-haze btn-sm dropdown-toggle input-circle" >
                <i class="fa fa-book"></i>
                <span class="hidden-sm hidden-xs">HƯỚNG DẪN</span>
            </a>
        </div>
    </div>
    <div class="page-actions">
        <div class="btn-group">
            <a href="<?= Yii::$app->urlManager->createUrl('user/bando') ?>" class="btn red-haze btn-sm dropdown-toggle input-circle" >
                <i class="fa fa-map-marker"></i>
                <span class="hidden-sm hidden-xs">BẢN ĐỒ</span>
            </a>
        </div>
    </div>
    <div class="page-actions">
        <div class="btn-group">
            <a href="<?= Yii::$app->urlManager->createUrl('site/contact') ?>" class="btn red-haze btn-sm dropdown-toggle input-circle" >
                <i class="fa fa-address-book"></i>
                <span class="hidden-sm hidden-xs">LIÊN HỆ</span>

            </a>

        </div>
    </div>
    <div class="page-top">
        <div class="top-menu">
            <ul class="nav navbar-nav pull-right">
                <!--                <li class="dropdown dropdown-user dropdown-dark">
                
                                </li>
                
                                <li class="dropdown dropdown-user dropdown-dark">
                                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                        <i class="icon-book-open"></i>
                                        <span class="badge badge-danger"> HƯỚNG DẪN </span>
                                    </a>
                                </li>
                
                                <li class="dropdown dropdown-user dropdown-dark">
                                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                                       data-close-others="true" >
                                        <i class="icon-credit-card"></i>
                
                                        <span class="badge badge-danger"> LIÊN HỆ </span>
                
                                         DOC: Do not remove below empty space(&nbsp;) as its purposely used 
                                    </a>
                
                                </li>-->
                <?php if (!Yii::$app->user->isGuest): ?>

                    <li class="dropdown dropdown-user dropdown-dark">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                           data-close-others="true" >
                            <img alt="" class="img-circle" src="<?= Yii::$app->homeUrl ?>resources/img/layout/avatar.png">
                            <span class="username username-hide-mobile"><?= Yii::$app->user->identity->ten_dang_nhap ?></span>

                            <!-- DOC: Do not remove below empty space(&nbsp;) as its purposely used -->
                        </a>
                        <ul class="dropdown-menu dropdown-menu-default">
                            <li>
                                <a href="<?= Yii::$app->urlManager->createUrl('auth/auth/thong-tin-ca-nhan') ?>">
                                    <i class="fa fa-user"></i> Thông tin cá nhân </a>
                            </li>
                            <li>
                                <a href="<?= Yii::$app->urlManager->createUrl('auth/auth/doi-mat-khau') ?>">
                                    <i class="fa fa-key"></i> Đổi mật khẩu </a>
                            </li>
                            <li>
                                <a href="<?= Yii::$app->urlManager->createUrl('bando/bando') ?>">
                                    <i class="fa fa-book"></i> Quản lý </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="<?= Yii::$app->urlManager->createUrl('auth/auth/dang-xuat') ?>">
                                    <i class="fa fa-sign-out"></i> Đăng xuất </a>
                            </li>
                        </ul>
                    </li>
                <?php else: ?>
                    <li class="dropdown dropdown-user dropdown-dark">
                        <a href="<?= Yii::$app->urlManager->createUrl('auth/auth/dang-nhap') ?>" class="dropdown-toggle" >
                            <span class="username username-hide-on-mobile"><i class="fa fa-user"></i>  Đăng nhập </span>

                        </a>

                    </li>



                <?php endif; ?>

                <li class="dropdown dropdown-extended quick-sidebar-toggler">
                    <i class="icon-logout"></i>
                </li>

            </ul>
        </div>

    </div>

</div>
