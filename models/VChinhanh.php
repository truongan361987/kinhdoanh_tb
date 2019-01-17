<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "v_chinhanh".
 *
 * @property integer $id_chinhanh
 * @property string $ten_dn
 * @property integer $loaihinhdn_id
 * @property string $so_nha
 * @property string $ten_duong
 * @property string $ten_phuong
 * @property string $dien_thoai
 * @property string $nguoi_daidien
 * @property string $nganh_kd
 * @property string $ngay_cap
 * @property string $ngay_thaydoi
 * @property string $geom
 * @property string $ma_nganh
 * @property integer $doanhnghiep_id
 * @property string $ma_dn
 * @property string $tru_so
 * @property double $geo_x
 * @property double $geo_y
 * @property string $ten_loai
 */
class VChinhanh extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'v_chinhanh';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id_chinhanh', 'loaihinhdn_id', 'doanhnghiep_id'], 'integer'],
            [['ngay_cap', 'ngay_thaydoi'], 'safe'],
            [['geom'], 'string'],
            [['geo_x', 'geo_y'], 'number'],
            [['ten_dn', 'nganh_kd', 'tru_so'], 'string', 'max' => 300],
            [['so_nha', 'ten_duong', 'ten_phuong', 'dien_thoai', 'nguoi_daidien', 'ma_nganh'], 'string', 'max' => 100],
            [['ma_dn'], 'string', 'max' => 50],
            [['ten_loai'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id_chinhanh' => 'Id Chinhanh',
            'ten_dn' => 'Tên chi nhánh',
            'loaihinhdn_id' => 'Loaihinhdn ID',
            'so_nha' => 'Số nhà',
            'ten_duong' => 'Tên đường',
            'ten_phuong' => 'Tên Phường',
            'von_dieule' => 'Vốn điều lệ',
            'dien_thoai' => 'Điện thoại',
            'nguoi_daidien' => 'Người đại diện',
            'nganh_kd' => 'Ngành KD',
            'ngay_cap' => 'Ngày cấp',
            'ngay_thaydoi' => 'Ngày thay đổi',
            'geom' => 'Geom',
            'ma_nganh' => 'Mã ngành',
            'doanhnghiep_id' => 'Doanhnghiep ID',
            'ma_dn' => 'Mã DN',
            'tru_so' => 'Trụ sở chính',
            'geo_x' => 'Geo X',
            'geo_y' => 'Geo Y',
            'ten_loai' => 'Loại hình',
        ];
    }

    public static function primaryKey() {
        return ['id_chinhanh']; // TODO: Change the autogenerated stub
    }

}