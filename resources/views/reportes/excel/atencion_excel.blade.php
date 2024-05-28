<table >
    <tr>                        
        <th style="border: 1px solid black" rowspan="3" colspan="2"></th>
        <th style="border: 1px solid black" colspan="9" rowspan="2">REPORTE DE ATENCIONES</th>
        <th style="border: 1px solid black"> TIPO</th>
        <th style="border: 1px solid black" colspan="2">REPORTERIA</th>
    </tr>
    <tr>
        <th style="border: 1px solid black">Versión</th>
        <th style="border: 1px solid black" colspan="2">1.2.0</th>
    </tr>
    <tr>
        <th style="border: 1px solid black">Centro MAC</th>
        <th style="border: 1px solid black" colspan="2" > {{ $nombre_mac }} </th>
        <th style="border: 1px solid black">Entidad</th>
        <th style="border: 1px solid black" colspan="2" > {{ $nombre_entidad }} </th>
        <th style="border: 1px solid black">Fecha:</th>
        <th style="border: 1px solid black" colspan="5" > De:  {{ $fecha_inicio }} hasta {{ $fecha_fin }} </th>
    </tr>
</table>

<table class="table table-hover table-bordered" id="table_estado">
    <thead class="table-dark">
        <tr>        
            <th style="color: white; border: 1px solid black; background-color: #4472C4;">CENTRO MAC</th>
            <th style="color: white; border: 1px solid black; background-color: #4472C4;">ENTIDAD</th>
            <th style="color: white; border: 1px solid black; background-color: #4472C4;">HORA DE LLEGADA</th>
            <th style="color: white; border: 1px solid black; background-color: #4472C4;">HORA DE LLAMADO</th>
            <th style="color: white; border: 1px solid black; background-color: #4472C4;">TIEMPO DE ESPERA</th>
            <th style="color: white; border: 1px solid black; background-color: #4472C4;">HORA DE INICIO</th>
            <th style="color: white; border: 1px solid black; background-color: #4472C4;">TIEMPO DE ATENCION</th>
            <th style="color: white; border: 1px solid black; background-color: #4472C4;">FIN DE ATENCION</th>
            <th style="color: white; border: 1px solid black; background-color: #4472C4;">TIEMPO TOTAL</th>
            <th style="color: white; border: 1px solid black; background-color: #4472C4;">NUMERO DE TICKET</th>
            <th style="color: white; border: 1px solid black; background-color: #4472C4;">ESTADO DE ATENCION</th>
            <th style="color: white; border: 1px solid black; background-color: #4472C4;">FECHA DE ATENCION</th>
            <th style="color: white; border: 1px solid black; background-color: #4472C4;">CANAL DE ATENCION</th>
            <th style="color: white; border: 1px solid black; background-color: #4472C4;">TIPO DE ATENCION</th>
        </tr>
    </thead>
    <tbody>
        @foreach  ($query as $i => $dat)
            <tr>
                <td style="border: 1px solid black">{{ $dat->Nom_mac }}</td>
                <td style="border: 1px solid black">{{ $dat->nom_ent }}</td>
                <td style="border: 1px solid black">{{ $dat->Hra_llg }}</td>
                <td style="border: 1px solid black">{{ $dat->Hra_lla }}</td>
                <td style="border: 1px solid black">{{ $dat->Tpo_esp }}</td>
                <td style="border: 1px solid black">{{ $dat->Hra_ini }}</td>
                <td style="border: 1px solid black">{{ $dat->Tpo_ate }}</td>
                <td style="border: 1px solid black">{{ $dat->Fin_ate }}</td>
                <td style="border: 1px solid black">{{ $dat->Tpo_tot }}</td>
                <td style="border: 1px solid black">{{ $dat->Num_tik }}</td>
                <td style="border: 1px solid black">{{ $dat->Est_ate }}</td>
                <td style="border: 1px solid black">{{ $dat->Fec_ate }}</td>
                <td style="border: 1px solid black">{{ $dat->presencial }}</td>
                <td style="border: 1px solid black">{{ $dat->TIPO_aTE }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
