<?php
require 'vendor/autoload.php'; 


$host = 'localhost';
$dbname = 'products';
$username = 'root';
$password = '';


$db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);


$query = "SELECT id_product , product_name , product_desc , product_qty , product_price, active FROM products";

$stmt = $db->prepare($query);
$stmt->execute();


$spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
$worksheet = $spreadsheet->getActiveSheet();

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx; 
try {
$worksheet->getColumnDimension('B')->setWidth(20);
$worksheet->setCellValue('B2', 'ID#');
$worksheet->getColumnDimension('C')->setWidth(20);
$worksheet->setCellValue('C2', 'Product Name');
$worksheet->getColumnDimension('D')->setWidth(30);
$worksheet->setCellValue('D2', 'Description');
$worksheet->getColumnDimension('E')->setWidth(20);
$worksheet->setCellValue('E2', 'Quantity');
$worksheet->getColumnDimension('F')->setWidth(20);
$worksheet->setCellValue('F2', 'Price');
$worksheet->getColumnDimension('G')->setWidth(20);
$worksheet->setCellValue('G2', 'Status');


$startCell = 'B2';
$endCell = 'G6';

for ($row = $startCell[1]; $row <= $endCell[1]; $row++) {
    for ($col = ord($startCell[0]); $col <= ord($endCell[0]); $col++) {
        $cell = chr($col) . $row; 
        $style = $worksheet->getCell($cell)->getStyle();
        $style->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
    }
}


$row = 3; 
while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $worksheet->setCellValue('B' . $row, $data['id_product']);
    $worksheet->setCellValue('C' . $row, $data['product_name']);
    $worksheet->setCellValue('D' . $row, $data['product_desc']);
    $worksheet->setCellValue('E' . $row, $data['product_qty']);
    $worksheet->setCellValue('F' . $row, $data['product_price']);
    $worksheet->setCellValue('G' . $row, $data['active']);
    $row++;
}

    $writer = new Xlsx($spreadsheet);
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="Excel.xlsx"');
    header('Cache-Control: max-age=0');

   
    $writer->save('php://output');
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}
 
?>