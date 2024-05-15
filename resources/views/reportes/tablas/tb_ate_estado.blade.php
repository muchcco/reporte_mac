<table class="table table-hover table-bordered" id="table_estado">
    <thead class="table-dark">
        <tr>
            <th rowspan="2">N°</th>
            <th rowspan="2">CENTRO MAC</th>
            <th rowspan="2">TOTAL</th>
            <th colspan="8">ESTADOS</th>
        </tr>
        <tr>        
            <th>TERMINADO</th>
            <th>ABANDONO</th>
            <th>LLAMANDO</th>
            <th>CANCELADO</th>
            <th>ATENCIÓN CERRADA</th>
            <th>EN ESPERA</th>
            <th>ERROR DE SELECCION</th>
            <th>ATENCIÓN INICIADA</th>
        </tr>
    </thead>
    <tbody>
        @foreach  ($data as $i => $dat)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $dat->Nom_mac }}</td>
                <td>{{ $dat->TotalRegistros }}</td>
                <td>{{ $dat->Terminado }}</td>
                <td>{{ $dat->Abandono }}</td>
                <td>{{ $dat->Llamando }}</td>
                <td>{{ $dat->Cancelado }}</td>
                <td>{{ $dat->Atencion_Cerrada }}</td>
                <td>{{ $dat->En_espera }}</td>
                <td>{{ $dat->Error_de_seleccion }}</td>
                <td>{{ $dat->Atencion_Iniciada }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
    
<script>
    $(document).ready(function() {
    
        $('#table_estado').DataTable({
        "responsive": true,
        "bLengthChange": true,
        "autoWidth": false,
        "searching": true,
        pageLength : 50,
        info: true,
        "ordering": false,
        language: {"url": "{{ asset('js/Spanish.json')}}"}, 
        columnDefs: [
            { targets: 'no-sort', orderable: false }
        ],
        "columns": [
            { "width": "" },
            { "width": "" },
            { "width": "" },
            { "width": "" },
            { "width": "" },
            { "width": "" },
            { "width": "" },
            { "width": "" },
            { "width": "" },
            { "width": "" },
            { "width": ""}
        ]
    });
    
        tippy(".bandejTool", {
            allowHTML: true,
            followCursor: true,
        });
    });
</script>