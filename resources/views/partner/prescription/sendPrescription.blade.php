@extends('partner.dashboard.layouts.dashboard')
@section('page_title')
@parent
ارسال نسخه بیمار
@endsection
@section('main')
<!-- Content Header (Page header) -->

<section class="content-header">
    <h1>
        {{ __('dashboard.dashboard') }}
        {{-- <small>ورژن 1</small> --}}
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="#"><i class="fa fa-dashboard"></i>
                {{ __('dashboard.home') }}
            </a>
        </li>
        <li class="active">
            {{-- داشبرد --}}
        </li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <form action="{{ url('/partner/panel/sendPrescriptionhandle') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="box">
            <div class="box-body">
                <div class="form-group">
                    <label>{{ __('dashboard.select_bimeh_patient') }}</label>
                </div>
                <div class="form-group col-md-4">
                    <label id="bimeh">
                        <input type="radio" class="minimal-red" name="bimeh" value="tamin" required=""
                            onchange="myFunc(this)">
                        {{ __('dashboard.bimeh_tamin') }}
                    </label>
                </div>
                <div class="form-group col-md-4">
                    <label>
                        <input type="radio" class="minimal-red" name="bimeh" value="hdk" required=""
                            onchange="myFunc(this)">
                        {{ __('dashboard.bimeh_salamat') }}
                    </label>
                </div>
                <div class="form-group col-md-4">
                    <label>
                        <input type="radio" class="minimal-red" name="bimeh" value="freeb" required=""
                            onchange="myFunc(this)">
                        {{ __('dashboard.bimeh_free') }}

                    </label>
                </div>



                <div class="form-row">
                    <div class="form-group" id="tamin" style="display: none">
                        <label class="form-label" for="National_Code">
                            {{ __('dashboard.National_Code') }} :
                        </label>
                        <input type="number" name="national_code" id="National_Code" class="form-control" />
                    </div>
                    <div class="form-group" id="hdk" style="display: none">
                        <label class="form-label" for="Tracking_Code">
                            {{ __('dashboard.Tracking_Code') }} :
                        </label>
                        <input type="number" name="tracking_code" id="Tracking_Code" class="form-control" />
                    </div>
                    <div class="form-group" id="freeb" style="display: none">

                        <div class="input-group">
                            <label class="form-label" for="file">
                                {{ __('dashboard.image') }} :
                            </label>
                            <input type="file" multiple class="form-control uploadimgs" name="prescription[]"
                                onchange='addimg(0)' id='f-0' data-id='0' />
                            <div class="clear-both"></div>
                        </div>
                        <div class='row'>
                            <div class="col-md-12 img-previews">
                                <div class="img-box">
                                    <img class="image-responsive" width="50%" id='img-0'>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>

                <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="drugstores">
                    <option selected name="drugstores">{{ __('dashboard.drugstore') }}</option>
                    @foreach($drugstores as $drugstore)
                    <option value="{{ $drugstore['drugstore_id'] }}">{{ $drugstore['name'] }}</option>
                    @endforeach
                </select>

                <hr>
                <button type="submit" class="btn btn-primary">{{ __('dashboard.submit') }}</button>



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
                    document.getElementById('tamin').style.display = 'block';
                    document.getElementById('freeb').style.display = 'block';
                    break;
                default:
            }
        }
</script>
<script>
    function addimg(put){
        var b = $('#f-'+put).attr('data-id');
        var c = parseInt(b);
        $('#f-'+put).hide();
        $('#del-'+put).css({'visibility':'visible'});
        $('#img-'+put).css({'visibility':'visible'});
        if ($('#f-'+put)[0].files && $('#f-'+put)[0].files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#img-'+put).attr('src', e.target.result);
            }
            reader.readAsDataURL($('#f-'+put)[0].files[0]);
        }
        c++;
        $('.img-previews').append('<div class="img-box"><img class="img-responsive gal" width="170px" id="img-'+c+'"><div class="fa fa-times-circle del" id="del-'+c+'" onclick="delimg('+c+')"></div></div>');
        $('.addimgs').append('<input type="file" class="form-control uploadimgs" name="prescription[]" onchange="addimg('+c+')" id="f-'+c+'" data-id="'+c+'"> ');
     }
    function delimg(put){
    $('#del-'+put).remove();
    $('#img-'+put).remove();
    $('#f-'+put).remove();
    }
</script>
<!-- /.content -->
@endsection