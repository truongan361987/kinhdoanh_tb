<div style="font-family: Tahoma" class="hokd-item" data-point-x="<?= $model["geo_x"] ?>" data-point-y="<?= $model["geo_y"] ?>">
    <div class="ten"><?= (($model['ten_hkd'] == NULL) ? '(Chưa có)' : $model['ten_hkd']) ?></div>
    <div class="loaihinh" title="<?= $model['ten_loai'] ?>">Loại hình: <?= $model['ten_loai'] ?></div>
   </div>