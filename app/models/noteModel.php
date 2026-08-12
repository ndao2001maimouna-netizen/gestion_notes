    <?php
   require_once dirname(__DIR__)."/core/database.php";

function getMoyen(int $classe_id, int $periode_id, int $matiere_id, int $anneScolaire_id):array{
    $pdo = connexionDB();
    // var_dump($classe_id);
    // die;
    $sql = "SELECT ROUND(AVG((e.devoir1 + e.devoir2 + e.composition) / 3), 2) AS MOYENNECLASSE
    FROM evaluations e
    INNER JOIN inscriptions i ON i.id = e.inscription_id
    INNER JOIN matiereClasses mc ON mc.id = e.matiereClasse_id 
    INNER JOIN matieres m ON mc.matiere_id = m.id
    WHERE i.classe_id = :classe_id
    AND i.anneScolaire_id = :anneScolaire_id
    AND e.periode_id = :periode_id     
    AND mc.matiere_id= :matiere_id";
    

    $moyens = executeQuery($pdo,$sql,[
                'classe_id' => $classe_id,
                'anneScolaire_id' => $anneScolaire_id,
                'periode_id' => $periode_id,
                'matiere_id'=> $matiere_id
    ] ); 
        
    $pdo = null;
  
    return  $moyens;
 
}