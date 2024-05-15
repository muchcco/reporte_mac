@extends('layouts.layout')

@section('title_page')
<h1>
    REPORTES
    {{-- <small>it all starts here</small> --}}
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="#">Reportes</a></li>
    <li class="active">Reportes por atenciones</li>
  </ol>
    
@endsection



@section('main')
 <!-- Default box -->
 <div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">REPORTES ATENCIONES</h3>
    <div class="box-tools pull-right">
      <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
      <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
    </div>
  </div>
  <div class="box-body">
    Start creating your amazing application!
  </div><!-- /.box-body -->
  <div class="box-footer">
    Footer
  </div><!-- /.box-footer-->
</div><!-- /.box -->
@endsection