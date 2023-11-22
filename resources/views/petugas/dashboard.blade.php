@extends('layouts.app')
@section('content')
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('petugas/dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

            <div class="card">

                <div class="card-body pb-0">
                    <h5 class="card-title" style="text-align: center; color: black;">Grafik Tamu Berdasarkan lorem</h5>

                    <div id="trafficChart"
                        style="min-height: 400px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); position: relative;"
                        class="echart" _echarts_instance_="ec_1700618294666">
                        <div
                            style="position: relative; width: 326px; height: 400px; padding: 0px; margin: 0px; border-width: 0px; cursor: default;">
                            <canvas data-zr-dom-id="zr_0" width="326" height="400"
                                style="position: absolute; left: 0px; top: 0px; width: 326px; height: 400px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); padding: 0px; margin: 0px; border-width: 0px;"></canvas>
                        </div>
                        <div class=""
                            style="position: absolute; display: block; border-style: solid; white-space: nowrap; z-index: 9999999; box-shadow: rgba(0, 0, 0, 0.2) 1px 2px 10px; transition: opacity 0.2s cubic-bezier(0.23, 1, 0.32, 1) 0s, visibility 0.2s cubic-bezier(0.23, 1, 0.32, 1) 0s, transform 0.4s cubic-bezier(0.23, 1, 0.32, 1) 0s; background-color: rgb(255, 255, 255); border-width: 1px; border-radius: 4px; color: rgb(102, 102, 102); font: 14px / 21px &quot;Microsoft YaHei&quot;; padding: 10px; top: 0px; left: 0px; transform: translate3d(-6px, 87px, 0px); border-color: rgb(84, 112, 198); pointer-events: none; visibility: hidden; opacity: 0;">
                            <div style="margin: 0px 0 0;line-height:1;">
                                <div style="font-size:14px;color:#666;font-weight:400;line-height:1;">Access From</div>
                                <div style="margin: 10px 0 0;line-height:1;">
                                    <div style="margin: 0px 0 0;line-height:1;"><span
                                            style="display:inline-block;margin-right:4px;border-radius:10px;width:10px;height:10px;background-color:#5470c6;"></span><span
                                            style="font-size:14px;color:#666;font-weight:400;margin-left:2px">Search
                                            Engine</span><span
                                            style="float:right;margin-left:20px;font-size:14px;color:#666;font-weight:900">1,048</span>
                                        <div style="clear:both"></div>
                                    </div>
                                    <div style="clear:both"></div>
                                </div>
                                <div style="clear:both"></div>
                            </div>
                        </div>
                    </div>

                    <script>
                        document.addEventListener("DOMContentLoaded", () => {
                            echarts.init(document.querySelector("#trafficChart")).setOption({
                                tooltip: {
                                    trigger: 'item'
                                },
                                legend: {
                                    top: '5%',
                                    left: 'center'
                                },
                                series: [{
                                    name: 'Access From',
                                    type: 'pie',
                                    radius: ['40%', '70%'],
                                    avoidLabelOverlap: false,
                                    label: {
                                        show: false,
                                        position: 'center'
                                    },
                                    emphasis: {
                                        label: {
                                            show: true,
                                            fontSize: '18',
                                            fontWeight: 'bold'
                                        }
                                    },
                                    labelLine: {
                                        show: false
                                    },
                                    data: [{
                                            value: {{ tamuharian() }},
                                            name: 'Hari Ini'
                                        },
                                        {
                                            value: {{ tamumingguan() }},
                                            name: 'Minggu Ini'
                                        },
                                        {
                                            value: {{ tamubulanan() }},
                                            name: 'Bulan Ini'
                                        }
                                    ]
                                }]
                            });
                        });
                    </script>

                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="card info-card customers-card">
                    <div class="card-body">
                        <h5 class="card-title">Tamu Hari Ini</h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"><i
                                    class="bi bi-people"></i></div>
                            <div class="ps-3">
                                <h6>{{ tamuharian() }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card info-card customers-card">
                    <div class="card-body">
                        <h5 class="card-title">Tamu Minggu Ini</h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"><i
                                    class="bi bi-people"></i></div>
                            <div class="ps-3">
                                <h6>{{ tamumingguan() }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card info-card customers-card">
                    <div class="card-body">
                        <h5 class="card-title">Tamu Bulan Ini</h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"><i
                                    class="bi bi-people"></i></div>
                            <div class="ps-3">
                                <h6>{{ tamubulanan() }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
