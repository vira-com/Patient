@extends('admin.dashboard.layouts.dashboard')
@section('page_title')
@parent
سامانه ویرا
@endsection
@section('main')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        {{ __('dashboard.dashboard') }}
        {{-- <small>ورژن 1</small> --}}
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>
        {{-- {{  }}     --}}
        </a></li>
        <li class="active">
            {{-- داشبرد --}}
        </li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- Info boxes -->
    <div class="row">
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa-ellipsis-v"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">
                        {{-- {data}     --}}
                    </span>
                    <span class="info-box-number">
                        {{-- {{$data ['Prescriptions']}} --}}
                    </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-get-pocket"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">
                        {{-- نسخه دریافت شده --}}
                    </span>
                    <span class="info-box-number">
                        {{-- {{$data ?? ''['PrescriptionsReceiv']}} --}}
                    </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-database"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">
                        {{-- جمع نسخه های ارسالی --}}
                    </span>
                    <span class="info-box-number">
                        {{-- {{$data ?? ''['PrescriptionsReceivMoney']}} --}}
                        {{-- <small>تومان</small></span> --}}
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <!-- /.col -->
    </div>
    <!-- /.row -->

    {{-- <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">گزارش ماهانه</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                class="fa fa-minus"></i>
                        </button>
                        <div class="btn-group">
                            <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-wrench"></i></button>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">منوی ۱</a></li>
                                <li><a href="#">منوی ۲</a></li>
                                <li><a href="#">منو ۳</a></li>
                                <li class="divider"></li>
                                <li><a href="#">لینک</a></li>
                            </ul>
                        </div>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                class="fa fa-times"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-8">
                            <p class="text-center">
                                <strong>فروش ۳ مرداد ۱۳۹۶</strong>
                            </p>

                            <div class="chart">
                                <!-- Sales Chart Canvas -->
                                <canvas id="salesChart" style="height: 180px;"></canvas>
                            </div>
                            <!-- /.chart-responsive -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-4">
                            <p class="text-center">
                                <strong>میزان پیشرفت اهداف</strong>
                            </p>

                            <div class="progress-group">
                                <span class="progress-text">سفارش در ماه</span>
                                <span class="progress-number"><b>160</b>/200</span>

                                <div class="progress sm">
                                    <div class="progress-bar progress-bar-aqua" style="width: 80%"></div>
                                </div>
                            </div>
                            <!-- /.progress-group -->
                            <div class="progress-group">
                                <span class="progress-text">محصول</span>
                                <span class="progress-number"><b>310</b>/400</span>

                                <div class="progress sm">
                                    <div class="progress-bar progress-bar-red" style="width: 80%"></div>
                                </div>
                            </div>
                            <!-- /.progress-group -->
                            <div class="progress-group">
                                <span class="progress-text">مشتری جدید</span>
                                <span class="progress-number"><b>480</b>/800</span>

                                <div class="progress sm">
                                    <div class="progress-bar progress-bar-green" style="width: 80%"></div>
                                </div>
                            </div>
                            <!-- /.progress-group -->
                            <div class="progress-group">
                                <span class="progress-text">بازدید جدید</span>
                                <span class="progress-number"><b>250</b>/500</span>

                                <div class="progress sm">
                                    <div class="progress-bar progress-bar-yellow" style="width: 80%"></div>
                                </div>
                            </div>
                            <!-- /.progress-group -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>

            </div> --}}
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Main row -->

    <!-- /.row -->
</section>
<!-- /.content -->
@endsection