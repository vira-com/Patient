@extends('drugstore.dashboard.layouts.dashboard')
@section('page_title')
@parent
لیست نسخ
@endsection
@section('main')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        لیست نسخ
    </h1>
    <ol class="breadcrumb">
        <li><a href="/panel/dashboard"><i class="fa fa-dashboard"></i> خانه</a></li>
        <li class="active">لیست نسخ</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <div class="row">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">لیست</h3>

                        <div class="box-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control pull-right"
                                    placeholder="جستجو">

                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tr>
                                <th>شماره</th>
                                <th>دکتر</th>
                                <th>زمان ثبت</th>
                                <th>وضعیت</th>
                                <th>انتخاب</th>
                            </tr>
                            @foreach($drugPrescriptions as $drugPrescription)
                            <tr>
                                <td>{{$drugPrescription['id']}}</td>
                                <td>{{$drugPrescription->doctors()->first()->docFName}}
                                    {{$drugPrescription->doctors()->first()->docLName}}</td>
                                <td>{{$drugPrescription->created_at->format('h:i:s m-d')}}</td>
                                <td>
                                    @if($drugPrescription['status'] == 1 and $drugPrescription['view'] == 0 )
                                    <span class="label label-primary">در انتظار بررسی</span>
                                    @elseif($drugPrescription['status'] == 1 and $drugPrescription['view'] == 1 )
                                    <span class="label label-primary">در حال بررسی اپراتور</span>
                                    @elseif($drugPrescription['status'] == 2 and $drugPrescription['view'] == 0 )
                                    <span class="label label-default">در انتظار داروخانه</span>
                                    @elseif($drugPrescription['status'] == 2 and $drugPrescription['view'] == 1 )
                                    <span class="label label-default">درحال بررسی داروخانه</span>
                                    @else
                                    <span class="label label-success">در حال بررسی</span>

                                    @endif
                                </td>
                                <td>
                                    @if($drugPrescription['status'] == 1)
                                    <a href="/drugstore/panel/prescription/{{$drugPrescription['id']}}"
                                        class="btn btn-block btn-warning btn-sm">بررسی</a>
                                    @elseif($drugPrescription['status'] == 2)
                                    <a href="/drugstore/panel/prescription/cost/{{$drugPrescription['id']}}"
                                        class="btn btn-block btn-danger btn-sm">ثبت قیمت</a>

                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </div>
    <!-- /.row -->


</section>
<!-- /.content -->
@endsection