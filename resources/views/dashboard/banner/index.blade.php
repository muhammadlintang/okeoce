@extends('layouts.dashboard')

@section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="/dashboard">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Banner</li>
</ol>
<!-- table -->
<div class="card mb-3">
    <div class="card-header">
        <div class="d-flex align-items-center">
            Banner List
            <a href="/dashboard/banner/create" class="btn btn-success ml-auto"><i class="fa fa-plus-circle fa-fw"></i>Add Banner</a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" cellspacing="0" id="tables" style="width: 100%;min-width: 1300px;">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Images</th>
                        <th>Nama File</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Created By</th>
                        <th>Created Time</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
</div>
<script src="{{asset('js/jquery-1.11.1.min.js')}}" type="text/javascript"></script>
<script>
$(document).ready(function () {
    var table = $('#tables').DataTable({
        // dom: 'Bflrtip',

        "processing": true,
        "serverSide": true,
        "ajax":{
                 "url": "/dashboard/banner",
                 "dataType": "json",
                 "type": "POST"
               },

        "columns": [
            { "data": "id" , "name":"id"},
            { "data": "images", "render": function(data, type, row) {
                return '<img src="'+data+'" class="img-dash-table" />';
                }
            },
            { "data": "url_img_banner" , name:"url_img_banner"},
            { "data": "title" , name:"title"},
            { "data": "description" , name:"nama_kel"},
            { "data": "status" , name:"status"},
            { "data": "created_by" , name:"created_by"},
            { "data": "created_time" , name:"created_time"},
            { "data": "option" , name:"option",orderable:false}
        ],
        "order": [[ 0, "desc" ]]
    });
    $('#tables_filter input').unbind();
    $('#tables_filter input').bind('keyup', function(e) {
        if(e.keyCode == 13) {
            table.search(this.value).draw();
        }
    });
});
</script>
@stop












