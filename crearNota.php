<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/styles.css" >
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous">
    </script>
</head>

<body>
    <header class="p-3 bg-dark text-white">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-text" viewBox="0 0 16 16">
                        <path d="M5 4a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm-.5 2.5A.5.5 0 0 1 5 6h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zM5 8a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm0 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1H5z" />
                        <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z" />
                    </svg>
                </a>

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="#" class="nav-link px-2 text-secondary">Notas</a></li>
                </ul>

                <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3"  action="buscarNota.php" method="get">

                        <input type="int" class="form-control form-control-dark id" placeholder="Buscar..." name="id" id="id" aria-label="Search">
                        
                </form>
                    <div class="text-end">
                            <button class="btn btn-warning" type="submit" name="buscar" onclick="buscar()">Buscar</button>
                    </div>
                
            </div>
        </div>
    </header>

<?php
require "./config.php";

if(isset($_GET['nota'])){
    $nota= $_GET['nota'];
    if(isset($_GET['nome'])){
        $nome= $_GET['nome'];
    }else{
        $nome="";   
     }

     $IDNota= uniqid();

     $fecha = date("Y-m-d H:i:s"); 

        $pdo = conectar();
        $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        $pdoStatement=$pdo->prepare("INSERT INTO Notas (Nota, Usuario, IDNota, Date ) VALUES (:nota, :nome, :idnota, :date)");
        $datosNota= array('nota'=>$nota, 'nome'=>$nome, 'idnota'=>$IDNota, 'date'=>$fecha);
        $pdoStatement->execute($datosNota);

        echo '<div class="container text-center"><img class="img-aviso rounded mx-auto d-block" src="./img/hand-306520.svg"  alt="..."><h2 class="textcenter">Gardado con exito</h2><br>
        <h2 class="textcenter">A tua nota é notas.fdezfebrero.es/nota.php?id=<span>'.$IDNota.'</span></h2><br>
        <h2 class="textcenter">Garda o Enlace para acceder de novo a tua nota</h2></div>';


}else{
    echo '<div class="container text-center"><img class="img-aviso rounded mx-auto d-block" src="./img/smiley-1635450"  alt="..."><h2 class="textcenter">Oubo un erro, non introduciches unha nota</h2></div>';
}
?>
  <div class="container">
        <footer class="footer justify-content-between align-items-center py-3 ">
            <div class="container">
                <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
                    <svg class="bi" width="30" height="24">
                        <use xlink:href="#bootstrap" />
                    </svg>
                </a>
                <span class="text-muted">&copy; 2021 Notas, Inc</span>
            </div>
        </footer>
    </div>

    <script>
        function mostrar() {
            $("#mostrar").toggle();
        }
        function buscar() {
            let id = document.getElementById('id').value;
            location.href="buscarNota.php?id="+ id +"&buscar=buscar"   
        }
    </script>
</body>

</html>