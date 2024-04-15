<?php
require('../fpdf.php');

class PDF extends FPDF
{
    private $widths;
    private $aligns;

    function SetWidths($w)
    {
        $this->widths = $w;
    }

    function SetAligns($a)
    {
        $this->aligns = $a;
    }

   function Row($data)
{
    $nb = 0;
    for ($i = 0; $i < count($data); $i++) {
        $nb = max($nb, $this->NbLines($this->widths[$i], $data[$i]));
    }
    $h = 10 * $nb;

    $this->CheckPageBreak($h);

    for ($i = 0; $i < count($data); $i++) {
        $w = $this->widths[$i];
        $a = isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';

        $x = $this->GetX();
        $y = $this->GetY();

        $this->Rect($x, $y, $w, $h);

        if ($i == count($data) - 1) {
           
            if (is_file($data[$i])) {
                $this->Image($data[$i], $x, $y, $w, $h);
            }
        } else {
            $this->MultiCell($w, 6, $data[$i], 0, $a);
        }

        $this->SetXY($x + $w, $y);
    }

    $this->Ln($h);
}


    function CheckPageBreak($h)
    {
        if ($this->GetY() + $h > $this->PageBreakTrigger) {
            $this->AddPage($this->CurOrientation);
        }
    }

    function NbLines($w, $txt)
    {
        $cw = $this->w - $this->rMargin - $this->x;
        $wmax = ($w - 2 * $this->cMargin) * 1.05;
        $s = str_replace("\r", '', $txt);
        $nb = strlen($s);
        if ($nb > 0 && $s[$nb - 1] == "\n") {
            $nb--;
        }
        $sep = -1;
        $i = 0;
        $j = 0;
        $l = 0;
        $nl = 1;
        while ($i < $nb) {
            $c = $s[$i];
            if ($c == "\n") {
                $i++;
                $sep = -1;
                $j = $i;
                $l = 0;
                $nl++;
                continue;
            }
            if ($c == ' ') {
                $sep = $i;
            }
            $l += $this->GetStringWidth($c);
            if ($l > $wmax) {
                if ($sep == -1) {
                    if ($i == $j) {
                        $i++;
                    }
                } else {
                    $i = $sep + 1;
                }
                $sep = -1;
                $j = $i;
                $l = 0;
                $nl++;
            } else {
                $i++;
            }
        }
        return $nl;
    }
}

$host = "localhost";
$dbname = "products";
$username = "root";
$password = "";

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 12);

$columns = array("ID", "Name", "Description", "Quantity", "Price", "Active", "Image");
$columnWidths = array(10, 20, 40, 20, 30, 20, 30 );

$pdf->SetWidths($columnWidths);

$pdf->Row($columns);
$pdf->SetFont('Arial', '', 12);
$query = "SELECT id_product, product_name, product_desc, product_qty, product_price, active, product_img FROM products";
$stmt = $db->query($query);
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
$path = '../img/upload/';

foreach ($data as $row) {
    $imagePath = $path . $row['product_img']; 
    $rowData = array(
        $row['id_product'],
        $row['product_name'],
        $row['product_desc'],
        $row['product_qty'],
        $row['product_price'],
        $row['active'],
        $imagePath 
    );
    
    $pdf->Row($rowData);
}


$pdf->Output('D', 'PDF.pdf');

?>

