<?php
require_once('../modelo/modeloNota.php');
require_once('../vista/vistaNota.php');

if (isset($_GET['todas'])) {
    $clientes = modeloNota::devolveTodas(); 

    while ($fila = $clientes->fetch(PDO::FETCH_ASSOC)) {
        $clienteArray[] = $fila;
    }
    mostraTaboaCliente($clienteArray); 
}

if (isset($_GET['gardar'])) {
    $mensaxe= 'Nota gardada con exito';
    $nota =  htmlspecialchars( $_GET['nota']);
    $usuario =  htmlspecialchars( $_GET['usuario']);

    $nota = new modeloNota($nota,$usuario);
    
    $idNota= $nota->gardar();

    mostraMensaxeGardado(  $mensaxe, $idNota);
}
if (isset($_GET['id'])) {
    $id= htmlentities($_GET['id']);
    $clientes = modeloNota::mostraPorID($id); 

    while ($fila = $clientes->fetch(PDO::FETCH_ASSOC)) {
        $array[] = $fila;
    }
    mostraNotaBuscada($array); 

}

?>