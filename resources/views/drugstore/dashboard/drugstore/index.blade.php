@extends('drugstore.dashboard.layouts.dashboard')
@section('page_title')
@parent
لیست داروخانه ها
@endsection
@section('main')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        لیست داروخانه ها
    </h1>
    <ol class="breadcrumb">
        <li><a href="/drugstore/panel/dashboard"><i class="fa fa-dashboard"></i> خانه</a></li>
        <li class="active">لیست داروخانه</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <div class="row">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">لیست داروخانه</h3>

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
                                <th>نام داروخانه</th>
                                <th>موسس</th>
                                <th>شماره تماس</th>
                                <th>انتخاب</th>
                            </tr>
                            @foreach($drugstores as $drugstore)
                            <tr>
                                <td>{{$drugstore['id']}}</td>
                                <td>{{$drugstore['pharmacyName']}}</td>
                                <td>{{$drugstore['fname']}} {{$drugstore['lname']}}</td>
                                <td>{{$drugstore['mobile']}}</td>
                                <td>
                                    @if($drugstore['status'] == 1)
                                    <button class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#delete{{$drugstore->id}}"><i class="fa fa-close"
                                            data-toggle="tooltip" title="غیرفعال"></i></button>
                                    @endif
                                    @if($drugstore['status'] == 0)
                                    <button class="btn btn-success btn-sm" data-toggle="modal"
                                        data-target="#active{{$drugstore->id}}"><i class="fa fa-check-square"
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
    <div id="delete{{$drugstore->id}}" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                {!! Form::open(['url' => '/drugstore/panel/drugstore/deactive/'.$drugstore->id, 'method' => 'post']) !!}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style="color:black;">غیرفعال {{$drugstore->pname}} </h4>
                </div>
                <div class="modal-body">

                    <p style="font-size:14px;">آیا از غیرفعال کردن داروخانه <strong>{{$drugstore->pname}}</strong> با
                        <span style="color:#c75757;">کد {{$drugstore->id}} </span> اطمینان دارید؟
                    </p>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">بله غیرفعال شود</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">انصراف</button>
                </div>
                {!! Form::close() !!}
            </div>

        </div>
    </div>
    <div id="active{{$drugstore->id}}" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                {!! Form::open(['url' => '/drugstore/panel/drugstore/active/'.$drugstore->id, 'method' => 'post']) !!}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style="color:black;">فعال {{$drugstore->pname}} </h4>
                </div>
                <div class="modal-body">

                    <p style="font-size:14px;">آیا از فعال کردن داروخانه <strong>{{$drugstore->pname}}</strong> با <span
                            style="color:#c75757;">کد {{$drugstore->id}} </span> اطمینان دارید؟</p>

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