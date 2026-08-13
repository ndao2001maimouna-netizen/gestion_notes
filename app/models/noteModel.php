    <?php
   require_once dirname(__DIR__)."/core/database.php";

function getMoyen(int $classe_id, int $periode_id, int $matiere_id):array{
    $pdo = connexionDB();
    // var_dump($classe_id);
    // die;
    $sql = "SELECT ROUND(AVG((
    COALESCE(e.devoir1, 0) + 
    COALESCE(e.devoir2, 0) + 
    COALESCE(e.composition, 0)
    ) / 3), 2) AS MOYENNECLASSE
    FROM evaluations e
    INNER JOIN inscriptions i ON i.id = e.inscription_id
    INNER JOIN matiereClasses mc ON mc.id = e.matiereClasse_id
    WHERE i.classe_id = :classe_id
    AND e.periode_id = :periode_id
    AND mc.matiere_id = :matiere_id";
    $moyens = executeQuery($pdo,$sql,[
                'classe_id' => $classe_id,
                'periode_id' => $periode_id,
                'matiere_id'=> $matiere_id
    ] ); 
        
    $pdo = null;
 
    return  $moyens;
 
}