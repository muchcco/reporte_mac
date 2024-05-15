@extends('layouts.layout')

@section('estilos')

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link href="{{ asset('assets/datatables/datatables.min.css')}}" rel="stylesheet" />

<style>
    
</style>

@endsection

@section('main')

<div class="col-12">
    <div class="card ">
        <div class="card-header ">
          FILTROS DE BUSQUEDA
        </div>
        <div class="card-body">
          <div class="row">
            @php
                $fecha6dias = date("d-m-Y",strtotime(now()));
                $fecha6diasconvert = date("Y-m-d",strtotime($fecha6dias));
            @endphp
            <div class="col-md-2">
                <div class="form-group">
                    <label class="mb-3">Fecha Inicio:</label>
                    <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control" value="{{$fecha6diasconvert}}">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label class="mb-3">Fecha Fin:</label>
                    <input type="date" name="fecha_fin" id="fecha_fin" class="form-control" value="{{$fecha6diasconvert}}">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label class="mb-3">Centro MAC:</label>
                    <select name="nom_mac" id="nom_mac" class="form-control select22">
                        <option value="">Todos</option>
                        @forelse ($nom_mac as $n)
                            <option value="{{ $n->Nom_Mac }}">{{ $n->Nom_Mac }}</option>
                        @empty
                            <option value="">No hay datos disponibles</option>
                        @endforelse
                    </select>
                </div>
            </div>
          </div>
        </div>
        <div class="card-footer">
            <button class="btn btn-primary" id="filtro" onclick="execute_filter()">Buscar</button>
            <button class="btn btn-secondary" id="limpiar">limpiar</button>
            <button class="btn btn-success" onclick="ExportEXCEL()">Exportar</button>
        </div>
      </div>
</div>
<br />
<div class="col-12">
    <div class="card ">
        <div class="card-header ">
            RESULTADOS
        </div>
        <div class="card-body">
            <p id="resultado">Sin resultado en la búsqueda... </p>
            <div class="table-responsive" id="table_data">
                
            </div>
        </div>
    </div>
</div>
   

@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="{{ asset('assets/datatables/datatables.min.js') }}"></script>

<script>
$(document).ready(function() {
    tabla_seccion();
    $(".select22").select2();
});

function tabla_seccion(fecha_inicio = '',  fecha_fin = '', nom_mac = '') {
    $.ajax({
        type: 'GET',
        url: "{{ route('reportes.tablas.tb_ate_estado') }}", // Ruta que devuelve la vista en HTML
        data: {fecha_inicio : fecha_inicio, fecha_fin: fecha_fin, nom_mac : nom_mac},
        beforeSend: function () {
            document.getElementById('resultado').style.display = 'none';
            document.getElementById("table_data").innerHTML = '<i class="fa fa-spinner fa-spin"></i> ESPERE LA TABLA ESTA CARGANDO... ';
        },
        success: function(data) {
            $('#table_data').html(data); // Inserta la vista en un contenedor en tu página
            document.getElementById('resultado').style.display = 'none';

        },
        error: function(error){
            // tabla_seccion();
        }
    });
}
/**************************************************************** CARGAR COMBOS POR FECHA ACTUAL *************************************************************/

// EJECUTA LOS FILTROS Y ENVIA AL CONTROLLADOR PARA  MOSTRAR EL RESULTADO EN LA TABLA
var execute_filter = () =>{
   var fecha_inicio = $('#fecha_inicio').val();
    var fecha_fin = $('#fecha_fin').val();
    var nom_mac = $('#nom_mac').val();
   $.ajax({
        type:'get',
        url: "{{ route('reportes.tablas.tb_ate_estado') }}" ,
        dataType: "",
        data: {fecha_inicio : fecha_inicio, fecha_fin : fecha_fin, nom_mac: nom_mac},
        beforeSend: function () {
            document.getElementById("filtro").innerHTML = '<i class="fa fa-spinner fa-spin"></i> Buscando';
            document.getElementById("filtro").style.disabled = true;
        },
        success:function(data){
            document.getElementById("filtro").innerHTML = '<i class="fa fa-search"></i> Buscar';
            document.getElementById("filtro").style.disabled = false;
            tabla_seccion(fecha_inicio, fecha_fin, nom_mac);
        },
        error: function(xhr, status, error){
            console.log("error");
            console.log('Error:', error);
        }
   });
}

$("#limpiar").on("click", function(e) {

 // Obtener la fecha actual
 var today = new Date();
    var year = today.getFullYear();
    var month = (today.getMonth() + 1).toString().padStart(2, '0'); // Meses de 0-11, así que sumamos 1
    var day = today.getDate().toString().padStart(2, '0'); // Añadir ceros a la izquierda si es necesario
    
    var currentDate = year + '-' + month + '-' + day;

    // Establecer los valores de fecha de inicio y fin a la fecha actual
document.getElementById('fecha_inicio').value = currentDate;
document.getElementById('fecha_fin').value = currentDate;
document.getElementById('nom_mac').value = "";

tabla_seccion();

})

var ExportEXCEL = () => {
    var fecha_inicio = document.getElementById('fecha_inicio').value;
    var fecha_fin = document.getElementById('fecha_fin').value;
    var nom_mac = document.getElementById('nom_mac').value;

    // Define the route for exporting the report to Excel
    var link_up = "{{ route('reportes.excel.estado_excel') }}";

    // Create the URL with the variables as query parameters
    var href = link_up + '?fecha_inicio=' + fecha_inicio + '&fecha_fin=' + fecha_fin + '&nom_mac=' + nom_mac;

    console.log(href);

    // Open the URL in the same tab
    window.location.href = href;
};


</script>
@endsection
