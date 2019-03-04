<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<style>
    #bennghe {
        width: 100%;
        height: 500px;
    }

    .amcharts-export-menu-top-right {
        top: 10px;
        right: 0;
    }
</style>
<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat2 bordered">
            <div class="display">
                <div class="number">
                    <h3 class="font-red-haze">
                        <span data-counter="counterup" data-value="1349"><?= $hkd ?></span>
                    </h3>
                    <small><a href="<?= Yii::$app->homeUrl ?>hokinhdoanh">Hộ kinh doanh</a></small>
                </div>
                <div class="icon">
                    <i class="fa fa-user-circle-o"></i>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="row">
    <div class="col-sm-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject bold uppercase font-dark">Theo phường</span>
                </div>
                <div class="actions">
                    <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="#"> </a>
                </div>
            </div>
            <div class="portlet-body">
                <div class="tabbable-line form-group">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#be">Phường 1</a></li>
                        <li><a data-toggle="tab" href="#bt">Phường 2</a></li>
                        <li><a data-toggle="tab" href="#ck">Phường 3</a></li>
                        <li><a data-toggle="tab" href="#ol" >Phường 4</a></li>
                        <li><a data-toggle="tab" href="#cg" >Phường 5</a></li>
                        <li><a data-toggle="tab" href="#dk" >Phường 6</a></li>

                        <li><a data-toggle="tab" href="#tb" >Phường 8</a></li>
                        <li><a data-toggle="tab" href="#nl" >Phường 9</a></li>
                        <li><a data-toggle="tab" href="#td" >Phường 10</a></li>
                     
                        <li><a data-toggle="tab" href="#12" >Phường 12</a></li>
                        <li><a data-toggle="tab" href="#13" >Phường 13</a></li>
                        <li><a data-toggle="tab" href="#14" >Phường 14</a></li>
                        <li><a data-toggle="tab" href="#15" >Phường 15</a></li>
                        <li><a data-toggle="tab" href="#ct" >Phường 16</a></li>
                        <li><a data-toggle="tab" href="#17" >Phường 18</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="be">
                            <div id="bennghe" class="" style="height: 500px;width: 100%"></div>
                        </div>
                        <div class="tab-pane " id="bt">
                            <div id="benthanh" class="" style="height: 500px;width: 100%"></div>
                        </div>
                        <div class="tab-pane " id="ck">
                            <div id="caukho" class="" style="height: 500px;width: 100%"></div>
                        </div>
                        <div class="tab-pane " id="ol">
                            <div id="caulanh" class="" style="height: 500px;width: 100%"></div>
                        </div>
                        <div class="tab-pane " id="cg">
                            <div id="cogiang" class="" style="height: 500px;width: 100%"></div>
                        </div>
                        <div class="tab-pane " id="dk">
                            <div id="dakao" class="" style="height: 500px;width: 100%"></div>
                        </div>
                        <div class="tab-pane " id="ct">
                            <div id="cutrinh" class="" style="height: 500px;width: 100%"></div>
                        </div>
                        <div class="tab-pane " id="tb">
                            <div id="thaibinh" class="" style="height: 500px;width: 100%"></div>
                        </div>
                        <div class="tab-pane " id="nl">
                            <div id="ngulao" class="" style="height: 500px;width: 100%"></div>
                        </div>
                        <div class="tab-pane " id="td">
                            <div id="tandinh" class="" style="height: 500px;width: 100%"></div>
                        </div>
                     
                        <div class="tab-pane " id="12">
                            <div id="12" class="" style="height: 500px;width: 100%"></div>
                        </div>
                        <div class="tab-pane " id="13">
                            <div id="13" class="" style="height: 500px;width: 100%"></div>
                        </div>
                        <div class="tab-pane " id="14">
                            <div id="14" class="" style="height: 500px;width: 100%"></div>
                        </div>
                        <div class="tab-pane " id="15">
                            <div id="15" class="" style="height: 500px;width: 100%"></div>
                        </div>
                        <div class="tab-pane " id="17">
                            <div id="17" class="" style="height: 500px;width: 100%"></div>
                        </div>
                    </div>                

                </div>
            </div>
        </div>

    </div>
