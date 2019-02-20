<?php

namespace app\controllers;

use app\models\HoKinhDoanh;
use app\models\TkHkdNganhnghe;
use app\models\TkHkdPhuong;
use app\models\TkPhuongNn;
use app\services\DebugService;
use yii\filters\VerbFilter;
use yii\web\Controller;

/**
 * HochamController implements the CRUD actions for HocHam model.
 */
class ThongkeController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                    'bulk-delete' => ['post'],
                ],
            ],
        ];
    }

    public function actionTknganhnghe() {
//       DebugService::dumpdie(Yii::$app->basePath);
        $this->layout = "@app/views/layouts/main_chart";
        $hkd = HoKinhDoanh::find()->count();
        $tknganhnghe = TkHkdNganhnghe::find()->select('ten_linhvuc,sl_hokinhdoanh')->asArray()->orderBy('ten_linhvuc')->all();
        $tkphuong = TkHkdPhuong::find()->select('ten_phuong,sl_hokinhdoanh')->asArray()->orderBy('ten_phuong')->all();
        //  DebugService::dumpdie($tknganhnghe);


        return $this->render('tknganhnghe', [
                    'hkd' => $hkd,
                    // 'ptn' => $ptn,
                    'tknganhnghe' => $tknganhnghe,
                    'tkphuong' => $tkphuong,
                        //  'tkcghh' => $tkcghh,
                        //  'tkcghv' => $tkcghv,
                        //  'taikhoan' => $taikhoan,
        ]);
    }

    public function actionTkphuong() {
//       DebugService::dumpdie(Yii::$app->basePath);
        $this->layout = "@app/views/layouts/main_chart";
        $hkd = HoKinhDoanh::find()->count();
        $tkbennghe = TkPhuongNn::find()->select('ten_phuong,ten_linhvuc,sl_hokinhdoanh')->where("ten_phuong='Phường 1'")->asArray()->orderBy('ten_linhvuc')->all();
        $tkbenthanh = TkPhuongNn::find()->select('ten_phuong,ten_linhvuc,sl_hokinhdoanh')->where("ten_phuong='Phường 2'")->asArray()->orderBy('ten_linhvuc')->all();
        $tkcaukho = TkPhuongNn::find()->select('ten_phuong,ten_linhvuc,sl_hokinhdoanh')->where("ten_phuong='Phường 3'")->asArray()->orderBy('ten_linhvuc')->all();
        $tkcaulanh = TkPhuongNn::find()->select('ten_phuong,ten_linhvuc,sl_hokinhdoanh')->where("ten_phuong='Phường 4'")->asArray()->orderBy('ten_linhvuc')->all();
        $tkcogiang = TkPhuongNn::find()->select('ten_phuong,ten_linhvuc,sl_hokinhdoanh')->where("ten_phuong='Phường 5'")->asArray()->orderBy('ten_linhvuc')->all();
        $tkdakao = TkPhuongNn::find()->select('ten_phuong,ten_linhvuc,sl_hokinhdoanh')->where("ten_phuong='Phường 6'")->asArray()->orderBy('ten_linhvuc')->all();
        $tkcutrinh = TkPhuongNn::find()->select('ten_phuong,ten_linhvuc,sl_hokinhdoanh')->where("ten_phuong='Phường 16'")->asArray()->orderBy('ten_linhvuc')->all();
        $tkthaibinh = TkPhuongNn::find()->select('ten_phuong,ten_linhvuc,sl_hokinhdoanh')->where("ten_phuong='Phường 8'")->asArray()->orderBy('ten_linhvuc')->all();
        $tkngulao = TkPhuongNn::find()->select('ten_phuong,ten_linhvuc,sl_hokinhdoanh')->where("ten_phuong='Phường 9'")->asArray()->orderBy('ten_linhvuc')->all();
        $tktandinh = TkPhuongNn::find()->select('ten_phuong,ten_linhvuc,sl_hokinhdoanh')->where("ten_phuong='Phường 10'")->asArray()->orderBy('ten_linhvuc')->all();
        $tk11 = TkPhuongNn::find()->select('ten_phuong,ten_linhvuc,sl_hokinhdoanh')->where("ten_phuong='Phường 11'")->asArray()->orderBy('ten_linhvuc')->all();
        $tk12 = TkPhuongNn::find()->select('ten_phuong,ten_linhvuc,sl_hokinhdoanh')->where("ten_phuong='Phường 12'")->asArray()->orderBy('ten_linhvuc')->all();
        $tk13 = TkPhuongNn::find()->select('ten_phuong,ten_linhvuc,sl_hokinhdoanh')->where("ten_phuong='Phường 13'")->asArray()->orderBy('ten_linhvuc')->all();
        $tk14 = TkPhuongNn::find()->select('ten_phuong,ten_linhvuc,sl_hokinhdoanh')->where("ten_phuong='Phường 14'")->asArray()->orderBy('ten_linhvuc')->all();
        $tk15 = TkPhuongNn::find()->select('ten_phuong,ten_linhvuc,sl_hokinhdoanh')->where("ten_phuong='Phường 15'")->asArray()->orderBy('ten_linhvuc')->all();
        $tk17 = TkPhuongNn::find()->select('ten_phuong,ten_linhvuc,sl_hokinhdoanh')->where("ten_phuong='Phường 18'")->asArray()->orderBy('ten_linhvuc')->all();

         return $this->render('tkphuong', [
                    'hkd' => $hkd,
                    'tkbennghe' => $tkbennghe,
                    'tkbenthanh' => $tkbenthanh,
                    'tkcaukho' => $tkcaukho,
                    'tkcaulanh' => $tkcaulanh,
                    'tkcogiang' => $tkcogiang,
                    'tkdakao' => $tkdakao,
                    'tkcutrinh' => $tkcutrinh,
                    'tkthaibinh' => $tkthaibinh,
                    'tkngulao' => $tkngulao,
                    'tktandinh' => $tktandinh,
                   
                    'tk11' => $tk11,
                    'tk12' => $tk12,
                    'tk13' => $tk13,
                    'tk14' => $tk14,
                    'tk15' => $tk15,
                    'tk17' => $tk17,
        ]);
    }

}
