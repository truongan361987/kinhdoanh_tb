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
class ThongkeController extends Controller
{

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
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

    public function actionTknganhnghe()
    {
//       DebugService::dumpdie(Yii::$app->basePath);
        $this->layout = "@app/views/layouts/main_chart";
        $hkd = HoKinhDoanh::find()->count();
        $tknganhnghe = TkHkdNganhnghe::find()->select('ten_loai,sl_hokinhdoanh')->asArray()->orderBy('ten_loai')->all();
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

    public function actionTkphuong()
    {
//       DebugService::dumpdie(Yii::$app->basePath);
        $this->layout = "@app/views/layouts/main_chart";
        $hkd = HoKinhDoanh::find()->count();
        $tkbennghe = TkPhuongNn::find()->select('ten_phuong,ten_loai,sl_hokinhdoanh')->where("ten_phuong='Phường An Lạc'")->asArray()->orderBy('ten_loai')->all();
        $tkbenthanh = TkPhuongNn::find()->select('ten_phuong,ten_loai,sl_hokinhdoanh')->where("ten_phuong='Phường An Lạc A'")->asArray()->orderBy('ten_loai')->all();
        $tkcaukho = TkPhuongNn::find()->select('ten_phuong,ten_loai,sl_hokinhdoanh')->where("ten_phuong='Phường Bình Hưng Hòa'")->asArray()->orderBy('ten_loai')->all();
        $tkcaulanh = TkPhuongNn::find()->select('ten_phuong,ten_loai,sl_hokinhdoanh')->where("ten_phuong='Phường Bình Hưng Hòa A'")->asArray()->orderBy('ten_loai')->all();
        $tkcogiang = TkPhuongNn::find()->select('ten_phuong,ten_loai,sl_hokinhdoanh')->where("ten_phuong='Phường Bình Hưng Hòa B'")->asArray()->orderBy('ten_loai')->all();
        $tkdakao = TkPhuongNn::find()->select('ten_phuong,ten_loai,sl_hokinhdoanh')->where("ten_phuong='Phường Bình Trị Đông'")->asArray()->orderBy('ten_loai')->all();
        $tkcutrinh = TkPhuongNn::find()->select('ten_phuong,ten_loai,sl_hokinhdoanh')->where("ten_phuong='Phường Bình Trị Đông A'")->asArray()->orderBy('ten_loai')->all();
        $tkthaibinh = TkPhuongNn::find()->select('ten_phuong,ten_loai,sl_hokinhdoanh')->where("ten_phuong='Phường Bình Trị Đông B'")->asArray()->orderBy('ten_loai')->all();
        $tkngulao = TkPhuongNn::find()->select('ten_phuong,ten_loai,sl_hokinhdoanh')->where("ten_phuong='Phường Tân Tạo'")->asArray()->orderBy('ten_loai')->all();
        $tktandinh = TkPhuongNn::find()->select('ten_phuong,ten_loai,sl_hokinhdoanh')->where("ten_phuong='Phường Tân Tạo A'")->asArray()->orderBy('ten_loai')->all();

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
        ]);
    }

}