</div>
<!-- END PAGE BASE CONTENT -->
<script>
    var chart = AmCharts.makeChart("bennghe", {
        "type": "pie",
        "theme": "light",
        "legend": {
            "position": "right",
            "marginRight": 100,
            "autoMargins": false
        },
        "innerRadius": "0%",
        "defs": {
            "filter": [{
                    "id": "shadow",
                    "width": "200%",
                    "height": "200%",
                    "feOffset": {
                        "result": "offOut",
                        "in": "SourceAlpha",
                        "dx": 0,
                        "dy": 0
                    },
                    "feGaussianBlur": {
                        "result": "blurOut",
                        "in": "offOut",
                        "stdDeviation": 5
                    },
                    "feBlend": {
                        "in": "SourceGraphic",
                        "in2": "blurOut",
                        "mode": "normal"
                    }
                }]
        },
        "labelsEnabled": false,
        "dataProvider": <?= json_encode($tkbennghe, JSON_UNESCAPED_UNICODE) ?>,
        "valueField": "sl_hokinhdoanh",
        "titleField": "ten_linhvuc",
        "balloon": {
            "fixedPosition": true
        },
        "export": {
            "enabled": true
        }
    });
    var chart = AmCharts.makeChart("benthanh", {
        "type": "pie",
        "theme": "light",
        "legend": {
            "position": "right",
            "marginRight": 100,
            "autoMargins": false
        },
        "innerRadius": "0%",
        "defs": {
            "filter": [{
                    "id": "shadow",
                    "width": "200%",
                    "height": "200%",
                    "feOffset": {
                        "result": "offOut",
                        "in": "SourceAlpha",
                        "dx": 0,
                        "dy": 0
                    },
                    "feGaussianBlur": {
                        "result": "blurOut",
                        "in": "offOut",
                        "stdDeviation": 5
                    },
                    "feBlend": {
                        "in": "SourceGraphic",
                        "in2": "blurOut",
                        "mode": "normal"
                    }
                }]
        },
        "labelsEnabled": false,
        "dataProvider": <?= json_encode($tkbenthanh, JSON_UNESCAPED_UNICODE) ?>,
        "valueField": "sl_hokinhdoanh",
        "titleField": "ten_linhvuc",
        "balloon": {
            "fixedPosition": true
        },
        "export": {
            "enabled": true
        }
    });
    var chart = AmCharts.makeChart("caukho", {
        "type": "pie",
        "theme": "light",
        "legend": {
            "position": "right",
            "marginRight": 100,
            "autoMargins": false
        },
        "innerRadius": "0%",
        "defs": {
            "filter": [{
                    "id": "shadow",
                    "width": "200%",
                    "height": "200%",
                    "feOffset": {
                        "result": "offOut",
                        "in": "SourceAlpha",
                        "dx": 0,
                        "dy": 0
                    },
                    "feGaussianBlur": {
                        "result": "blurOut",
                        "in": "offOut",
                        "stdDeviation": 5
                    },
                    "feBlend": {
                        "in": "SourceGraphic",
                        "in2": "blurOut",
                        "mode": "normal"
                    }
                }]
        },
        "labelsEnabled": false,
        "dataProvider": <?= json_encode($tkcaukho, JSON_UNESCAPED_UNICODE) ?>,
        "valueField": "sl_hokinhdoanh",
        "titleField": "ten_linhvuc",
        "balloon": {
            "fixedPosition": true
        },
        "export": {
            "enabled": true
        }
    });
    var chart = AmCharts.makeChart("caulanh", {
        "type": "pie",
        "theme": "light",
        "legend": {
            "position": "right",
            "marginRight": 100,
            "autoMargins": false
        },
        "innerRadius": "0%",
        "defs": {
            "filter": [{
                    "id": "shadow",
                    "width": "200%",
                    "height": "200%",
                    "feOffset": {
                        "result": "offOut",
                        "in": "SourceAlpha",
                        "dx": 0,
                        "dy": 0
                    },
                    "feGaussianBlur": {
                        "result": "blurOut",
                        "in": "offOut",
                        "stdDeviation": 5
                    },
                    "feBlend": {
                        "in": "SourceGraphic",
                        "in2": "blurOut",
                        "mode": "normal"
                    }
                }]
        },
        "labelsEnabled": false,
        "dataProvider": <?= json_encode($tkcaulanh, JSON_UNESCAPED_UNICODE) ?>,
        "valueField": "sl_hokinhdoanh",
        "titleField": "ten_linhvuc",
        "balloon": {
            "fixedPosition": true
        },
        "export": {
            "enabled": true
        }
    });
    var chart = AmCharts.makeChart("cogiang", {
        "type": "pie",
        "theme": "light",
        "legend": {
            "position": "right",
            "marginRight": 100,
            "autoMargins": false
        },
        "innerRadius": "0%",
        "defs": {
            "filter": [{
                    "id": "shadow",
                    "width": "200%",
                    "height": "200%",
                    "feOffset": {
                        "result": "offOut",
                        "in": "SourceAlpha",
                        "dx": 0,
                        "dy": 0
                    },
                    "feGaussianBlur": {
                        "result": "blurOut",
                        "in": "offOut",
                        "stdDeviation": 5
                    },
                    "feBlend": {
                        "in": "SourceGraphic",
                        "in2": "blurOut",
                        "mode": "normal"
                    }
                }]
        },
        "labelsEnabled": false,
        "dataProvider": <?= json_encode($tkcogiang, JSON_UNESCAPED_UNICODE) ?>,
        "valueField": "sl_hokinhdoanh",
        "titleField": "ten_linhvuc",
        "balloon": {
            "fixedPosition": true
        },
        "export": {
            "enabled": true
        }
    });
    var chart = AmCharts.makeChart("dakao", {
        "type": "pie",
        "theme": "light",
        "legend": {
            "position": "right",
            "marginRight": 100,
            "autoMargins": false
        },
        "innerRadius": "0%",
        "defs": {
            "filter": [{
                    "id": "shadow",
                    "width": "200%",
                    "height": "200%",
                    "feOffset": {
                        "result": "offOut",
                        "in": "SourceAlpha",
                        "dx": 0,
                        "dy": 0
                    },
                    "feGaussianBlur": {
                        "result": "blurOut",
                        "in": "offOut",
                        "stdDeviation": 5
                    },
                    "feBlend": {
                        "in": "SourceGraphic",
                        "in2": "blurOut",
                        "mode": "normal"
                    }
                }]
        },
        "labelsEnabled": false,
        "dataProvider": <?= json_encode($tkdakao, JSON_UNESCAPED_UNICODE) ?>,
        "valueField": "sl_hokinhdoanh",
        "titleField": "ten_linhvuc",
        "balloon": {
            "fixedPosition": true
        },
        "export": {
            "enabled": true
        }
    });
    var chart = AmCharts.makeChart("cutrinh", {
        "type": "pie",
        "theme": "light",
        "legend": {
            "position": "right",
            "marginRight": 100,
            "autoMargins": false
        },
        "innerRadius": "0%",
        "defs": {
            "filter": [{
                    "id": "shadow",
                    "width": "200%",
                    "height": "200%",
                    "feOffset": {
                        "result": "offOut",
                        "in": "SourceAlpha",
                        "dx": 0,
                        "dy": 0
                    },
                    "feGaussianBlur": {
                        "result": "blurOut",
                        "in": "offOut",
                        "stdDeviation": 5
                    },
                    "feBlend": {
                        "in": "SourceGraphic",
                        "in2": "blurOut",
                        "mode": "normal"
                    }
                }]
        },
        "labelsEnabled": false,
        "dataProvider": <?= json_encode($tkcutrinh, JSON_UNESCAPED_UNICODE) ?>,
        "valueField": "sl_hokinhdoanh",
        "titleField": "ten_linhvuc",
        "balloon": {
            "fixedPosition": true
        },
        "export": {
            "enabled": true
        }
    });
    var chart = AmCharts.makeChart("thaibinh", {
        "type": "pie",
        "theme": "light",
        "legend": {
            "position": "right",
            "marginRight": 100,
            "autoMargins": false
        },
        "innerRadius": "0%",
        "defs": {
            "filter": [{
                    "id": "shadow",
                    "width": "200%",
                    "height": "200%",
                    "feOffset": {
                        "result": "offOut",
                        "in": "SourceAlpha",
                        "dx": 0,
                        "dy": 0
                    },
                    "feGaussianBlur": {
                        "result": "blurOut",
                        "in": "offOut",
                        "stdDeviation": 5
                    },
                    "feBlend": {
                        "in": "SourceGraphic",
                        "in2": "blurOut",
                        "mode": "normal"
                    }
                }]
        },
        "labelsEnabled": false,
        "dataProvider": <?= json_encode($tkthaibinh, JSON_UNESCAPED_UNICODE) ?>,
        "valueField": "sl_hokinhdoanh",
        "titleField": "ten_linhvuc",
        "balloon": {
            "fixedPosition": true
        },
        "export": {
            "enabled": true
        }
    });
    var chart = AmCharts.makeChart("ngulao", {
        "type": "pie",
        "theme": "light",
        "legend": {
            "position": "right",
            "marginRight": 100,
            "autoMargins": false
        },
        "innerRadius": "0%",
        "defs": {
            "filter": [{
                    "id": "shadow",
                    "width": "200%",
                    "height": "200%",
                    "feOffset": {
                        "result": "offOut",
                        "in": "SourceAlpha",
                        "dx": 0,
                        "dy": 0
                    },
                    "feGaussianBlur": {
                        "result": "blurOut",
                        "in": "offOut",
                        "stdDeviation": 5
                    },
                    "feBlend": {
                        "in": "SourceGraphic",
                        "in2": "blurOut",
                        "mode": "normal"
                    }
                }]
        },
        "labelsEnabled": false,
        "dataProvider": <?= json_encode($tkngulao, JSON_UNESCAPED_UNICODE) ?>,
        "valueField": "sl_hokinhdoanh",
        "titleField": "ten_linhvuc",
        "balloon": {
            "fixedPosition": true
        },
        "export": {
            "enabled": true
        }
    });
    var chart = AmCharts.makeChart("tandinh", {
        "type": "pie",
        "theme": "light",
        "legend": {
            "position": "right",
            "marginRight": 100,
            "autoMargins": false
        },
        "innerRadius": "0%",
        "defs": {
            "filter": [{
                    "id": "shadow",
                    "width": "200%",
                    "height": "200%",
                    "feOffset": {
                        "result": "offOut",
                        "in": "SourceAlpha",
                        "dx": 0,
                        "dy": 0
                    },
                    "feGaussianBlur": {
                        "result": "blurOut",
                        "in": "offOut",
                        "stdDeviation": 5
                    },
                    "feBlend": {
                        "in": "SourceGraphic",
                        "in2": "blurOut",
                        "mode": "normal"
                    }
                }]
        },
        "labelsEnabled": false,
        "dataProvider": <?= json_encode($tktandinh, JSON_UNESCAPED_UNICODE) ?>,
        "valueField": "sl_hokinhdoanh",
        "titleField": "ten_linhvuc",
        "balloon": {
            "fixedPosition": true
        },
        "export": {
            "enabled": true
        }
    });
  
    var chart = AmCharts.makeChart("12", {
        "type": "pie",
        "theme": "light",
        "legend": {
            "position": "right",
            "marginRight": 100,
            "autoMargins": false
        },
        "innerRadius": "0%",
        "defs": {
            "filter": [{
                    "id": "shadow",
                    "width": "200%",
                    "height": "200%",
                    "feOffset": {
                        "result": "offOut",
                        "in": "SourceAlpha",
                        "dx": 0,
                        "dy": 0
                    },
                    "feGaussianBlur": {
                        "result": "blurOut",
                        "in": "offOut",
                        "stdDeviation": 5
                    },
                    "feBlend": {
                        "in": "SourceGraphic",
                        "in2": "blurOut",
                        "mode": "normal"
                    }
                }]
        },
        "labelsEnabled": false,
        "dataProvider": <?= json_encode($tk12, JSON_UNESCAPED_UNICODE) ?>,
        "valueField": "sl_hokinhdoanh",
        "titleField": "ten_linhvuc",
        "balloon": {
            "fixedPosition": true
        },
        "export": {
            "enabled": true
        }
    });
    var chart = AmCharts.makeChart("13", {
        "type": "pie",
        "theme": "light",
        "legend": {
            "position": "right",
            "marginRight": 100,
            "autoMargins": false
        },
        "innerRadius": "0%",
        "defs": {
            "filter": [{
                    "id": "shadow",
                    "width": "200%",
                    "height": "200%",
                    "feOffset": {
                        "result": "offOut",
                        "in": "SourceAlpha",
                        "dx": 0,
                        "dy": 0
                    },
                    "feGaussianBlur": {
                        "result": "blurOut",
                        "in": "offOut",
                        "stdDeviation": 5
                    },
                    "feBlend": {
                        "in": "SourceGraphic",
                        "in2": "blurOut",
                        "mode": "normal"
                    }
                }]
        },
        "labelsEnabled": false,
        "dataProvider": <?= json_encode($tk13, JSON_UNESCAPED_UNICODE) ?>,
        "valueField": "sl_hokinhdoanh",
        "titleField": "ten_linhvuc",
        "balloon": {
            "fixedPosition": true
        },
        "export": {
            "enabled": true
        }
    });
    var chart = AmCharts.makeChart("14", {
        "type": "pie",
        "theme": "light",
        "legend": {
            "position": "right",
            "marginRight": 100,
            "autoMargins": false
        },
        "innerRadius": "0%",
        "defs": {
            "filter": [{
                    "id": "shadow",
                    "width": "200%",
                    "height": "200%",
                    "feOffset": {
                        "result": "offOut",
                        "in": "SourceAlpha",
                        "dx": 0,
                        "dy": 0
                    },
                    "feGaussianBlur": {
                        "result": "blurOut",
                        "in": "offOut",
                        "stdDeviation": 5
                    },
                    "feBlend": {
                        "in": "SourceGraphic",
                        "in2": "blurOut",
                        "mode": "normal"
                    }
                }]
        },
        "labelsEnabled": false,
        "dataProvider": <?= json_encode($tk14, JSON_UNESCAPED_UNICODE) ?>,
        "valueField": "sl_hokinhdoanh",
        "titleField": "ten_linhvuc",
        "balloon": {
            "fixedPosition": true
        },
        "export": {
            "enabled": true
        }
    });
    var chart = AmCharts.makeChart("15", {
        "type": "pie",
        "theme": "light",
        "legend": {
            "position": "right",
            "marginRight": 100,
            "autoMargins": false
        },
        "innerRadius": "0%",
        "defs": {
            "filter": [{
                    "id": "shadow",
                    "width": "200%",
                    "height": "200%",
                    "feOffset": {
                        "result": "offOut",
                        "in": "SourceAlpha",
                        "dx": 0,
                        "dy": 0
                    },
                    "feGaussianBlur": {
                        "result": "blurOut",
                        "in": "offOut",
                        "stdDeviation": 5
                    },
                    "feBlend": {
                        "in": "SourceGraphic",
                        "in2": "blurOut",
                        "mode": "normal"
                    }
                }]
        },
        "labelsEnabled": false,
        "dataProvider": <?= json_encode($tk15, JSON_UNESCAPED_UNICODE) ?>,
        "valueField": "sl_hokinhdoanh",
        "titleField": "ten_linhvuc",
        "balloon": {
            "fixedPosition": true
        },
        "export": {
            "enabled": true
        }
    });
    var chart = AmCharts.makeChart("17", {
        "type": "pie",
        "theme": "light",
        "legend": {
            "position": "right",
            "marginRight": 100,
            "autoMargins": false
        },
        "innerRadius": "0%",
        "defs": {
            "filter": [{
                    "id": "shadow",
                    "width": "200%",
                    "height": "200%",
                    "feOffset": {
                        "result": "offOut",
                        "in": "SourceAlpha",
                        "dx": 0,
                        "dy": 0
                    },
                    "feGaussianBlur": {
                        "result": "blurOut",
                        "in": "offOut",
                        "stdDeviation": 5
                    },
                    "feBlend": {
                        "in": "SourceGraphic",
                        "in2": "blurOut",
                        "mode": "normal"
                    }
                }]
        },
        "labelsEnabled": false,
        "dataProvider": <?= json_encode($tk17, JSON_UNESCAPED_UNICODE) ?>,
        "valueField": "sl_hokinhdoanh",
        "titleField": "ten_linhvuc",
        "balloon": {
            "fixedPosition": true
        },
        "export": {
            "enabled": true
        }
    });
</script>