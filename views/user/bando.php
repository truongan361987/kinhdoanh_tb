<?php ?>

<style>
    #map {
        width: 100%;
        height: 100%;
        min-height: 650px;
    }

    .height100 {
        height: 100%;
    }

    .no-padding {
        padding: 0px !important;
    }

    #geocomplete-wrapper {

        width: 500px;
    }
    #geocomplete { background-color: rgba(255,255,255,0.8); }

</style>

<div class="row">
    <!--<div class="portlet light">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="icon-paper-plane font-yellow-casablanca"></i>
                                            <span class="caption-subject bold font-yellow-casablanca uppercase"> Bản đồ </span>
                             
                                        </div>
                                        <div class="inputs">
                                            <div class="portlet-input input-inline input-medium">
                                                <div class="input-group"  id="geocomplete-wrapper">
                                                    <input type="text" id='geocomplete' class="form-control input-circle-left" placeholder="Nhập vị trí cần tìm...">
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                         <div id="map" class="gmaps"> </div>
                                    </div>
                                </div>-->
    <div class="col-md-12 ">
        <!-- BEGIN GEOCODING PORTLET-->
        <div class="portlet light ">
            <div class="portlet-title">
                <div class="caption">
                    <i class=" icon-layers font-green"></i>
                    <span class="caption-subject font-green bold uppercase">Bản đồ</span>
                   
                </div>
                <div class="actions">
                    <div class="input-group" id="geocomplete-wrapper">
                        <div class="input-icon right">
                            <i class="icon-magnifier"></i>
                            <input type="text" id='geocomplete' class="form-control input-circle" placeholder="Nhập vị trí cần tìm..."></div>
                    </div>
                </div>
            </div>
            <div class="portlet-body">
                <div id="map" class="gmaps"> </div>
            </div>
        </div>
        <!-- END GEOCODING PORTLET-->
    </div>
    
</div>
<!--<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="dashboard-stat2 bordered">
            <div class="display">
                <div class="number">
                    <h3 class="font-green-sharp">
                        <span data-counter="counterup" data-value="7800">7800</span>
                        <small class="font-green-sharp">$</small>

                    </h3>
                    <div id="geocomplete-wrapper">
                        <input class='form-control' id='geocomplete' placeholder="Nhập vào địa chỉ cần tìm">
                    </div>
                </div>
                <div class="icon">
                    <i class="icon-pie-chart"></i>
                </div>
            </div>
            <div class="progress-info">

                <div id="map"></div>
            </div>
        </div>
    </div>



</div>-->

