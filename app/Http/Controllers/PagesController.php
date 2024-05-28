<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Exports\EstadosExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AtencionExport;

class PagesController extends Controller
{
    public function inicio()
    {
        return view('inicio');
    }

    /********************************************************* REPORTES POR ATENCION ***************************************************************/

    public function reporte_atenciones()
    {
        $nom_mac = DB::select("select * 
                                from Par_Nom_Mac
                                where Nom_Mac != 'null'");
        $servicio = DB::select("select * from par_ent");

        return view('reportes.reporte_atenciones', ['nom_mac' => $nom_mac, 'servicio' => $servicio]);
    }

    public function tb_atenciones(Request $request)
    {
        $data = DB::table('cre_atend as c')
                            ->join('par_ent as p', 'c.Ide_ser', '=', 'p.ide_ent')
                            ->select(
                                'c.Nom_mac',
                                'p.nom_ent',
                                'c.Hra_llg',
                                'c.Hra_lla',
                                'c.Tpo_esp',
                                'c.Hra_ini',
                                'c.Tpo_ate',
                                'c.Fin_ate',
                                'c.Tpo_tot',
                                'c.Num_tik',
                                'c.Est_ate',
                                'c.Fec_ate',
                                DB::raw("'Presencial' as presencial"),
                                DB::raw("CASE c.des_pri
                                            WHEN '1' THEN 'NO PREFERENCIAL'
                                            ELSE 'PREFERENCIAL'
                                        END as TIPO_aTE")
                            )
                            ->where(function($query) use ($request) {                                
                                $fecha_I = date("Y-m-d");
                                $fecha_F = date("Y-m-d");
                                if($request->fecha_inicio != '' && $request->fecha_fin != '' ){
                                    $query->where('fec_ate', '>=', $request->fecha_inicio);
                                    $query->where('fec_ate', '<=', $request->fecha_fin);
                                }else{
                                    $query->where('fec_ate', '<=', $fecha_I);
                                    $query->where('fec_ate', '>=', $fecha_F);
                                }
                            })
                            ->where(function($query) use ($request) {
                                if($request->servicio != '' ){
                                    $query->where('Ide_ser', $request->servicio);
                                }
                            })
                            // ->whereIn('Nom_mac', ['MAC Callao', 'MAC Ventanilla'])
                            ->where(function($query) use ($request) {
                                if($request->nom_mac == "0" ){
                                    $query->whereIn('Nom_mac' , [$request->nom_mac]);
                                }
                            })
                            ->orderBy('Nom_mac')
                            ->orderBy('Fec_ate')
                            ->get();
        
        // dd($data);
        return view('reportes.tablas.tb_atenciones', ['data' => $data]);
    }

    public function atencion_excel(Request $request)
    {
        if($request->nom_mac == ""){
            $nombre_mac = 'TODOS';
        }else{
            $nombre_mac = $request->nom_mac;
        }
        $servicio = DB::table('par_ent')->where('ide_ent', $request->servicio)->first();
        $nombre_entidad = $servicio->nom_ent;

        $fecha_inicio = $request->fecha_inicio;
        $fecha_fin = $request->fecha_fin;

        $query = DB::table('cre_atend as c')
                            ->join('par_ent as p', 'c.Ide_ser', '=', 'p.ide_ent')
                            ->select(
                                'c.Nom_mac',
                                'p.nom_ent',
                                'c.Hra_llg',
                                'c.Hra_lla',
                                'c.Tpo_esp',
                                'c.Hra_ini',
                                'c.Tpo_ate',
                                'c.Fin_ate',
                                'c.Tpo_tot',
                                'c.Num_tik',
                                'c.Est_ate',
                                'c.Fec_ate',
                                DB::raw("'Presencial' as presencial"),
                                DB::raw("CASE c.des_pri
                                            WHEN '1' THEN 'NO PREFERENCIAL'
                                            ELSE 'PREFERENCIAL'
                                        END as TIPO_aTE")
                            )
                            ->where(function($query) use ($request) {                                
                                $fecha_I = date("Y-m-d");
                                $fecha_F = date("Y-m-d");
                                if($request->fecha_inicio != '' && $request->fecha_fin != '' ){
                                    $query->where('fec_ate', '>=', $request->fecha_inicio);
                                    $query->where('fec_ate', '<=', $request->fecha_fin);
                                }else{
                                    $query->where('fec_ate', '<=', $fecha_I);
                                    $query->where('fec_ate', '>=', $fecha_F);
                                }
                            })
                            ->where(function($query) use ($request) {
                                if($request->servicio != '' ){
                                    $query->where('Ide_ser', $request->servicio);
                                }
                            })
                            // ->whereIn('Nom_mac', ['MAC Callao', 'MAC Ventanilla'])
                            ->where(function($query) use ($request) {
                                if($request->nom_mac == "0" ){
                                    $query->whereIn('Nom_mac' , [$request->nom_mac]);
                                }
                            })
                            ->orderBy('Nom_mac')
                            ->orderBy('Fec_ate')
                            ->get();


        $export = Excel::download(new AtencionExport($query, $nombre_mac ,$fecha_inicio, $fecha_fin, $nombre_entidad), 'REPORTE '. $nombre_mac .'.xlsx');

        return $export;
    }

    /********************************************************* REPORTES POR ESTADO ***************************************************************/

    public function reporte_atenciones_estado(Request $request)
    {
        // $data = DB::table('dbo.cre_atend')->limit(100)->get();

        // dd($data);

        $nom_mac = DB::select("select * 
                                from Par_Nom_Mac
                                where Nom_Mac != 'null'");


        return view('reportes.reporte_atenciones_estado', ['nom_mac' => $nom_mac]);
    }

    public function tb_ate_estado(Request $request)
    {

        $fecha_actual = Carbon::now()->format('Y-m-d');        

        //  dd($fecha_actual);
         $startDate = $request->input('fecha_inicio', $fecha_actual);
         $endDate = $request->input('fecha_fin', $fecha_actual );
         $nom_mac_filter = $request->input('nom_mac', null); 

         $nom_mac_condition = '';
         if ($nom_mac_filter !== null) {
             $nom_mac_condition = "WHERE PivotTable.Nom_mac = '$nom_mac_filter'";
         }
         
         
         $query = "SELECT PivotTable.Nom_mac,
                          TotalRegistros,
                          ISNULL([Abandono], 0) AS Abandono,
                            ISNULL([Llamando], 0) AS Llamando,
                            ISNULL([Cancelado], 0) AS Cancelado,
                            ISNULL([Atención Cerrada], 0) AS Atencion_Cerrada,
                            ISNULL([En espera], 0) AS En_espera,
                            ISNULL([Error de selección], 0) AS Error_de_seleccion,
                            ISNULL([Terminado], 0) AS Terminado,
                            ISNULL([Atención Iniciada], 0) AS Atencion_Iniciada
                   FROM (
                       SELECT Nom_mac, Est_ate, COUNT(*) AS Cantidad
                       FROM cre_atend
                       WHERE fec_ate BETWEEN '$startDate' AND '$endDate'
                       GROUP BY Nom_mac, Est_ate
                   ) AS SourceTable
                   PIVOT (
                       SUM(Cantidad)
                       FOR Est_ate IN ([Abandono], [Llamando], [Cancelado], [Atención Cerrada], [En espera], [Error de selección], [Terminado], [Atención Iniciada], [0])
                   ) AS PivotTable
                   JOIN (
                       SELECT Nom_mac, COUNT(distinct ide_ate) AS TotalRegistros
                       FROM cre_atend
                       WHERE fec_ate BETWEEN '$startDate' AND '$endDate'
                       AND ide_ser <> 130
                       GROUP BY Nom_mac
                   ) AS TotalTable ON PivotTable.Nom_mac = TotalTable.Nom_mac
                   $nom_mac_condition
                   ORDER BY Nom_mac ASC";

        $data = DB::select($query);


        //dd($data);

        return view('reportes.tablas.tb_ate_estado', ['data' => $data]);
    }

    public function estado_excel(Request $request)
    {
        $fecha_actual = Carbon::now()->format('Y-m-d');        

        //  dd($fecha_actual);
         $startDate = $request->input('fecha_inicio', $fecha_actual);
         $endDate = $request->input('fecha_fin', $fecha_actual );
         $nom_mac_filter = $request->input('nom_mac', null); 

         $nom_mac_condition = '';
         if ($nom_mac_filter !== null) {
             $nom_mac_condition = "WHERE PivotTable.Nom_mac = '$nom_mac_filter'";
         }
         
         
         $data = "SELECT PivotTable.Nom_mac,
                          TotalRegistros,
                          ISNULL([Abandono], 0) AS Abandono,
                            ISNULL([Llamando], 0) AS Llamando,
                            ISNULL([Cancelado], 0) AS Cancelado,
                            ISNULL([Atención Cerrada], 0) AS Atencion_Cerrada,
                            ISNULL([En espera], 0) AS En_espera,
                            ISNULL([Error de selección], 0) AS Error_de_seleccion,
                            ISNULL([Terminado], 0) AS Terminado,
                            ISNULL([Atención Iniciada], 0) AS Atencion_Iniciada
                   FROM (
                       SELECT Nom_mac, Est_ate, COUNT(*) AS Cantidad
                       FROM cre_atend
                       WHERE fec_ate BETWEEN '$startDate' AND '$endDate'
                       GROUP BY Nom_mac, Est_ate
                   ) AS SourceTable
                   PIVOT (
                       SUM(Cantidad)
                       FOR Est_ate IN ([Abandono], [Llamando], [Cancelado], [Atención Cerrada], [En espera], [Error de selección], [Terminado], [Atención Iniciada], [0])
                   ) AS PivotTable
                   JOIN (
                       SELECT Nom_mac, COUNT(distinct ide_ate) AS TotalRegistros
                       FROM cre_atend
                       WHERE fec_ate BETWEEN '$startDate' AND '$endDate'
                       AND ide_ser <> 130
                       GROUP BY Nom_mac
                   ) AS TotalTable ON PivotTable.Nom_mac = TotalTable.Nom_mac
                   $nom_mac_condition
                   ORDER BY Nom_mac ASC";

        $query = DB::select($data);

        $export = Excel::download(new EstadosExport($query), 'REPORTE DE ESTADOS.xlsx');

        return $export;
    }


}
