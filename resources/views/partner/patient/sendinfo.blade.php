@extends('partner.dashboard.layouts.dashboard')
@section('page_title')
@parent
ارسال نسخه بیمار
@endsection
@section('main')
<!-- Content Header (Page header) -->

<section class="content-header">
    <h1>
        {{ __('messages.dashboard') }}
        {{-- <small>ورژن 1</small> --}}
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="#"><i class="fa fa-dashboard"></i>
                {{ __('messages.home') }}
            </a>
        </li>
        <li class="active">
            {{-- داشبرد --}}
        </li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <form action="{{ url('/partner/panel/sendinfohandle') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="box">
        <div class="box-body">
            <div class="form-group">
                <label>{{ __('messages.select_bimeh_patient') }}</label>
            </div>
            <div class="form-group col-md-4">
                <label id="bimeh">
                    <input type="radio" class="minimal-red" name="bimeh" value="tamin" required=""
                        onchange="myFunc(this)">
                    {{ __('messages.bimeh_tamin') }}
                </label>
            </div>
            <div class="form-group col-md-4">
                <label>
                    <input type="radio" class="minimal-red" name="bimeh" value="hdk" required=""
                        onchange="myFunc(this)">
                    {{ __('messages.bimeh_salamat') }}
                </label>
            </div>
            <div class="form-group col-md-4">
                <label>
                    <input type="radio" class="minimal-red" name="bimeh" value="freeb" required=""
                        onchange="myFunc(this)">
                    {{ __('messages.bimeh_free') }}

                </label>
            </div>



        <div class="form-row">
            <div class="form-group" id="tamin" style="display: none">
                <label class="form-label" for="National_Code">
                    {{ __('messages.National_Code') }} :
                </label>
                <input type="number" name="national_code" id="National_Code" class="form-control" />
            </div>
            <div class="form-group" id="hdk" style="display: none">
                <label class="form-label" for="Tracking_Code">
                    {{ __('messages.Tracking_Code') }} :
                </label>
                <input type="number" name="tracking_code" id="Tracking_Code" class="form-control" />
            </div>
            <div class="form-group" id="freeb" style="display: none">
                <div class="input-group">
                    <label class="form-label" for="file">
                        {{ __('messages.image') }} :
                    </label>
                    <input type="file" class="form-control" name="upludeFile"/>
                </div>
            </div>
        </div>

        <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
            <option selected>{{ __('messages.drugstore') }}</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
        </select>

            <hr>
        <button type="submit" class="btn btn-primary">{{ __('messages.submit') }}</button>
    </form>
    </div>
    </div>
</section>


<script>
    function myFunc(radio) {

            switch(radio.value) {
                case "tamin":
                    document.getElementById('tamin').style.display = 'block';
                    document.getElementById('hdk').style.display = 'none';
                    document.getElementById('freeb').style.display = 'none';
                    break;
                case "hdk":
                    document.getElementById('hdk').style.display = 'block';
                    document.getElementById('tamin').style.display = 'block';
                    document.getElementById('freeb').style.display = 'none';
                    break;
                case "freeb":
                    document.getElementById('hdk').style.display = 'none';
                    document.getElementById('tamin').style.display = 'none';
                    document.getElementById('freeb').style.display = 'block';
                    break;
                default:
            }
        }
</script>

<!-- /.content -->
@endsection