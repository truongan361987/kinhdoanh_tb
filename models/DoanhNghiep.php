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
            'ten_dn' => 'Ten Dn',
            'loaihinhdn_id' => 'Loaihinhdn ID',
            'so_nha' => 'So Nha',
            'ten_duong' => 'Ten Duong',
            'ten_phuong' => 'Ten Phuong',
            'von_dieule' => 'Von Dieule',
            'dien_thoai' => 'Dien Thoai',
            'nguoi_daidien' => 'Nguoi Daidien',
            'nganh_kd' => 'Nganh Kd',
            'ngaycap_giayphep' => 'Ngaycap Giayphep',
            'ngay_thaydoi' => 'Ngay Thaydoi',
            'so_laodong' => 'So Laodong',
            'geom' => 'Geom',
            'ma_nganh' => 'Ma Nganh',
            'so_giayphep' => 'So Giayphep',
            'tinhtrang_hd' => 'Tinhtrang Hd',
            'tinhtrang_thue' => 'Tinhtrang Thue',
            'phuong_rasoat' => 'Phuong Rasoat',
            'linhvuc_id' => 'Linhvuc ID',
            'gioi_tinh' => 'Gioi Tinh',
            'ngay_sinh' => 'Ngay Sinh',
            'so_cmnd' => 'So Cmnd',
            'dan_toc' => 'Dan Toc',
            'quoc_tich' => 'Quoc Tich',
            'thanh_vien' => 'Thanh Vien',
            'quanly_thue' => 'Quanly Thue',
            'loaihinh_kinhte' => 'Loaihinh Kinhte',
            'ten_loaihinh' => 'Ten Loaihinh',
            'ghi_chu' => 'Ghi chú',
        ];
    }

    public function beforeValidate() {
        $this->von_dieule = str_replace(",", ".", $this->von_dieule);
        return true;
    }

}
