<div class="row margin-bottom-40 about-header">
    <div class="col-md-12">
        <h1>UỶ BAN NHÂN DÂN QUẬN 4</h1>
        <h2>TRA CỨU VỊ TRÍ ĐĂNG KÝ KINH DOANH</h2>
        <a href="<?= Yii::$app->urlManager->createUrl('user/bando') ?>" class="btn red-haze btn-sm dropdown-toggle input-circle" >
            <h4>   <i class="icon icon-layers"></i>
                <span class="hidden-sm hidden-xs">BẢN ĐỒ</span></h4>
        </a>
    </div>
</div>
<div class="row margin-bottom-20">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="dashboard-stat2 bordered">
            <div class="display">
                <div class="number">
                    <h3 class="font-red-haze">
                        <span><?= $hkd ?></span>
                    </h3>
                    <small>Hộ kinh doanh</small>
                </div>
                <div class="icon">
                    <i class="fa fa-user-circle-o"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="dashboard-stat2 bordered">
            <div class="display">
                <div class="number">
                    <h3 class="font-red-haze">
                        <span><?= $dn ?></span>
                    </h3>
                    <small>Doanh nghiệp</small>
                </div>
                <div class="icon">
                    <i class="fa fa-building"></i>
                </div>
            </div>
        </div>
    </div>
</div>