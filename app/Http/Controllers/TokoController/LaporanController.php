<?php

namespace App\Http\Controllers\TokoController;
// require 'vendor/autoload.php';
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Models\Transaction;
use App\Models\Product;

class LaporanController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->home = route('home');
        $this->current = route('lapIndex');
    }
    public function index()
    {
        $tahun=range(2000,2030);
        return view('tokoku.laporan.index',[
            'bulan'=> $this->bulan,
            'tahun'=> $tahun,
        ]);
    }
    public $bulan=[
        'Januari'=>'01',
        'Februari'=>'02',
        'Maret'=>'03',
        'April'=>'04',
        'Mei'=>'05',
        'Juni'=>'06',
        'Juli' => '07',
        'Agustus' => '08',
        'September' => '09',
        'Oktober' => '10',
        'November' => '11',
        'Desember' => '12'
    ];


    public function exportLaporan(Request $request)
    {   
        
        
        // $productdata=Product::OrderBy('code')->get()->toArray();
        // // var_dump($productdata);
        



        // $spreadsheet = new Spreadsheet();
        // $sheet = $spreadsheet->getActiveSheet();

        
        // $sheet->setCellValue('A1', 'Laporan Keuangan Bulanan Toko Noor Electric')
        //       ->setCellValue('B2', 'Kode Barang')
        //       ->setCellValue('C2', 'Nama Barang')
        //       ->setCellValue('D2', 'Harga Barang')
        //       ->setCellValue('E2', 'Stok Peringatan');
        // $i=3;
        // foreach ($productdata as $key => $value) {
        //     $sheet->setCellValue('C'.strval($i),$value['name'])
        //         ->setCellValue('B'.strval($i),$value['code'])
        //         ->setCellValue('D'.strval($i),$value['price'])
        //         ->setCellValue('E'.strval($i),$value['warn_stock']);
        // }


        // $writer = new Xlsx($spreadsheet);
        // header("Content-Type: application/vnd.ms-excel");
        // header('Content-Disposition: attachment;filename="laporanbulanan-export.xlsx"');
        // $writer->save('php://output');

        
    }
}
