<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\VChuyengia */
?>

<ul class="page-breadcrumb breadcrumb">
    <li>
        <a href="<?= Yii::$app->homeUrl ?>">Trang chủ</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <a href="<?= Yii::$app->urlManager->createUrl('cuahang') ?>">Danh sách Cửa hàng</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <span class="active">Chi tiết Cửa hàng</span>
    </li>
</ul>
<?php $create = Yii::$app->session->getFlash('cuahang_create_success') ?>
<?php if (isset($create)): ?>
    <div class="portlet box green" id="notice">
        <div class="portlet-title">
            <div class="caption"><span class="fa fa-check-circle-o"></span> Thêm mới thành công!</div>
        </div>
    </div>
<?php endif; ?>
<?php $update = Yii::$app->session->getFlash('cuahang_update_success') ?>
<?php if (isset($update)): ?>
    <div class="portlet box green" id="notice">
        <div class="portlet-title">
            <div class="caption"><span class="fa fa-check-circle-o"></span> Cập nhật thành công!</div>
        </div>
    </div>
<?php endif; ?>

<div class="row">
    <div class="col-lg-12">
        <div class="portlet light">
            <div class="portlet-title">
                <div class="caption">
                    <span class="font-blue-steel">Chi tiết Cửa hàng</span>
                </div>
                <div class="caption pull-right">
                    <a class="btn btn-warning pull-right"
                       href="<?= Yii::$app->urlManager->createUrl('cuahang/update') . '?id=' . $model['cuahang']->id_cuahang ?>">Cập
                        nhật</a>
                    <a class="btn btn-info pull-right"
                       href="<?= Yii::$app->urlManager->createUrl('cuahang/create') ?>">Thêm mới</a>
                </div>
            </div>
            <div class="portlet-body">
                <div class="tabbable-line">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#thongtinchung">Thông tin chung</a></li>
                        <li><a data-toggle="tab" href="#thongtinvipham">Thông tin vi phạm</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class=" tab-pane active" id="thongtinchung">
                            <div class="col-md-7 form-group" >
                                <?=
                                DetailView::widget([
                                    'model' => $model['cuahang'],
                                    'attributes' => [
                                        'ten_cuahang',
                                        [
                                            'label' => 'Địa chỉ',
                                            'value' => (($model['cuahang']->so_nha == NULL) ? '' : $model['cuahang']->so_nha . ', ') . (($model['cuahang']->ten_duong == NULL) ? '' : $model['cuahang']->ten_duong . ', ') . (($model['cuahang']->ten_phuong == NULL) ? '' : $model['cuahang']->ten_phuong),
                                        ],
                                        'ten_loai',
                                        'ten_donvi',
                                        [
                                            'attribute' => 'giayphep_so',
                                            'value' => ($model['cuahang']->giayphep_so == null) ? '(Chưa có)' : $model['cuahang']->giayphep_so,
                                        ],
                                        [                      // the owner name of the model
                                            'attribute' => 'giayphep_ngay',
                                            'value' => ($model['cuahang']->giayphep_ngay == null) ? '(Chưa có)' : date('d-m-Y', strtotime($model['cuahang']->giayphep_ngay)),
                                        ],
                                        [
                                            'attribute' => 'dien_tich',
                                            'value' => ($model['cuahang']->dien_tich == null) ? '(Chưa có)' : $model['cuahang']->dien_tich,
                                        ],
                                        'tinhtrang_hd',
                                        [
                                            'attribute' => 'dien_tich',
                                            'value' => ($model['cuahang']->dien_tich == null) ? '(Chưa có)' : $model['cuahang']->dien_tich,
                                        ],
                                        'tinhtrang_gp',
                                        [
                                            'attribute' => 'kehoach_bienphap',
                                            'value' => ($model['cuahang']->kehoach_bienphap == null) ? '(Chưa có)' : $model['cuahang']->kehoach_bienphap,
                                        ],
                                        [
                                            'attribute' => 'doituong_didoi',
                                            'value' => ($model['cuahang']->doituong_didoi == null) ? '(Chưa có)' : $model['cuahang']->doituong_didoi,
                                        ],
                                    ],
                                ])
                                ?>
                            </div>
                            <div class="col-md-5 form-group" >
                                <div id="capnhatvitri" style=" height: 330px;"></div>
                            </div>
                            <div style="clear: both"></div>
                        </div>
                        <div class="tab-pane" id="thongtinvipham">
                            <table class="table table-bordered table-responsive">
                                <tr>
                                    <th>STT</th>
                                    <th>Số biên bản</th>
                                    <th>Ngày lập</th>
                                    <th>Đơn vị lập</th>
                                    <th>Nội dung vi phạm</th>
                                    <th>Số quyết định</th>
                                    <th>Ngày quyết định</th>
                                    <th>Đơn vị ra QĐ</th>
                                    <th>Hình phạt</th>

                                    <th></th>
                                </tr>
                                <?php if (isset($model['vipham']) && $model['vipham'] != null): ?>
                                    <?php foreach ($model['vipham'] as $i => $vipham): ?>
                                        <tr>
                                            <td><?= $i + 1 ?></td>
                                            <td><?= ($vipham['bienban_so'] != null) ? $vipham['bienban_so'] : '' ?></td>
                                            <td><?= ($vipham['ngay_lap'] != null) ? date('d-m-Y', strtotime($vipham['ngay_lap'])) : '' ?></td>
                                            <td><?= ($vipham['donvi_lap'] != null) ? $vipham['donvi_lap'] : '' ?></td>
                                            <td><?= ($vipham['noidung_vipham'] != null) ? $vipham['noidung_vipham'] : '' ?></td>
                                            <td><?= ($vipham['quyetdinh_so'] != null) ? $vipham['quyetdinh_so'] : '' ?></td>
                                            <td><?= ($vipham['quyetdinh_ngay'] != null) ? date('d-m-Y', strtotime($vipham['quyetdinh_ngay'])) : '' ?></td>
                                            <td><?= ($vipham['donvi_qd'] != null) ? $vipham['donvi_qd'] : '' ?></td>
                                            <td><?= ($vipham['hinhthuc_phat'] != null) ? $vipham['hinhthuc_phat'] : '' ?></td>

                                        <?php endforeach; ?>
                                    <?php endif ?>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>

        </div>

    </div>
    <div class="modal-footer">
        <a href="<?= Yii::$app->urlManager->createUrl('cuahang') ?>"
           class="btn btn-default pull-right"><i class="fa fa-arrow-left"></i> Quay lại</a>
    </div>
