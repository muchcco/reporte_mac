<?php

namespace App\Exports;

use App\Models\Asistencia;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Color;

use PhpOffice\PhpSpreadsheet\Style\Style;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithDefaultStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithBackgroundColor;

use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use PhpOffice\PhpSpreadsheet\Worksheet\MemoryDrawing;
use Maatwebsite\Excel\Concerns\WithDrawings;

use Maatwebsite\Excel\Concerns\WithTitle;

class AtencionExport implements FromView, WithDefaultStyles, ShouldAutoSize,  WithDrawings, WithStyles, WithTitle
{
    protected $query;
    protected $nombre_mac;
    protected $fecha_inicio;
    protected $fecha_fin;
    protected $nombre_entidad;

    function __construct($query, $nombre_mac, $fecha_inicio , $fecha_fin, $nombre_entidad) {
        $this->query = $query;
        $this->nombre_mac = $nombre_mac;
        $this->fecha_inicio = $fecha_inicio;
        $this->fecha_fin = $fecha_fin;
        $this->nombre_entidad = $nombre_entidad;
    }
    
    public function view(): View
    {
        return view('reportes.excel.atencion_excel', [
            'query' => $this->query,
            'nombre_mac' => $this->nombre_mac,
            'fecha_inicio' => $this->fecha_inicio,
            'fecha_fin' => $this->fecha_fin,
            'nombre_entidad' => $this->nombre_entidad,
        ]);
    }

    public function defaultStyles(Style $defaultStyle)
    {
        // Configure the default styles
        return $defaultStyle->getFill()->setFillType(Fill::FILL_SOLID);
    
        // Configura el relleno de celda
        return [
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => ['argb' => '000'], // Color negro
            ],
        ];
    }

    public function drawings()
    {
        $drawing = new Drawing();
        $drawing->setName('Logo');
        $drawing->setDescription('This is my logo');
        $drawing->setPath(public_path('imagen/mac_logo_export.jpg'));
        $drawing->setHeight(50);
        $drawing->setCoordinates('A1');

        return [$drawing];
    
        // Si $this->identidad es igual a '17', no devuelvas ningún dibujo
        return [];

        
    }

    public function styles(Worksheet $sheet)
    {
        // Aplicar estilo para centrar el texto en todas las celdas de la hoja
        $sheet->getStyle($sheet->calculateWorksheetDimension())->applyFromArray([
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
            ],
        ]);
    }

    public function title(): string
    {
        // return $this->datos_persona->NOMBREU;
        return 'DATA';
    }
}
