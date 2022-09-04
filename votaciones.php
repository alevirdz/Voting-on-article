<?php
include_once 'inc/header.php';
include_once 'includes/funciones.php';
$ejecutar = new Operacion();
$showResults = false;
$option = '';

if(isset($_POST['valoracion'])){
    $showResults = true;
    $ejecutar->setOptionSelected($_POST['valoracion']);
    $ejecutar->vote();
}
?>

<div class="container mt-5">
    <div class="row">
        <div class="col">
        <h2 class="text-center">Usuarios</h2>
            <div class="card">
                <div class="card-body text-center">
                <h2><?php echo $showResults ?  $ejecutar->getTotalVotes(): '0'; ?> Total</h2>
                </div>
            </div>
        </div>
        <div class="col">
        <h2 class="text-center">Valoraciones del público</h2>
            <div class="card">
            <?php if($showResults): ?>
                <?php foreach($ejecutar->showResults() as $valoraciones): 
                $porcentaje = $ejecutar->getPercentageVotes($valoraciones['votos']);
                $asignar = $valoraciones["valoraciones"];
                $color = $asignar == 'positivo' ? 'bg-success' : 'bg-danger'
                ?>
                <div class="card-body">
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped <?php echo $color ?> progress-bar-animated" role="progressbar" style="width:<?php echo $porcentaje ?>%" aria-valuenow="<?php echo $porcentaje ?>" aria-valuemin='0' aria-valuemax="<?php echo $porcentaje ?>"><?php echo $porcentaje ?> %</div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <?php else: ?>
            <div class="card-body">
                <div class="progress">
                    <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">0 %</div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php
include_once 'inc/footer.php';
?>