</div>
<script>
    $(document).ready(function () {
        uiEventUpdate('#capnhatvitri ');
    });
    var map;
    map = L.map('capnhatvitri').setView([<?= ($model['cuahang']->geo_y != null) ? $model['cuahang']->geo_y : 10.7756587 ?>, <?= ($model['cuahang']->geo_x != null) ? $model['cuahang']->geo_x : 106.70042379999995 ?>], 18);
    var marker = new L.marker([<?= ($model['cuahang']->geo_y != null) ? $model['cuahang']->geo_y : 10.7756587 ?>, <?= ($model['cuahang']->geo_x != null) ? $model['cuahang']->geo_x : 106.70042379999995 ?>], {
        draggable: false
    })
            .addTo(map)


    // OVERLAYS -----------------------------------------------------
    var layerOpenStreetMap = L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 22,
        maxNativeZoom: 22,
        attribution: '© OpenStreetMap contributors'
    });
    var layerHCMMap = L.tileLayer.wms('http://maps.hcmgis.vn/geoserver/ows?', {
        layers: 'hcm_map:hcm_map'
    });
    var googlelayer = L.tileLayer('http://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}', {
        maxZoom: 24,
        subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
    });
    var mapbox = L.tileLayer('https://api.mapbox.com/styles/v1/mapbox/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1Ijoic2thZGFtYmkiLCJhIjoiY2lqdndsZGg3MGNua3U1bTVmcnRqM2xvbiJ9.9I5ggqzhUVrErEQ328syYQ#3/0.00/0.00', {
        maxZoom: 18,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
        id: 'streets-v9',
        //  accessToken: 'pk.eyJ1Ijoic2thZGFtYmkiLCJhIjoiY2lqdndsZGg3MGNua3U1bTVmcnRqM2xvbiJ9.9I5ggqzhUVrErEQ328syYQ'
    });
    var baseLayers = {
        "HCMGIS": layerHCMMap,
        //  "OpenStreetMap": layerOpenStreetMap,
        "Ảnh vệ tinh": googlelayer,
        "MapBox": mapbox

    };

    L.control.layers(baseLayers).addTo(this.map);
    this.map.addLayer(mapbox, true);

</script>