<script>
    var defined = {
        layer_hokindoanh: "Hộ kinh doanh",
    };
    var DATA = {
        HomeUrl: "../",
        MapConfig: {
            mapId: "map",
            defaultCenter: [10.759610, 106.704339],
            defaultZoom: 15,
            defaultConfig: {maxZoom: 22},
            baseLayers: ["Bản đồ Google", "HCMGIS", "Ảnh vệ tinh", "MapBox"],
            overLayers: ["RanhThua", "Cơ quan nhà nước", "Cơ sở giáo dục", "Cơ sở y tế", "Cơ sở tôn giáo", "Chợ", "Di tích lịch sử", "Trụ sở công an"],
            activeLayers: ["Bản đồ Google"],
            initOthers: [initHokinhdoanhGeojsonLayer, initDrawControl, initFocusCircleLayer, initMapZoomEvent, initMeasureControl],
            control: {
                geocomplete: {
                    InputId: "#geocomplete",
                    config: {
                        country: "vn"
                    }
                }
            }
        },
        MapLayer: {
            baselayer: {},
            overlayers: {},
        },
        MapControl: {},
        Refs: {
            Markers: [],
            LeafletLayers: {
                "HCMGIS": L.tileLayer.wms('http://pcd.hcmgis.vn/geoserver/ows?', {
                    layers: 'hcm_map:hcm_map'
                }),
                "Ảnh vệ tinh": L.tileLayer('http://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}', {
                    maxZoom: 24,
                    subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
                }),
                "MapBox": L.tileLayer('https://api.mapbox.com/styles/v1/mapbox/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1Ijoic2thZGFtYmkiLCJhIjoiY2lqdndsZGg3MGNua3U1bTVmcnRqM2xvbiJ9.9I5ggqzhUVrErEQ328syYQ#3/0.00/0.00', {
                    maxZoom: 18,
                    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
                    id: 'streets-v9',
                }),
                "RanhThua": L.tileLayer.wms('http://kinhdoanhq4.hcmgis.vn/geo113/dbkinhdoanh_q4/wms?', {
                    layers: 'dbkinhdoanh_q4:ranh_thua',
                    transparent: true,
                    format: 'image/png8',
                    maxZoom: 24,
                    minZoom: 18,
                }),
                "Cơ sở giáo dục": L.tileLayer.wms('http://kinhdoanhq4.hcmgis.vn/geo113/dbkinhdoanh_q4/wms?', {
                    layers: 'dbkinhdoanh_q4:poi_coso_giaoduc',
                    transparent: true,
                    format: 'image/png8',
                    maxZoom: 24,
                }),
                "Cơ sở y tế": L.tileLayer.wms('http://kinhdoanhq4.hcmgis.vn/geo113/dbkinhdoanh_q4/wms?', {
                    layers: 'dbkinhdoanh_q4:poi_coso_yte',
                    transparent: true,
                    format: 'image/png8',
                    maxZoom: 24,
                }),
                "Cơ sở tôn giáo": L.tileLayer.wms('http://kinhdoanhq4.hcmgis.vn/geo113/dbkinhdoanh_q4/wms?', {
                    layers: 'dbkinhdoanh_q4:poi_coso_tongiao',
                    transparent: true,
                    format: 'image/png8',
                    maxZoom: 24,
                }),
                "Cơ quan nhà nước": L.tileLayer.wms('http://kinhdoanhq4.hcmgis.vn/geo113/dbkinhdoanh_q4/wms?', {
                    layers: 'dbkinhdoanh_q4:poi_ubnd',
                    transparent: true,
                    format: 'image/png8',
                    maxZoom: 24,
                }),
                "Chợ": L.tileLayer.wms('http://kinhdoanhq4.hcmgis.vn/geo113/dbkinhdoanh_q4/wms?', {
                    layers: 'dbkinhdoanh_q4:poi_cho',
                    transparent: true,
                    format: 'image/png8',
                    maxZoom: 24,
                }),
                "Trụ sở công an": L.tileLayer.wms('http://kinhdoanhq4.hcmgis.vn/geo113/dbkinhdoanh_q4/wms?', {
                    layers: 'dbkinhdoanh_q4:poi_congan',
                    transparent: true,
                    format: 'image/png8',
                    maxZoom: 24,
                }),
                "Di tích lịch sử": L.tileLayer.wms('http://kinhdoanhq4.hcmgis.vn/geo113/dbkinhdoanh_q4/wms?', {
                    layers: 'dbkinhdoanh_q4:poi_ditich',
                    transparent: true,
                    format: 'image/png8',
                    maxZoom: 24,
                }),
                "Bản đồ Google": L.tileLayer('http://{s}.google.com/vt/lyrs=' + 'r' + '&x={x}&y={y}&z={z}', {
                    maxZoom: 24,
                    subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
                }),
            }
        }
    };
    $(document).ready(function () {
        initMap();
        initListHokinhdoanh();


    })

    function initMap(config) {
        if (typeof (config) == 'undefined') {
            config = DATA.MapConfig;
        }

        DATA[config.mapId] = {};
        DATA[config.mapId].Map = new L.Map(config.mapId, config.defaultConfig);
        DATA[config.mapId].Map.setView(config.defaultCenter, config.defaultZoom);
        DATA[config.mapId].Map.on('click', function (e) {
            console.log(e);
        });
        DATA[config.mapId].MapControl = {};
        DATA[config.mapId].MapLayer = {baseLayers: {}, overLayers: {}};

        initMapLayer(config);
        initMapControl(config);
        initOther(config);
    }

    function initOther(config) {
        config = DATA.MapConfig;
        config.initOthers.map(function (func) {
            func(config)
        });
    }

    function initMapControl(config) {
        initControlMapLayer(config);
        initControlGeocomplete(config);
    }

    function initMapLayer(config) {
        config.baseLayers.map(function (layer) {
            DATA[config.mapId].MapLayer.baseLayers[layer] = DATA.Refs.LeafletLayers[layer];
        });
        config.overLayers.map(function (layer) {
            DATA[config.mapId].MapLayer.overLayers[layer] = DATA.Refs.LeafletLayers[layer];
        });
        config.activeLayers.map(function (layer) {
            DATA.Refs.LeafletLayers[layer].addTo(DATA[config.mapId].Map);
        });
    }

    function initControlMapLayer(config) {
        DATA[config.mapId].MapControl.layercontrol = L.control.layers(DATA[config.mapId].MapLayer.baseLayers, DATA[config.mapId].MapLayer.overLayers);
        DATA[config.mapId].MapControl.layercontrol.addTo(DATA[config.mapId].Map);
    }

    function initControlGeocomplete(config) {
        if (typeof (config.control.geocomplete) == 'undefined')
            return;
        var group = L.featureGroup().addTo(DATA[config.mapId].Map);
        var cir;


        $(config.control.geocomplete.InputId)
                .geocomplete(config.control.geocomplete.config)
                .bind("geocode:result", function (event, result) {
                    DATA[config.mapId].Map.panTo([result.geometry.location.lat(), result.geometry.location.lng()]);
                    var marker = L.marker([result.geometry.location.lat(), result.geometry.location.lng()]);
                    var divIcon = L.divIcon({
                        iconSize: [40, 48],
                        iconAnchor: [20, 48],
                        popupAnchor: [0, -48],
                        html: '<div style="background: white;width: 40px;height: 40px;border-radius: 100%;font-size: 26px;"><img src="' + DATA.HomeUrl + '/resources/img/home.png"></div>'
                    });
                    marker.setIcon(divIcon);
//
//                    group.clearLayers();
//                    cir = L.circle(
//                            [result.geometry.location.lat(), result.geometry.location.lng()], 200, {
//                        color: "blue"
//                    }
//                    );
//                    group.addLayer(cir);
                    DATA[config.mapId].Map.addLayer(marker);
//                    DATA[config.mapId].Map.setZoom(18);
//                    callHokinhdoanhInCircle(result.geometry.location.lat(), result.geometry.location.lng(), 200)

                });
    }

    function initHokinhdoanhGeojsonLayer(config) {
        $.ajax({
            url: DATA.HomeUrl + 'user/hokinhdoanh-geojson',
            dataType: 'json',
            success: function (data) {
                var pruneCluster = new PruneClusterForLeaflet();
                data.map(function (item) {
                    var prunemarker = new PruneCluster.Marker(item.geo_y, item.geo_x, {title: "title"});
                    prunemarker.data = item;
                    pruneCluster.RegisterMarker(prunemarker);
                });
                DATA.Refs.LeafletLayers[defined.layer_hokindoanh] = pruneCluster;
                DATA[config.mapId].Map.addLayer(pruneCluster);
                DATA[config.mapId].MapControl.layercontrol.addOverlay(pruneCluster, defined.layer_hokindoanh);
                pruneCluster.PrepareLeafletMarker = function (leafletMarker, data) {
                    var popupid = 'marker-popup-' + data.id;
                    leafletMarker.bindPopup('<div id="' + popupid + '"></div>');
                    leafletMarker.on('mouseover', function (e) {
                        var popupid = 'marker-popup-' + data.id;
                        //   mapZoomAndPanTo(data.geo_y, data.geo_x);
                        $.ajax({
                            url: DATA.HomeUrl + 'user/hokinhdoanh-get/?slug=' + data.id,
                            success: function (html) {
                                $('#' + popupid).empty().append(html);
                            }
                        })
                        this.openPopup();
                    });
                    leafletMarker.on('mouseout', function (e) {
                        this.closePopup();
                    });
                    leafletMarker.on('click', function () {
                        var popupid = 'marker-popup-' + data.id;
                        //  mapZoomAndPanTo(data.geo_y, data.geo_x);
                        $.ajax({
                            url: DATA.HomeUrl + 'user/hokinhdoanh-get/?slug=' + data.id,
                            success: function (html) {
                                $('#' + popupid).empty().append(html);
                            }
                        })
                    });

                    var divIcon = L.divIcon({
                        iconSize: [40, 48],
                        iconAnchor: [20, 48],
                        popupAnchor: [0, -48],
                        html: '<div style="background: white;width: 40px;height: 40px;border-radius: 100%;font-size: 26px;"><img src="' + DATA.HomeUrl + '/resources/img/warehouse.png"></div>'
                    });
                    leafletMarker.setIcon(divIcon);
                    DATA.Refs.Markers[data.id] = leafletMarker;
                }
            }
        });
    }

    function convertDataToHokihdoanhGeojson(list) {
        var geojson = [];
        list.map(function (item) {
            geojson.push({
                type: 'Feature',
                geometry: {
                    type: 'Point',
                    coordinates: [item.geo_y, item.geo_x]
                },
                properties: {
                    id: item.id,
                    id_nn: item.id_nn
                }
            });
        });
        return geojson;
    }


    function initListHokinhdoanh() {
        loadAjaxToDivListHokinhdoanh(DATA.HomeUrl + '/user/list-hokinhdoanh');
        initSearchHokd();
    }

    function initPagAjaxDivListHokinhdoanh() {
        $('.pagination li a').on('click', function (e) {
            e.preventDefault();
            var _this = $(this);
            var url = _this.attr('href');
            loadAjaxToDivListHokinhdoanh(url);
            return false;
        });
    }


    function initHokdClickEvent() {
        $('.hokd-item').on('click', function () {
            var _this = $(this);
            var x = _this.attr('data-point-x');
            var y = _this.attr('data-point-y');
            if (typeof (x) != 'undefined')
                mapZoomAndPanTo(y, x, 20);
        });
    }
 
    function initDrawControl(config) {
        DATA.MapLayer.drawlayer = new L.FeatureGroup();
        DATA[config.mapId].Map.addLayer(DATA.MapLayer.drawlayer);
        DATA[config.mapId].MapControl.drawcontrol = new L.Control.Draw({
            draw: {
                polygon: false,
                marker: false,
                polyline: false,
                rectangle: false
            },
            edit: {
                featureGroup: DATA.MapLayer.drawlayer
            }
        });
        DATA[config.mapId].MapControl.drawcontrol.addTo(DATA[config.mapId].Map);
        DATA[config.mapId].Map.on('draw:created', function (e) {
            DATA.MapLayer.drawlayer.clearLayers();
            var type = e.layerType,
                    layer = e.layer;
            if (type === 'circle') {
                var theCenterPt = layer.getLatLng();
                var center = [theCenterPt.lng, theCenterPt.lat];
                layer.bindPopup('Bán kính: ' + Math.round(layer.getRadius()) + ' m <br> Tâm điểm:' + center);
            }

            DATA.MapLayer.drawlayer.addLayer(e.layer);
            callHokinhdoanhInCircle(e.layer._latlng.lat, e.layer._latlng.lng, e.layer._mRadius);
        });
        DATA[config.mapId].Map.on('draw:edited', function (e) {
            var layers = e.layers;
            layers.eachLayer(function (layer) {
                if (layer instanceof L.Circle) {
                    var theCenterPt = layer.getLatLng();
                    var center = [theCenterPt.lng, theCenterPt.lat];
                    layer.bindPopup('Bán kính: ' + Math.round(layer.getRadius()) + ' m <br> Tâm điểm:' + center);
                    callHokinhdoanhInCircle(layer._latlng.lat, layer._latlng.lng, layer._mRadius);
                }
            });
        });

    }
    function initMeasureControl(config) {
        var measureControl = new L.Control.Measure({
            position: 'topleft',
            primaryLengthUnit: 'meters',
            secondaryLengthUnit: undefined,
            primaryAreaUnit: 'sqmeters',
            secondaryAreaUnit: undefined,
            localization: 'tr',
            activeColor: '#e56666',
            completedColor: '#e56666',
        });
        measureControl.addTo(DATA[config.mapId].Map);


    }
    function callHokinhdoanhInCircle(lat, lng, radius) {

        $.ajax({
            url: DATA.HomeUrl + 'user/hokinhdoanh-incircle?lat={0}&lng={1}&radius={2}'.replace('{0}', lat).replace('{1}', lng).replace('{2}', radius),
            success: function (html) {
                $('#list_extend').empty().append(html);
                $('body').addClass('page-quick-sidebar-open');
                //  activaTab('thongke');
            }
        })
    }
    function activaTab(tab) {
        $('.nav-tabs a[href="#' + tab + '"]').tab('show');
    }
    ;
    function initSearchHokd() {
        $('#search-box').on('keypress', function (e) {
            if (e.keyCode == 13) {
                var q = $(this).val();
                loadAjaxToDivListHokinhdoanh(DATA.HomeUrl + '/user/list-hokinhdoanh?q=' + q);
            }
        })
    }


    function loadAjaxToDivListHokinhdoanh(url) {
        var div = $('#list_hokinhdoanh');
        $.ajax({
            url: url,
            success: function (html) {
                div.empty().append(html);
                initPagAjaxDivListHokinhdoanh();
                initHokdClickEvent();
            }
        });
    }



    function HokinhdoanhView(id_hkd) {
        var url_cg = "<?= Yii::$app->homeUrl ?>hokinhdoanh/viewuser?id=" + id_hkd;
        $.get(url_cg, function (res) {
            $('#ajaxModalContent').empty().html(res);
            //  $('#myModalLabel').empty().html(name);
        })
    }



    function initFocusCircleLayer(config) {
        DATA.MapLayer.focuscirclelayer = L.circleMarker([0, 0], {radius: 20, fillColor: "red",
            color: "#000",
            weight: 1,
            opacity: 1,
            fillOpacity: 1});
        DATA[DATA.MapConfig.mapId].Map.addLayer(DATA.MapLayer.focuscirclelayer);
    }
    function initMapZoomEvent(config) {
        DATA[DATA.MapConfig.mapId].Map.on('zoomstart', function (e) {
            DATA.MapLayer.focuscirclelayer.zoomstart = DATA[DATA.MapConfig.mapId].Map.getZoom();
        });
        DATA[DATA.MapConfig.mapId].Map.on('zoomend', function (e) {
            DATA.MapLayer.focuscirclelayer.zoomend = DATA[DATA.MapConfig.mapId].Map.getZoom();
            var diff = DATA.MapLayer.focuscirclelayer.zoomend - DATA.MapLayer.focuscirclelayer.zoomstart;
            if (diff > 0) {
                DATA.MapLayer.focuscirclelayer.setRadius(DATA.MapLayer.focuscirclelayer.getRadius());
            } else if (diff < 0) {
                DATA.MapLayer.focuscirclelayer.setRadius(DATA.MapLayer.focuscirclelayer.getRadius());
            }

            DATA.Refs.LeafletLayers[defined.layer_hokindoanh].Cluster.Size = 10;
            DATA.Refs.LeafletLayers[defined.layer_hokindoanh].ProcessView(); // looks like it works OK without this line
        });
    }

    function mapZoomAndPanTo(x, y, zoom) {
        DATA[DATA.MapConfig.mapId].Map.setView([x, y], zoom);
        DATA.MapLayer.focuscirclelayer.setLatLng([x, y]);
    }
</script>