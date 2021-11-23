<?php
    include_once 'includes/funciones.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <title>Encuesta de sastifacción por votaciones</title>
</head>
<body>
<?php
        $ejecutar = new Operacion();
        $showResults = false;
        $option = '';

        if(isset($_POST['valoracion'])){
            $showResults = true;
            
            $ejecutar->setOptionSelected($_POST['valoracion']);
            $ejecutar->vote();
        }
?>
        <?php
            if($showResults){
                $queryvaloracion = $ejecutar->showResults();

                echo "<div class='container mt-3'>
                        <div class='row'>
                            <div class='col'>
                                <div class='card'>
                                    <div class='card-body'>".
                                    '<h2>'.$ejecutar->getTotalVotes(). ' votos totales</h2>';
                                    "</div>
                                </div>
                            </div>
                        </div>
                    </div>" ;
                
                foreach ($queryvaloracion as $valoraciones) {
                    $porcentaje = $ejecutar->getPercentageVotes($valoraciones['votos']);
                    /* var_dump($valoraciones); */
                    echo "
                    <div class='container'>
                        <div class='row'>
                            <div class='col'>
                                <div class='progress'>
                                    <div class='progress-bar progress-bar-striped progress-bar-animated' role='progressbar' style='width: $porcentaje%' aria-valuenow='$porcentaje' aria-valuemin='0' aria-valuemax='$porcentaje'>$porcentaje %</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    ";
                    echo $valoraciones['opcion'];
                   //
                    
                }
            }
        ?>



<div class="container mt-3">
  <div class="row">
    <div class="col">
    <h2 class="text-center">Sistema de votaciones</h2>

            <div class="card">
                <img src="pexels-pixabay.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Tulum, Quintana Roo </h5>
                    <p class="card-text">El máximo atractivo de este Pueblo Mágico es el sitio arqueológico de Tulum, una de las ciudades ancestrales mayas más imponentes, ubicada frente al Mar Caribe de manera altiva y al mismo tiempo silenciosa.
                    Tulum está a 130 km al sur de Cancún y en los últimos años, ha registrado un crecimiento considerable en cuestión de infraestructura hotelera y de servicios, dando lugar a múltiples hoteles boutique y de lujo, así como aquellos más sencillos muchos con desayuno incluido. Los hay para todos los presupuestos en la zona hotelera que se extiende hacia el camino que va a Boca Paila y ahí mismo encontrarás varios spas, sofisticados bares y restaurantes con cocina de autor, amenizados de música en vivo, lo cual encierra una atmósfera nostálgica o bohemia, pero también hay otros con fiesta hasta el amanecer.
                    </p>
                    <a href="https://www.mexicodestinos.com/tulum/tours?utm_source=Blog-MD&utm_medium=Post-PMVerano&utm_campaign=Verano" class="btn btn-primary">Otros destinos</a>
                </div>
            </div>
            <form action="" method="POST">
                <h2>¿Te gusto nuestro contenido?</h2>

                <input type="radio" name="valoracion" id="" value="positivo"> <i class="fas fa-thumbs-up" style="color:#0093ff"></i>Me gusta <br>
                <input type="radio" name="valoracion" id="" value="negativo"> <i class="fas fa-thumbs-down" style="color:#ff2400"></i>No me gusta <br>
                <button type="submit" class="btn btn-success">Votar</button><br><br>
            </form>
            

    </div>
    
  </div>
</div>




   

</body>
</html>
