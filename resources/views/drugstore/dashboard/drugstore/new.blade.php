@extends('drugstore.dashboard.layouts.dashboard')
@section('page_title')
@parent
افزودن داروخانه
@endsection
@section('main')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        افزودن داروخانه
    </h1>
    <ol class="breadcrumb">
        <li><a href="/drugstore/panel/dashboard"><i class="fa fa-dashboard"></i> خانه</a></li>
        <li class="active">افزودن داروخانه</li>
    </ol>
</section>

<section class="content">
    <div class="box">
        <div class="box-body">
            {!! Form::open(['url' => '/drugstore/panel/drugstore/save', 'method' => 'post'
            ,'enctype'=>'multipart/form-data']) !!}
            <div class="col-md-6">
                <div class="form-group">
                    <label for="fname">نام موسس</label>
                    <input type="text" class="form-control" name="fname" id="fname" placeholder="اسم">
                </div>
                <div class="form-group">
                    <label for="pharmacyName">نام داروخانه</label>
                    <input type="text" class="form-control" name="pharmacyName" id="pharmacyName"
                        placeholder="نام داروخانه">
                </div>
                <div class="form-group">
                    <label for="mobile">شماره موبایل</label>
                    <input type="text" class="form-control" name="mobile" maxlength="11" id="mobile"
                        placeholder="09000000000">
                </div>
                <div class="form-group">
                    <label for="password">پسورد</label>
                    <input type="password" class="form-control" name="password" id="password">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="lname">نام خانوادگی موسس</label>
                    <input type="text" class="form-control" name="lname" id="lname" placeholder="خانوادگی">
                </div>
                <div class="form-group">
                    <label for="address">آدرس</label>
                    <input type="text" class="form-control" name="address" id="address" placeholder="آدرس">
                </div>
                <div class="form-group">
                    <label for="phone">شماره تلفن ثابت</label>
                    <input type="text" class="form-control" name="phone" id="phone" placeholder="شماره تلفن ثابت">
                </div>
                <div class="form-group">
                    <label for="password_confirm">تکرار پسورد</label>
                    <input type="password" class="form-control" name="password_confirm" id="password_confirm">
                </div>
            </div>
            <button type="submit" class="btn btn-success">ثبت داروخانه</button>
            {!! Form::close() !!}

        </div>
    </div>

</section>

<!-- /.content -->
@endsection