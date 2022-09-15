@extends('drugstore.dashboard.layouts.dashboard')
@section('page_title')
@parent
لیست نسخ ارسالی
@endsection
@section('main')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        {{ __('prescription.list_prescriptions') }}
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="/panel/dashboard"><i class="fa fa-dashboard"></i>
                {{ __('prescription.home') }}
            </a>
        </li>
        <li class="active">
            {{ __('prescription.list_prescriptions') }}
        </li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <div class="row">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">
                            {{ __('prescription.prescription') }}
                        </h3>

                        <div class="box-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control pull-right"
                                    placeholder="{{ __('prescription.search') }}">

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
                                <th>{{ __('prescription.bimeh') }}</th>
                                <th>{{ __('prescription.patient_code') }}</th>
                                <th>{{ __('prescription.tracking_code') }}</th>
                                <th>{{ __('prescription.source_img_path') }}</th>
                                <th>{{ __('prescription.time') }}</th>
                            </tr>
                            @foreach($prescriptions as $prescription)
                            <tr>
                                <td>{{$prescription['bimeh']}}</td>
                                <td>{{$prescription['patient_code']}}</td>
                                <td>{{$prescription['tracking_code']}}</td>
                                <td>{{$prescription['source_img_path']}}</td>
                                <td>{{$prescription->created_at->format('h:i:s m-d')}}</td>
                                <td>
                                    @if($prescription['status'] == 0)
                                    <span class="label label-primary">
                                        {{ __('prescription.status_0') }}
                                    </span>
                                    @else
                                    <span class="label label-success">
                                        {{ __('prescription.status_1') }}
                                    </span>

                                    @endif
                                </td>
                                <td>
                                    @if($prescription['status'] == 0)
                                    <a href="/panel/prescription/{{$prescription['id']}}"
                                        class="btn btn-block btn-warning btn-sm">
                                        {{ __('prescription.change_status') }}
                                    </a>
                                    {{-- @elseif($prescription['status'] == 2)
                                    <a href="/panel/prescription/cost/{{$prescription['id']}}"
                                        class="btn btn-block btn-danger btn-sm">ثبت قیمت</a> --}}

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