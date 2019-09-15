<?php
ob_start();
 session_start();
 include 'funciones.php';
 if(!isset($_SESSION['usuario'])){
   header('Location:../index.php');
 }

require __DIR__.'/vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

$html2pdf = new Html2Pdf();


$html2pdf->writeHTML('
<div style="background-image: url(../assets/images/quebecpdf.jpg); height: 95%; width: 100%; padding: 20px">
    <p style="float:right; margin-left: 500px">Ciudad de México, '.fecha().'</p>
    <br>
    <br>
    <b>QUEBEC + Consultores S. A. DE C. V.</b>
    <p>Responsiva de equipo de cómputo.</p>
    <br>
    <p>Sirva este comprobante de entrega de equipo de cómputo.</p>
    <br>
    '.tabla().tablaEquipos().returnTable().'
    
    <br>
    '.tablaP().tablaPerifericos().returnTable().'
    <br>
    <p>Se entrega a <u>'.verNombreCarta().'</u> para el mejor desarrollo de sus funciones, 
    quien a partir del día <u>'.fecha().'</u> del presente se compromete a resguardarlo y
    darle un uso estrictamente laboral.</p>

    <br>
    <br>

    <p>Asimismo, hacemos de su conocimiento que no podrá intercambiar el equipo asignado, modificar la configuración del equipo ni instalar software sin ser previamente autorizado.</p>
    <br>
    <p>Se anexa evidencia fotográfica sobre el estado actual con el que se otorga.</p>   
    <p>Sin más por el momento, quedo a sus órdenes.</p> 
    <p>Atentamente</p>
    <br>


    <div>
        <table>
         <tr>
            <td><b>Receptor</b></td>
            <td><b>Otorga</b></td>
            <td><b>Administración</b></td>
         </tr>
         <tr>
            <td></td>
            <td></td>
            <td></td>
         </tr>
         <tr>
            <td></td>
             <td></td>
            <td></td>
         </tr>
         <tr>
            <td>___________________________</td>
            <td>___________________________</td>
            <td>___________________________</td>
         </tr>
         <tr>
            <td><b>'.verNombreCarta().'</b></td>
            <td><b>ISC. Efrén Benítez González</b></td>
            <td><b>Lic. David Martínez Ramírez</b></td>
         </tr>
         <tr>
            <td></td>
            <td></td>
            <td></td>
         </tr>
         <tr>
            <td></td>
            <td></td>
            <td></td>
         </tr>
         <tr>
            <td><b>'.verCorreoCarta().'</b></td>
            <td><b>División de Tecnologías de la Información</b></td>
            <td><b>División de Administración</b></td>
         </tr>

        </table>
    </div>

    </div>
');
$content = ob_get_clean();
$html2pdf->output();
?>