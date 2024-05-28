@extends('layouts.layout')



@section('main')
 <!-- Default box -->
 <div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">                      
                        <h4 class="card-title">Reporte obtenido por todos los canales</h4>  
                        {{-- <p>Entidades presentes el día de hoy ({{ Carbon\Carbon::now()->format('d-m-Y') }})</p>                    --}}
                    </div><!--end col-->
                    {{-- <div class="col-auto"> 
                        <div class="dropdown">
                            <a href="#" class="btn btn-sm btn-outline-light dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               Todos<i class="las la-angle-down ms-1"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#">Asistio</a>
                                <a class="dropdown-item" href="#">No Asistio</a>
                            </div>
                        </div>         
                    </div><!--end col--> --}}
                </div>  <!--end row-->                                  
            </div><!--end card-header-->
            <div class="card-body">
                {{-- <iframe src="" frameborder="0" class="power-bi-dash"></iframe> --}}
                <iframe title="mac_dat_tot" width="1500" height="800" src="https://app.powerbi.com/view?r=eyJrIjoiYzJhOTkwYTMtNmNkZS00ZGUwLTlmY2EtOTg3MTkzYWUxYzVhIiwidCI6IjM0YjQ4ZTRlLTI1MTktNDA2MC1hMDllLTViMDVkOTAxYTRkNyJ9" frameborder="0" allowFullScreen="true"></iframe>
            </div>
        </div>
    </div>
@endsection