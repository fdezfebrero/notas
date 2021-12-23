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

if(isset($_GET['id'])){
    $id= $_GET['id'];

        $pdo = conectar();
        $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        $pdoStatement=$pdo->prepare("SELECT  * FROM Notas WHERE ID like ?");
        $pdoStatement->bindParam(1, $id);
        $pdoStatement->execute();

        echo "<table><tr><th>ID</th><th>NOTA</th><th>USUARIO</th></tr>";
        while ($fila = $pdoStatement->fetch(PDO::FETCH_ASSOC))
            echo "<tr><td>" . $fila['ID'] . " </td><td>" . $fila['Nota'] . "</td><td>" . $fila['Usuario'] . "</td></tr>";
        echo "<table>";


}else{
    echo "<p>a nota xa non existe</p>";
}
?>
<div class="container">
<footer class="footer  justify-content-between align-items-center py-3 my-4 border-top">
    <div class="col-md-4 d-flex align-items-center">
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

</html>'