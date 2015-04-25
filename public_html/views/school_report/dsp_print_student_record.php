<?php

$pdf = new ZREPORT;
ob_start();
?>
<?php
$html = ob_get_clean();
$pdf->writeHTML($html, true, 0, true, 0);
// reset pointer to the last page
$pdf->lastPage();
// ---------------------------------------------------------
//Close and output PDF document
$pdf->Output('print.pdf', 'I');
