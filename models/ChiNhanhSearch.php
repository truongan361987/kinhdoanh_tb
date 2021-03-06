<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ChiNhanh;

/**
 * ChiNhanhSearch represents the model behind the search form about `app\models\ChiNhanh`.
 */
class ChiNhanhSearch extends ChiNhanh {

    /**
     * @inheritdoc
     */
    public $tu_ngay;
    public $den_ngay;

    public function rules() {
        return [
            [['id_chinhanh', 'loaihinhdn_id', 'doanhnghiep_id'], 'integer'],
            [['tu_ngay', 'den_ngay'], 'safe'],
            [['ten_dn', 'so_nha', 'ten_duong', 'ten_phuong', 'dien_thoai', 'nguoi_daidien', 'nganh_kd', 'ngay_cap', 'ngay_thaydoi', 'geom', 'ma_nganh', 'ghi_chu', 'ma_dn'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios() {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params) {
        $query = ChiNhanh::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 30,
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id_chinhanh' => $this->id_chinhanh,
            'loaihinhdn_id' => $this->loaihinhdn_id,
            'ngay_cap' => $this->ngay_cap,
            'ngay_thaydoi' => $this->ngay_thaydoi,
            'doanhnghiep_id' => $this->doanhnghiep_id,
        ]);

        $query->andFilterWhere(['like', 'upper(ten_dn)', mb_strtoupper($this->ten_dn)])
                ->andFilterWhere(['like', 'upper(so_nha)', mb_strtoupper($this->so_nha)])
                ->andFilterWhere(['like', 'upper(ten_duong)', mb_strtoupper($this->ten_duong)])
                ->andFilterWhere(['like', 'upper(ten_phuong)', mb_strtoupper($this->ten_phuong)])
                ->andFilterWhere(['like', 'upper(dien_thoai)', mb_strtoupper($this->dien_thoai)])
                ->andFilterWhere(['like', 'upper(nguoi_daidien)', mb_strtoupper($this->nguoi_daidien)])
                ->andFilterWhere(['like', 'upper(nganh_kd)', mb_strtoupper($this->nganh_kd)])
                ->andFilterWhere(['like', 'upper(geom)', mb_strtoupper($this->geom)])
                ->andFilterWhere(['like', 'upper(ma_nganh)', mb_strtoupper($this->ma_nganh)])
                ->andFilterWhere(['like', 'upper(ghi_chu)', mb_strtoupper($this->ghi_chu)])
                ->andFilterWhere(['like', 'upper(ma_dn)', mb_strtoupper($this->ma_dn)]);
        if ($this->tu_ngay != null && $this->den_ngay != null) {
            $query->andWhere("ngay_cap between '" . date('Y-m-d', strtotime(str_replace('/', '-', $this->tu_ngay))) . "' and '" . date('Y-m-d', strtotime(str_replace('/', '-', $this->den_ngay))) . "'");
        }

        return $dataProvider;
    }

}
