<?php

use kartik\date\DatePicker;
use kartik\form\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\web\JsExpression;
use yii\widgets\MaskedInput;

$urlMN = Url::to(['cuahang/get']);
?>

<ul class="page-breadcrumb breadcrumb">
    <li>
        <a href="<?= Yii::$app->homeUrl ?>">Trang chủ</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <a href="<?= Yii::$app->urlManager->createUrl('cuahang') ?>">Danh sách cửa hàng</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <span class="active">Thêm mới cửa hàng</span>
    </li>
</ul>
<?php
$form = ActiveForm::begin([
            'options' => [
                'class' => 'skin skin-square',
                'enctype' => 'multipart/form-data'
            ]
        ])
?>

<div class="row">
    <div class="col-lg-12">
        <div class="portlet light">
            <div class="portlet-title">
                <div class="caption">
                    <span class="font-blue-steel">Thêm mới cửa hàng</span>
                </div>
            </div>
            <div class="portlet-body">
                <div class="tabbable-line form-group">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#thongtinchung">Thông tin chung</a></li>

                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="thongtinchung">

                            <div class="col-sm-12">
                                <div class="col-sm-6" autofocus>
                                    <?= $form->field($model['cuahang'], 'ten_cuahang', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control']])->textInput(['maxlength' => true])->label('Tên cửa hàng') ?>
                                </div>
                                <div class="col-sm-6">
                                    <?= $form->field($model['cuahang'], 'ten_donvi')->textInput(['maxlength' => true])->label('Đơn vị chủ quản') ?>
                                </div>
                                <div class="col-sm-6">
                                    <?= $form->field($model['cuahang'], 'loaicuahang_id')->dropDownList(ArrayHelper::map($model['loaicuahang'], 'id_loaicuahang', 'ten_loai'))->label('Loại cửa hàng') ?>
                                </div>
                                <div class="col-sm-6" no-padding-side>
                                    <?=
                                    $form->field($model['cuahang'], 'ma_nganh')->widget(Select2::classname(), [
                                        'options' => ['placeholder' => 'Chọn mã ngành'],
                                        'pluginOptions' => [
                                            'allowClear' => true,
                                            'language' => [
                                                'errorLoading' => new JsExpression("function () { return 'Waiting for results...'; }"),
                                            ],
                                            'ajax' => [
                                                'url' => $urlMN,
                                                'dataType' => 'json',
                                                'data' => new JsExpression('function(params) { return {q:params.term}; }'),
                                            //'delay' => 1000,
                                            ],
                                            'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
                                            'templateSelection' => new JsExpression('function(donvi) { return donvi.text; }'),
                                            'templateResult' => new JsExpression('function(donvi) { return donvi.text; }'),
//
                                        ],
                                    ])->label('Mã ngành')
                                    ?>
                                </div>


                            </div>
                            <div class="col-sm-12">
                             <div class="col-sm-6">
                                    <?= $form->field($model['cuahang'], 'giayphep_so')->textInput(['maxlength' => true])->label('Giấy chứng nhận') ?>
                                </div>
                                <div class="col-sm-6">
                                    <?=
                                    $form->field($model['cuahang'], 'giayphep_ngay')->widget(DatePicker::classname(), [
                                        'options' => ['placeholder' => 'Ngày cấp ...'],
                                        'pluginOptions' => [
                                            'autoclose' => true,
                                            'format' => 'dd-mm-yyyy'
                                        ]
                                    ])->label('Ngày cấp');
                                    ?>                            
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="col-sm-6">
                                    <?= $form->field($model['cuahang'], 'nganh_kd')->textarea()->label('Ngành nghề kinh doanh') ?>
                                </div>
                                <div class="col-sm-6">
                                    <?=
                                    $form->field($model['cuahang'], 'dien_tich')->widget(MaskedInput::className(), [
                                        'options' => [
                                            'class' => 'form-control'
                                        ],
                                        'clientOptions' => [
                                            'alias' => 'decimal',
                                            'groupSeparator' => '.',
                                            'radixPoint' => ',',
                                            'autoGroup' => true,
                                            'removeMaskOnSubmit' => true
                                        ],
                                    ])->label('Diện tích đất sử dụng')
                                    ?>
                                </div>
                            </div>
                            <div class="col-sm-12">
                            
                                <div class="col-sm-6">
                                  <?= $form->field($model['cuahang'], 'tinhtrang_gp')->dropDownList(['Đã có' => 'Đã có', 'Chưa có' => 'Chưa có'],['prompt' => 'Chọn tình trạng'])->label('Tình trạng giấy phép') ?>
                                </div>
                                <div class="col-sm-6">
                                    <?= $form->field($model['cuahang'], 'tinhtrang_hd')->dropDownList(['Đang hoạt động' => 'Đang hoạt động', 'Tạm ngừng' => 'Tạm ngừng hoạt động'],['prompt' => 'Chọn tình trạng'])->label('Tình trạng hoạt động') ?>
                                </div>
                              
                            </div>
                             <div class="col-sm-12">
                               <div class="col-sm-6">
                                  <?= $form->field($model['cuahang'], 'kehoach_bienphap')->dropDownList(['Đã ban hành' => 'Đã ban hành', 'Chưa ban hành' => 'Chưa ban hành'],['prompt' => 'Chọn tình trạng'])->label('Kế hoạch/Biện pháp phòng ngừa ứng phó sự cố hóa chất') ?>
                                </div>
                                                         <div class="col-sm-6">
                                  <?= $form->field($model['cuahang'], 'doituong_didoi')->dropDownList(['Có' => 'Có', 'Không' => 'Không'],['prompt' => 'Chọn tình trạng'])->label('Thuộc đối tượng di dời do nguy cơ cháy nổ cao, không phù hợp quy hoạch') ?>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="col-sm-4">
                                    <?= $form->field($model['cuahang'], 'so_nha')->textInput(['maxlength' => true])->label('Số nhà') ?>
                                </div>
                                <div class="col-sm-4">
                                    <?= $form->field($model['cuahang'], 'ten_duong')->textInput(['maxlength' => true])->label('Tên đường') ?>
                                </div>
                                <div class="col-sm-4">
                                    <?= $form->field($model['cuahang'], 'ten_phuong')->dropDownList(ArrayHelper::map($model['ranhphuong'], 'tenphuong', 'tenphuong'))->label('Tên phường') ?>
                                </div>

                            </div>
                          
                            <div style="clear: both"></div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success pull-left">Thêm mới cửa hàng</button>
                    <a href="<?= Yii::$app->urlManager->createUrl('cuahang') ?>"
                       class="btn btn-default pull-right"><i class="fa fa-arrow-left"></i> Quay lại</a>
                </div>
                <div style="clear: both"></div>

            </div>
        </div>
    </div>
</div>

<?php ActiveForm::end(); ?>

<div style="clear: both"></div>
