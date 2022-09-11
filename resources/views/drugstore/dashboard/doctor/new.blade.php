@extends('drugstore.dashboard.layouts.dashboard')
@section('page_title')
@parent
افزودن پزشک
@endsection
@section('main')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        افزودن پزشک
    </h1>
    <ol class="breadcrumb">
        <li><a href="/drugstore/panel/dashboard"><i class="fa fa-dashboard"></i> خانه</a></li>
        <li class="active">افزودن پزشک</li>
    </ol>
</section>

<section class="content">
    <div class="box">
        <div class="box-body">
            {!! Form::open(['url' => '/drugstore/panel/doctor/save', 'method' => 'post'
            ,'enctype'=>'multipart/form-data']) !!}
            <div class="col-md-6">
                <div class="form-group">
                    <label for="fname">نام</label>
                    <input type="text" class="form-control" name="docFName" id="docFName" placeholder="اسم">
                </div>
                <div class="form-group">
                    <label for="docId">شماره نظام پزشکی</label>
                    <input type="text" class="form-control" name="docId" id="docId" placeholder="کد نظام پزشک">
                </div>
                <div class="form-group">
                    <label for="docMobile">شماره موبایل</label>
                    <input type="text" class="form-control" name="docMobile" maxlength="11" id="docMobile"
                        placeholder="09000000000">
                </div>
                <div class="form-group">
                    <label for="usernameHio">نام کاربری بیمه سلامت</label>
                    <input type="text" class="form-control" name="usernameHio" id="usernameHio" placeholder="">
                </div>
                <div class="form-group">
                    <label for="password">پسورد</label>
                    <input type="password" class="form-control" name="password" id="password">
                </div>
                <div class="form-group">
                    <label for="docExpertise">تخصص</label>
                    <input type="text" class="form-control" name="docExpertise" id="docExpertise">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="lname">نام خانوادگی</label>
                    <input type="text" class="form-control" name="docLName" id="docLName" placeholder="خانوادگی">
                </div>
                <div class="form-group">
                    <label for="docNationalCode">کد ملی</label>
                    <input type="text" class="form-control" name="docNationalCode" id="docNationalCode"
                        placeholder="کد ملی">
                </div>
                <div class="form-group">
                    <label for="docAdress">آدرس</label>
                    <input type="text" class="form-control" name="docAdress" id="docAdress" placeholder="آدرس دقیق">
                </div>
                <div class="form-group">
                    <label for="passwordHio">پسورد بیمه سلامت</label>
                    <input type="text" class="form-control" name="passwordHio" id="passwordHio" placeholder="">
                </div>
                <div class="form-group">
                    <label for="password_confirm">تکرار پسورد</label>
                    <input type="password" class="form-control" name="password_confirm" id="password_confirm">
                </div>

            </div>
            <button type="submit" class="btn btn-success">ثبت پزشک</button>
            {!! Form::close() !!}

        </div>
    </div>

</section>

<!-- /.content -->
@endsection