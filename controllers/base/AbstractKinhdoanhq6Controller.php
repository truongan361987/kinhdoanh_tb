<?php
/**
 * Created by PhpStorm.
 * User: MinhDuc
 * Date: 7/8/2017
 * Time: 3:41 PM
 */
namespace app\controllers\base;

use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;

class AbstractKinhdoanhq6Controller extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login','index', 'about','contact','huongdan','bando','hokinhdoanh-geojson','list-hokinhdoanh','hokinhdoanh-get','hokinhdoanh-incircle','poidetail-incircle'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => [
                            'login', 'logout', 'index', 'thongtincanhan', 'map', 'changepass', 'search','bando','huongdan','about','contact',
                            ////hokinhdoanh-bando
                            'hokinhdoanh-geojson','list-hokinhdoanh','hokinhdoanh-get','hokinhdoanh-incircle','poidetail-incircle','createvipham','vipham','updatevipham','deletevipham','timkiem',
                            ///doanhnghiep-bando
                            'doanhnghiep-geojson','list-doanhnghiep','doanhnghiep-get',
                            ///cuahang-bando
                            'cuahang-geojson','list-cuahang','cuahang-get',
                            ///quanlyhkd
                            'get','viewbando',
                            'create', 'view', 'update', 'delete', 'copy', 'viewmap', 'upload', 'quanlytaikhoan', 'updatetaikhoan', 'restoretaikhoan',
                       
                        ], // add all actions to take guest to login page
//                        'controllers' => [
//                            'user'
//                        ],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
                'denyCallback' => function () {
            return Yii::$app->response->redirect(['auth/auth/dang-nhap']);
        },
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];

    }
}