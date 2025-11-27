<?php

namespace App\Exports;

use App\Models\Category;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
// use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class CategoryExport implements FromCollection, WithHeadings, WithMapping , WithStyles, ShouldAutoSize
{
    public function collection()
    {
        return Category::select('id','name','description','created_at')->get();
    }

    public function map($category): array
    {
        return [
            $category->id,
            $category->name,
            $category->description,
            $category->created_at->timezone('Asia/Jakarta')->format('d/m/Y H:i:s')
        ];
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nama Kategori',
            'Deskripsi',
            'Dibuat Pada',
        ];
    }

    // public function styles(Worksheet $sheet)
    // {
    //     return [
    //         1 => [ // Row ke-1 (header)
    //             'font' => ['bold' => true],
    //             'alignment' => ['horizontal' => 'center', 'vertical' => 'center']
    //         ],
    //     ];
    // }

    public function styles(Worksheet $sheet)
    {
    $sheet->getStyle('A1:D1')->applyFromArray([
        'font' => [
            'bold' => true,
            'color' => ['rgb' => 'FFFFFF'],
        ],
        'fill' => [
            'fillType' => 'solid',
            'startColor' => ['rgb' => '0070C0'], // biru
        ],
        'alignment' => [
            'horizontal' => 'center',
            'vertical'   => 'center',
        ],
        'borders' => [
            'allBorders' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                'color' => ['rgb' => '000000'],
            ],
        ]
    ]);
    }
}
