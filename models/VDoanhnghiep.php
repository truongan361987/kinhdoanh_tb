<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "v_doanhnghiep".
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
 * @property string $ngaycap_giayphep
 * @property string $ngay_thaydoi
 * @property string $so_laodong
 * @property string $geom
 * @property string $ma_nganh
 * @property string $so_giayphep
 * @property string $tinhtrang_hd
 * @property string $tinhtrang_thue
 * @property string $phuong_rasoat
 * @property integer $linhvuc_id
 * @property integer $gioi_tinh
 * @property string $ngay_sinh
 * @property string $so_cmnd
 * @property string $dan_toc
 * @property string $quoc_tich
 * @property string $thanh_vien
 * @property string $quanly_thue
 * @property string $loaihinh_kinhte
 * @property string $ten_loaihinh
 * @property string $ten_loai
 * @property string $ten_linhvuc
 * @property double $geo_x
 * @property double $geo_y
 */
class VDoanhnghiep extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'v_doanhnghiep';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_doanhnghiep', 'loaihinhdn_id', 'linhvuc_id', 'gioi_tinh'], 'integer'],
            [['ten_dn', 'so_nha', 'ten_duong', 'dien_thoai', 'nguoi_daidien', 'nganh_kd', 'so_laodong', 'geom', 'ma_nganh', 'so_giayphep', 'so_cmnd', 'dan_toc', 'quoc_tich', 'thanh_vien', 'quanly_thue', 'loaihinh_kinhte', 'ten_loaihinh'], 'string'],
            [['von_dieule', 'geo_x', 'geo_y'], 'number'],
            [['ngaycap_giayphep', 'ngay_thaydoi', 'ngay_sinh'], 'safe'],
            [['ten_phuong'], 'string', 'max' => 100],
            [['tinhtrang_hd', 'tinhtrang_thue', 'phuong_rasoat'], 'string', 'max' => 300],
            [['ten_loai', 'ten_linhvuc'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
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
            'ten_loai' => 'Loại hình DN',
            'ten_linhvuc' => 'Lĩnh vực',
            'geo_x' => 'Geo X',
            'geo_y' => 'Geo Y',
        ];
    }
     public static function primaryKey() {
        return ['id_doanhnghiep']; // TODO: Change the autogenerated stub
    }
}
