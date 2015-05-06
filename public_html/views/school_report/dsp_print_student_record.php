<?php

//$pdf = new ZREPORT;
//ob_start();
//?>
//<?php
//$html = ob_get_clean();
//$pdf->writeHTML($html, true, 0, true, 0);
//// reset pointer to the last page
//$pdf->lastPage();
//// ---------------------------------------------------------
////Close and output PDF document
//$pdf->Output('print.pdf', 'I');

?>
<table width="100%" border="1">
    <tr>
        <td>Cột1</td>
        <td>Cột2</td>
        <td>Cột3</td>
    </tr>
    <tr>
        <td>Cột1</td>
        <td>Cột2</td>
        <td>Cột3</td>
    </tr>
</table>
 <script type="text/javascript" src="<?php echo PUBLIC_URL; ?>js/jquery-2.1.3.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
       window.print() ;
    });
</script>
