<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "doanh_nghiep".
 *
 * @property integer $id_doanhnghiep
 * @property string $ten_dn
 * @property integer $loaihinhdn_id
 * @property string $so_nha
 * @property string $ten_duong
 * @property string $ten_phuong
 * @property string $von_dieule
 * @property string $dien_thoai
 * @property string $nguoi_daidien
 * @property string $nganh_kd
 * @property string $ngay_cap
 * @property string $ngay_thaydoi
 * @property string $so_laodong
 * @property string $geom
 * @property string $ma_nganh
 * @property string $ghi_chu
 * @property string $ma_dn
 */
class DoanhNghiep extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'doanh_nghiep';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['loaihinhdn_id', 'linhvuc_id'], 'integer'],
            [['von_dieule'], 'match', 'pattern' => '/^([0-9.,])+$/'],
            [['ngay_thaydoi', 'ngay_sinh', 'ngaycap_giayphep'], 'safe'],
            [['geom', 'ghi_chu', 'tinhtrang_hd', 'tinhtrang_thue', 'phuong_rasoat', 'nganh_kd', 'thanh_vien', 'quanly_thue'], 'string'],
            [['ten_dn', 'nganh_kd'], 'string', 'max' => 500],
            [['so_nha', 'ten_duong', 'ten_phuong', 'dien_thoai', 'nguoi_daidien', 'so_laodong', 'ma_nganh', 'dan_toc', 'quoc_tich'], 'string', 'max' => 500],
            [['so_giayphep'], 'string', 'max' => 150],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id_doanhnghiep' => 'Id Doanhnghiep',
            'ten_dn' => 'Tên DN',
            'loaihinhdn_id' => 'Loaihinhdn ID',
            'so_nha' => 'Số nhà',
            'ten_duong' => 'Tên đường',
            'ten_phuong' => 'Phường',
            'von_dieule' => 'Vốn điều lệ',
             'dien_thoai' => 'Điện thoại',
            'nguoi_daidien' => 'Người đại diện',
            'nganh_kd' => 'Ngành nghề',
            'ngaycap_giayphep' => 'Ngày cấp giấy phép',
            'ngay_thaydoi' => 'Ngày cấp đổi',
            'so_laodong' => 'Số lao động',
            'geom' => 'Geom',
            'ma_nganh' => 'Mã ngành',
            'so_giayphep' => 'Số giấy phép',
            'tinhtrang_hd' => 'Tình trạng hoạt động',
            'tinhtrang_thue' => 'Tình trạng thuế',
            'phuong_rasoat' => 'Phường rà soát',
            'linhvuc_id' => 'Linhvuc ID',
            'gioi_tinh' => 'Giới tính',
            'ngay_sinh' => 'Ngày sinh',
            'so_cmnd' => 'CMND',
            'dan_toc' => 'Dân tộc',
            'quoc_tich' => 'Quốc tịch',
            'thanh_vien' => 'Thành viên',
            'quanly_thue' => 'ĐV quản lý thuế',
            'loaihinh_kinhte' => 'Loại hình kinh tế',
            'ten_loaihinh' => 'Ten Loaihinh',
            'ghi_chu' => 'Ghi chú',
        ];
    }

    public function beforeValidate() {
        $this->von_dieule = str_replace(",", ".", $this->von_dieule);
        return true;
    }

}
