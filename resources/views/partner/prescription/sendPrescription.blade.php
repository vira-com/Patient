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

                        <label class="form-label" for="file">
                            {{ __('dashboard.image') }} :
                        </label>
                        {{-- prescription --}}
                        <div>
                            <div class="row" id="coba"></div>
                        </div>
                        <div class="container mt-4">
                            <button type="button" class="btn btn-block btn-default" data-toggle="modal"
                                data-target="#modal-default">
                                {{ __('prescription.qr_show') }}
                            </button>
                            <div class="modal fade" id="modal-default">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                                                onchange="qrCode()">
                                                <span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title">
                                                {{-- {{ __('prescription.qr_show') }} --}}
                                            </h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>
                                            <div class="card">
                                                <div class="card-body">
                                                    <center>
                                                        {{-- {!! QrCode::size(300)->generate(Request::url("{{
                                                        route('get_qrcode_for_partner', $partner->token_mobile) }}" ))
                                                        !!} --}}

                                                        {!! QrCode::size(300)->generate(
                                                        Request::fullUrl("{{route('get_qrcode')}}") ) !!}

                                                        {{-- Request::url("{{
                                                        route('get_qrcode_for_partner') }}" . "?" . "mobile_token=" .
                                                        "{{ $partner->token_mobile }}" )) --}}
                                                    </center>
                                                </div>
                                            </div>
                                            </p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default pull-left"
                                                data-dismiss="modal">
                                                {{ __('prescription.exit') }}

                                            </button>
                                            {{-- <button type="button" class="btn btn-primary">
                                                {{ __('prescription.save') }}
                                            </button> --}}
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>

                        </div>


                    </div>

                    <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example"
                        name="drugstores">
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
    function qrCode(){



    }
</script>

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

<script src="/assets/panel/dist/js/spartan-multi-image-picker.js"></script>

<script>
    $(function () {
        $("#coba").spartanMultiImagePicker({
            fieldName: 'images[]',
            maxCount: 4,
            rowHeight: '215px',
            groupClassName: 'col-3',
            maxFileSize: '',
            placeholderImage: {
                image: '{{asset('/assets/panel/img2.jpg')}}',
                width: '25%'
            },
            dropFileLabel: "Drop Here",
            onAddRow: function (index, file) {

            },
            onRenderedPreview: function (index) {

            },
            onRemoveRow: function (index) {

            },
            onExtensionErr: function (index, file) {
                toastr.error("{{ __('messages.format_image') }}", {
                    CloseButton: true,
                    ProgressBar: true
                });
            },
            onSizeErr: function (index, file) {
                toastr.error("{{ __('messages.big_image') }}", {
                    CloseButton: true,
                    ProgressBar: true
                });
            }
        });
    });
</script>


<!-- /.content -->
@endsection