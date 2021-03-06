@extends('layouts.dashboard')
{{-- local styles --}} @section('header_styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/css/bootstrapValidator.min.css" rel="stylesheet">
<link href="{{asset('vendors/bootstrap-fileinput/css/fileinput.min.css')}}" media="all" rel="stylesheet" type="text/css"/>
@stop
@section('content')
<!-- breadcrumb -->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="/dashboard">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <a href="/dashboard/banner">List Banner</a>
    </li>
    <li class="breadcrumb-item active">Add Banner</li>
</ol>
<!-- form -->
<div class="col-6 px-0 mb-4">
    <form id="form-validation" enctype="multipart/form-data" class="form-horizontal form-bordered">
        <div class="form-group">
            <label>Title</label>
            <input class="form-control" type="hidden" placeholder="id" name="id" id="id" value="{{$id}}">
            <input class="form-control" type="text" placeholder="Title" name="title-input" id="title-input" value="{{$title}}" required>
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Status</label>
            <select class="form-control" id="select-status-input" name="select-status-input">
                <option value="1" {!! $status=='1' ? 'selected':'' !!}>Aktif</option>
                <option value="0" {!! $status=='0' ? 'selected':'' !!}>Tidak Aktif</option>
            </select>
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea class="form-control" id="description-input" name="description-input" rows="10">{{$description}}</textarea>
        </div>
        <div class="form-group">
            <label>Upload Image</label>
            <input class="img-banner-view" id="url_img_banner-input" name="url_img_banner-input" type="file" class="file" accept="image/*">
            <input type="hidden" id="url_img_banner-file" name="url_img_banner-file" value="{{$url_img_banner}}">
        </div>
        <div class="form-group form-actions">
            <a href="/dashboard/banner" type="button" class="btn btn-effect-ripple btn-danger">
                Cancel
            </a>
            <button type="submit" class="btn btn-effect-ripple btn-primary">
                Submit
            </button>
            <button type="reset" class="btn btn-effect-ripple btn-default reset_btn2">
                Reset
            </button>
        </div>
    </form>
</div>
@stop {{-- local scripts --}} @section('footer_scripts')
<script>
function test(id){
    console.log(id)
    var elem = document.getElementById(id);
    elem.parentNode.removeChild(elem);
    var elem2 = $('#'+id+'-file');
    elem2.removeAttr('value');
    return false;
    }
    
$(document).ready(function () {
    var bannerurl = '/uploads/front/banner/{{$url_img_banner}}';
    $(".img-banner-view").fileinput({
        initialPreview: [bannerurl],
        initialPreviewAsData: true,
        theme: "fa",
        showCaption: false,
        showDownload: false,
        showDrag: false,
        showUpload: false
    });

    $('#form-validation').bootstrapValidator().on('success.form.bv', function(e) {
        $('#form-validation').on('submit', function (e) {
            e.preventDefault();
            var form_data = new FormData(this);
            $.ajax({
                type: 'post',
                processData: false,
                contentType: false,
                "url": "/dashboard/banner/create",
                data: form_data,
                beforeSend: function (){
                    $("#submit").prop('disabled', true);
                },
                success: function () {
                    alert('From Submitted.');
                    window.location.href = "/dashboard/banner";
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                    $("#submit").prop('disabled', false);
                }
            });
        });
    }).on('error.form.bv', function(e) {
        $("#submit").prop('disabled', false);
    });
});
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/js/bootstrapValidator.min.js"></script>
<script src="{{asset('vendors/bootstrap-fileinput/js/fileinput.min.js')}}" type="text/javascript"></script>

@stop