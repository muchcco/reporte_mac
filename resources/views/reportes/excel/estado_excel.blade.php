<table >
    <tr>                        
        <th style="border: 1px solid black" rowspan="3" colspan="2"></th>
        <th style="border: 1px solid black" colspan="6" rowspan="2">REPORTE DE ATENCIONES</th>
        <th style="border: 1px solid black"> Código</th>
        <th style="border: 1px solid black" colspan="2"></th>
    </tr>
    <tr>
        <th style="border: 1px solid black">Versión</th>
        <th style="border: 1px solid black" colspan="2">1.0.0</th>
    </tr>
    <tr>
        <th style="border: 1px solid black">CENTROS MAC</th>
        <th style="border: 1px solid black"></th>
        <th style="border: 1px solid black" colspan="2"></th>
        <th style="border: 1px solid black" colspan="5" ></th>
    </tr>
</table>


<table class="table table-hover table-bordered" id="table_estado">
    <thead class="table-dark">
        <tr>
            <th rowspan="2" style="border: 1px solid black">N°</th>
            <th rowspan="2" style="border: 1px solid black">CENTRO MAC</th>
            <th rowspan="2" style="border: 1px solid black">TOTAL</th>
            <th colspan="8" style="border: 1px solid black">ESTADOS</th>
        </tr>
        <tr>        
            <th style="border: 1px solid black">TERMINADO</th>
            <th style="border: 1px solid black">ABANDONO</th>
            <th style="border: 1px solid black">LLAMANDO</th>
            <th style="border: 1px solid black">CANCELADO</th>
            <th style="border: 1px solid black">ATENCIÓN CERRADA</th>
            <th style="border: 1px solid black">EN ESPERA</th>
            <th style="border: 1px solid black">ERROR DE SELECCION</th>
            <th style="border: 1px solid black">ATENCIÓN INICIADA</th>
        </tr>
    </thead>
    <tbody>
        @foreach  ($query as $i => $dat)
            <tr>
                <td style="border: 1px solid black">{{ $i + 1 }}</td>
                <td style="border: 1px solid black">{{ $dat->Nom_mac }}</td>
                <td style="border: 1px solid black">{{ $dat->TotalRegistros }}</td>
                <td style="border: 1px solid black">{{ $dat->Terminado }}</td>
                <td style="border: 1px solid black">{{ $dat->Abandono }}</td>
                <td style="border: 1px solid black">{{ $dat->Llamando }}</td>
                <td style="border: 1px solid black">{{ $dat->Cancelado }}</td>
                <td style="border: 1px solid black">{{ $dat->Atencion_Cerrada }}</td>
                <td style="border: 1px solid black">{{ $dat->En_espera }}</td>
                <td style="border: 1px solid black">{{ $dat->Error_de_seleccion }}</td>
                <td style="border: 1px solid black">{{ $dat->Atencion_Iniciada }}</td>
            </tr>
        @endforeach
    </tbody>
</table>