@extends('drugstore.dashboard.layouts.dashboard')
@section('page_title')
@parent

@endsection
@section('main')
<!-- Select2 -->
<link rel="stylesheet" href="/assets/panel/bower_components/select2/dist/css/select2.min.css">
<link rel="stylesheet" href="/assets/panel/dist/css/persian-datepicker-0.4.5.min.css" />
<!-- Content Header (Page header) -->
<section class="content-header" xmlns="http://www.w3.org/1999/html">
    <h1>
        {{ __('dashboard.drugstore_prescription') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="drugstore/panel/dashboard"><i class="fa fa-dashboard"></i> خانه</a></li>
        <li class="active">
            {{ __('dashboard.drugstore_prescription') }}
        </li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-body">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="bimeh">{{ __('prescription.bimeh_show') }}</label>
                    <span class="form-control" id="bimeh">
                        @if ($prescription->bimeh == 'tamin'){
                        {{ __('prescription.bimeh_tamin') }}
                        }
                        @elseif($prescription->bimeh == 'hdk'){
                        {{ __('prescription.bimeh_hdk') }}
                        }
                        @elseif($prescription->bimeh == 'freeb'){
                        {{ __('prescription.bimeh_free') }}
                        }
                        @endif
                    </span>
                </div>

            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nCode">{{ __('prescription.patient_code_show') }}</label>
                    <span class="form-control" id="patient_code"> {{ $prescription['patient_code'] }}</span>
                </div>
            </div>

            @if ($prescription->bimeh == 'hdk'){
            <div class="col-md-12">
                <div class="form-group">
                    <label for="nCode">{{ __('prescription.tracking_code_show') }}</label>
                    <span class="form-control" id="tracking_code"> {{ $prescription['tracking_code_show'] }}</span>
                </div>
            </div>
            }@endif
            @if ($prescription->bimeh == 'freeb'){

            <div class="col-md-12">
                <div class="form-group">

                    @foreach($imgs as $img)
                    <div class="col-xs-{{12/$loop->count}}">
                        <img src="data:image/png;{{$img}}" class="img-bordered-sm" style="width: 100% ;border-radius: 8px;" alt="صفحه {{$loop->index + 1}}"
                             onclick="myFunction(this);">
                    </div>
                     @endforeach

                     <hr>
                    <div class="row">
                        <div class="container" style="width: auto;">
                            <!-- Close the image -->
                            <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>
                            <!-- Expanded image -->
                            <img id="expandedImg" style="width:100%">
                            <!-- Image text -->
                            <div id="imgtext"></div>
                        </div>
                        <!-- The expanding image container -->
                    </div>

                    {{-- <label for="nCode">{{ __('prescription.img_show') }}</label>
                    <img src="{{ $prescription['source_img_path'] }}" alt='{{ __(' prescription.img_not') }}'> --}}

                </div>
            </div>
            }@endif

            <button type="button" class="btn btn-block btn-success">{{ __('prescription.success') }}</button>
            <button type="button" class="btn btn-block btn-info">{{ __('prescription.waiting') }}</button>
            <button type="button" class="btn btn-block btn-danger">{{ __('prescription.cansel') }}</button>
        </div>
    </div>
</section>

<script type="text/javascript">
    function myFunction(imgs) {
        // Get the expanded image
        var expandImg = document.getElementById("expandedImg");
        // Get the image text
        var imgText = document.getElementById("imgtext");
        // Use the same src in the expanded image as the image being clicked on from the grid
        expandImg.src = imgs.src;
        // Use the value of the alt attribute of the clickable image as text inside the expanded image
        imgText.innerHTML = imgs.alt;
        // Show the container element (hidden with CSS)
        expandImg.parentElement.style.display = "block";
    }

</script>

@endsection