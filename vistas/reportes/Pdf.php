<?php 

require_once 'tcpdf/tcpdf.php';
class Pdf extends TCPDF
{
    public function Header() {
    /*ponemos color al texto y a las lineas */
    //colocamos la ruta de la imagen de la cabecera.

    //$direct="../img/casas.png"; 
    //$this->Image($direct,10,10,250,25,'','','N','','','C');
    /* modificamos tipografia para el subtitulo
    e insertamos este */
     
    /*trazamos una linea roja debajo del encabezado */
    //$this->Line(19,25,200,25);       
}
     public function Footer() {
    /* establecemos el color del texto */
    /* insertamos numero de pagina y total de paginas*/
    $this->Cell(0, 1, 'Pagina '.$this->getAliasNumPage(). ' de un total de '. $this-> getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
         
    /* dibujamos una linea roja delimitadora del pie de página */
    //$this->Line(19,282,200,282);
}
}
/* siat-svo/reportes/Pdf.php */
