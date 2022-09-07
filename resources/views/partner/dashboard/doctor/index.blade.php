@extends('partner.dashboard.layouts.dashboard')
@section('page_title')
@parent
لیست پزشکان
@endsection
@section('main')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        لیست پزشکان
    </h1>
    <ol class="breadcrumb">
        <li><a href="/partner/panel/dashboard"><i class="fa fa-dashboard"></i> خانه</a></li>
        <li class="active">لیست پزشک</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <div class="row">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">لیست پزشک</h3>

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
                                <th>کد نظام پزشکی</th>
                                <th>نام و نام خانوادگی</th>
                                <th>آدرس</th>
                                <th>شماره تماس</th>
                                <th>انتخاب</th>
                            </tr>
                            @foreach($doctors as $doctor)
                            <tr>
                                <td>{{$doctor['docId']}}</td>
                                <td>{{$doctor['docFName']}} {{$doctor['docLName']}}</td>
                                <td>{{$doctor['docAdress']}}</td>
                                <td>{{$doctor['mobile']}}</td>
                                <td>
                                    @if($doctor['status'] == 1)
                                    <button class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#delete{{$doctor->id}}"><i class="fa fa-close"
                                            data-toggle="tooltip" title="غیرفعال"></i></button>
                                    @endif
                                    @if($doctor['status'] == 0)
                                    <button class="btn btn-success btn-sm" data-toggle="modal"
                                        data-target="#active{{$doctor->id}}"><i class="fa fa-check-square"
                                            data-toggle="tooltip" title="فعال"></i></button>
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
    <!-- Modal Del -->
    <div id="delete{{$doctor->id}}" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                {!! Form::open(['url' => '/partner/panel/doctor/deactive/'.$doctor->id, 'method' => 'post']) !!}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style="color:black;">غیرفعال {{$doctor->docId}} </h4>
                </div>
                <div class="modal-body">

                    <p style="font-size:14px;">آیا از غیرفعال کردن پزشک <strong>{{$doctor->docLName}}</strong> با <span
                            style="color:#c75757;">کد {{$doctor->docId}} </span> اطمینان دارید؟</p>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">بله غیرفعال شود</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">انصراف</button>
                </div>
                {!! Form::close() !!}
            </div>

        </div>
    </div>
    <div id="active{{$doctor->id}}" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                {!! Form::open(['url' => '/partner/panel/doctor/active/'.$doctor->id, 'method' => 'post']) !!}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style="color:black;">فعال {{$doctor->docId}} </h4>
                </div>
                <div class="modal-body">

                    <p style="font-size:14px;">آیا از فعال کردن پزشک <strong>{{$doctor->docLName}}</strong> با <span
                            style="color:#c75757;">کد {{$doctor->docId}} </span> اطمینان دارید؟</p>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">بله فعال شود</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">انصراف</button>
                </div>
                {!! Form::close() !!}
            </div>

        </div>
    </div>
    <!-- Close Modal Del -->

</section>
<!-- /.content -->
@endsection