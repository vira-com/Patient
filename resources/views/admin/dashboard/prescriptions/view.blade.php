@extends('admin.dashboard.layouts.dashboard')
@section('page_title')
    @parent
    نسخه-{{$drugPrescription->id}}
@endsection
@section('main')
    <!-- Select2 -->
    <link rel="stylesheet" href="/assets/panel/bower_components/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="/assets/panel/dist/css/persian-datepicker-0.4.5.min.css" />
    <!-- Content Header (Page header) -->
    <section class="content-header" xmlns="http://www.w3.org/1999/html">
        <h1>
            لیست نسخ
        </h1>
        <ol class="breadcrumb">
            <li><a href="admin/panel/dashboard"><i class="fa fa-dashboard"></i> خانه</a></li>
            <li class="active">لیست نسخ</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <div class="row">

                        @foreach($imgs as $img)
                            <div class="col-xs-{{12/$loop->count}}">
                                <img src="data:image/png;{{$img}}" class="img-bordered-sm" style="width: 100% ;border-radius: 8px;" alt="صفحه {{$loop->index + 1}}"
                                     onclick="myFunction(this);">
                            </div>
                        @endforeach
                    </div>
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
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                {!! Form::open(['url' => 'admin/panel/prescription/'.$drugPrescription->id, 'method' => 'post' ,'enctype'=>'multipart/form-data']) !!}
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-body">
                                <div class="box-title"><label>اطلاعات بیمار</label></div>
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <input type="number" id="patientCode" name="patientCode" class="form-control" placeholder="کد ملی بیمار" required>
                                            <div class="input-group-addon">
                                                <i>کد ملی بیمار</i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <input type="text" id="trackingCode" name="trackingCode" class="form-control" placeholder="کد رهگیری بیمه" required>
                                            <div class="input-group-addon">
                                                <i>کد رهگیری بیمه</i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <button type="submit" class="btn btn-success">ثبت</button>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>

            <!-- /.box-tools -->

        </div>
        <!-- /.box -->

        </div>

        </div>

        </div>

    </section>
    <!-- /.content -->
    <style>
        /* The grid: Four equal columns that floats next to each other */
        .column {
            float: left;
            width: 25%;
            padding: 10px;
        }

        /* Style the images inside the grid */
        .column img {
            opacity: 0.8;
            cursor: pointer;
        }

        .column img:hover {
            opacity: 1;
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        /* The expanding image container (positioning is needed to position the close button and the text) */
        .container {
            position: relative;
            display: none;
        }

        /* Expanding image text */
        #imgtext {
            position: absolute;
            bottom: 15px;
            left: 15px;
            color: black;
            font-size: 20px;
        }

        /* Closable button inside the image */
        .closebtn {
            position: absolute;
            top: 10px;
            right: 15px;
            color: black;
            font-size: 35px;
            cursor: pointer;
        }
    </style>
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
    <script>
        function getPData() {
            var nationalCode = document.getElementById("nationalCode").value;
            $.ajax({
                type: 'GET',
                url: '/panel/getPdata/'+nationalCode+'/{{$drugPrescription->id}}',
                dataType: 'json',
                success: function (data) {
                    if (data.s){
                        alert('لطفا کد ملی را چک بفرمایید.');
                    }
                    else {
                        $('.pDataClass').append('<div class="attachment-block clearfix" style="background: white;"><img class="attachment-img" src="'+ data.memberImage +'"><div class="attachment-pushed" style="margin-top: 10px;"><h4 class="attachment-heading">'+ data.name +' '+ data.lastName +'</h4><div class="attachment-text"><b>شماره تماس :</b> '+ data.cellPhoneNumber +'<br> <b>نوع بیمه :</b> '+ data.productName +' <br> <b>آدرس : </b> '+ data.geoInfo +'</div></div></div>');
                    }},
                error: function (data) {
                    alert('خطایی رخ داده است');
                }
            });
        }
    </script>
    <script>
        function savepage(put) {

            var b = $('#f-' + put).attr("data-id");
            var c = parseInt(b);
            var drugName = document.getElementById("drugName").value;
            var drugid = document.getElementById('select2-drugName-container').getAttribute('title');
            var prescriptionNumber = document.getElementById("prescriptionNumber").value;
            var orderUse = document.getElementById("orderUse").value;
            var dayUse = document.getElementById("dayUse").value;
            var amountUse = document.getElementById("amountUse").value;
            var Usage = document.getElementById('searchUsage').value;
            var date = document.getElementById('tarikhAlt').value;
            var IRC = document.getElementById('IRC').value;
            var nationalCode = document.getElementById("nationalCode").value;
            if (nationalCode.length == 10) {
                $('.nCode').append('<div id="nCode-1">  <input type="hidden" name="nCode-1"  value="' + nationalCode + '"> </div>');
            }
            c++;
            $('.drug-box').append('<div id="drug-' + c + '"> <input type="hidden" name="drug-'+ c +'[]"  value="' + drugName + '">  <input type="hidden" name="drug-'+ c +'[]" value="' + prescriptionNumber + '">  <input type="hidden" name="drug-'+ c +'[]" value="' + orderUse + '">  <input type="hidden" name="drug-'+ c +'[]" value="' + dayUse + '">  <input type="hidden" name="drug-'+ c +'[]"  value="' + amountUse + '"> <input type="hidden" name="drug-'+ c +'[]"  value="' + Usage + '"> </div><input type="hidden" name="drug-'+ c +'[]"  value="' + date + '"><input type="hidden" name="drug-'+ c +'[]"  value="' + IRC + '">');
            $('.drug-box').append('<tr id="del-' + c + '">  <td>'+ drugid +' </td>  <td> '+ prescriptionNumber +' </td>   <td> '+ drugName +' </td>  <td> '+ orderUse +' بار در '+ dayUse +' روز '+ amountUse +' عدد | سی سی | واحد '+ Usage +'</td>  <td> <div class="fa fa-times-circle del" id="del-' + c + '" onclick="delimg(' + c + ')"></div> </td>  </tr>');
            $('#f-' + put).attr("data-id" , c);
            document.getElementById("formP").reset();
            document.getElementById('tarikhAlt').value=IRC;
        }

        function delimg(put){
            $('#del-'+put).remove();
            $('#drug-'+put).remove();
        }


    </script>


@endsection
