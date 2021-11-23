<?php

include_once 'db.php';

class Operacion extends DB{

    private $totalVotes;
    private $optionSelected;

    //llena la funcion
    public function setOptionSelected($option){
        
        $this->optionSelected = $option;
    }
    //obtenemos la variable seleccionada
    public function getOptionSelected(){
        return $this->optionSelected;
        var_dump( $this->optionSelected );
    }
    //actualiza el voto actual + 1 segun la opcion seleccionada
    public function vote(){
        $query = $this->connect()->prepare('UPDATE Ranking SET votos = votos + 1 WHERE valoraciones = :opcion');
        $query->execute(['opcion' => $this->optionSelected]);
    }
    //muestra los resultados consultado la tabla
    public function showResults(){
        return $this->connect()->query('SELECT * FROM Ranking');
    }
    //cuenta el total de votos y lo añade en la variable totalvotes
    public function getTotalVotes(){
        $querySum = $this->connect()->query('SELECT SUM(votos) AS votos_totales  FROM Ranking');
        $this->totalVotes = $querySum->fetch(PDO::FETCH_OBJ)->votos_totales;

        return $this->totalVotes;
    }
    //calcula la opcion seleccionada entre el total de votos
    public function getPercentageVotes($option){
        /* var_dump("----------- ".$option); */ //Trae el numero total de cada voto
        return round(($option / $this->totalVotes) * 100);
    }
}

?>