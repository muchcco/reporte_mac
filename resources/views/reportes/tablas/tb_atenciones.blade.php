<table class="table table-hover table-bordered" id="table_atencion">
    <thead class="table-dark">
        <tr>        
            <th>CENTRO MAC</th>
            <th>ENTIDAD</th>
            <th>HORA LLEGADA</th>
            <th>HORA LLAMADO</th>
            <th>TIEMPO ESPERA</th>
            <th>HORA INICIO</th>
            <th>TIEMPO ATENCION</th>
            <th>FIN DE ATENCION</th>
            <th>TIEMPO TOTAL</th>
            <th>NUMERO DE TICKET</th>
            <th>ESTADO ATENCION</th>
            <th>FECHA DE ATENCION</th>
            <th>CANAL DE ATENCION</th>
            <th>TIPO DE ATENCION</th>
        </tr>
    </thead>
    <tbody>
        @foreach  ($data as $i => $dat)
            <tr>
                <td>{{ $dat->Nom_mac }}</td>
                <td>{{ $dat->nom_ent }}</td>
                <td>{{ $dat->Hra_llg }}</td>
                <td>{{ $dat->Hra_lla }}</td>
                <td>{{ $dat->Tpo_esp }}</td>
                <td>{{ $dat->Hra_ini }}</td>
                <td>{{ $dat->Tpo_ate }}</td>
                <td>{{ $dat->Fin_ate }}</td>
                <td>{{ $dat->Tpo_tot }}</td>
                <td>{{ $dat->Num_tik }}</td>
                <td>{{ $dat->Est_ate }}</td>
                <td>{{ $dat->Fec_ate }}</td>
                <td>{{ $dat->presencial }}</td>
                <td>{{ $dat->TIPO_aTE }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
    
<script>
    $(document).ready(function() {
    
        $('#table_atencion').DataTable({
        "responsive": true,
        "bLengthChange": true,
        "autoWidth": false,
        "searching": true,
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