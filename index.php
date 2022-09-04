<?php
include_once 'inc/header.php';
?>
<div class="container mt-5 mb-5">
<h2 class="text-center">Sistema de votaciones</h2>
<div class="container mt-5">
  <div class="row">
    <div class="col-sm-8 align-vertically">
        <div class="card p-5">
            <img src="https://picsum.photos/200/100" class="img-fluid card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Tulum, Quintana Roo </h5>
                <p class="card-text">El máximo atractivo de este Pueblo Mágico es el sitio arqueológico de Tulum, una de las ciudades ancestrales mayas más imponentes, ubicada frente al Mar Caribe de manera altiva y al mismo tiempo silenciosa.
                
                </p>
                <a href="https://www.mexicodestinos.com/tulum/tours?utm_source=Blog-MD&utm_medium=Post-PMVerano&utm_campaign=Verano" class="btn btn-primary">Otros destinos</a>
            </div>
        </div>
    </div>
    <div class="col-sm-4 align-vertically">
        <form action="votaciones.php" method="POST">
            <h2>¿Te gusto nuestro contenido?</h2>
            <div class="row text-center">
                <div class="col">
                    <label><input type="radio" class="valoracion" name="valoracion" value="positivo"><i class="fas fa-thumbs-up"></i></label>
                </div>
                <div class="col">
                    <label><input type="radio" class="valoracion" name="valoracion" value="negativo"> <i class="fas fa-thumbs-down"></i></label>
                </div>
            </div>
            <div class="vote mt-5">
                <button type="submit" class="btn btn-success btn-large">Votar</button>
            </div>
        </form>
    </div>
  </div>
</div>
</div>




   


<?php
include_once 'inc/footer.php';
?>

<style>
    /* .valoracion{
        display: none;
    } */
    .align-vertically{
    display: flex;
    align-items: center;
    justify-content: center;
    }
    .btn-large{
        width: 100%;
    }
    .fa-thumbs-up{
        color: #0093ff;
        font-size: 4rem;
    }
    .fa-thumbs-down{
        color:#ff2400;
        font-size: 4rem;
    }

</style>