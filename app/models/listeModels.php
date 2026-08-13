    <?php
   require_once dirname(__DIR__)."/core/database.php";

function getAllEleves():array{
    $pdo = connexionDB();
    
    $sql = "SELECT el.nom, el.prenom, el.matricule, e.devoir1 AS DEVOIR1, e.devoir2 AS DEVOIR2, e.Composition AS COMPOSITION,
    ROUND((e.devoir1 + e.devoir2 + e.composition) / 3,2) AS MOYENNE,
    CASE
    WHEN  ROUND((e.devoir1 + e.devoir2 + e.composition) / 3,2)>= 17
     AND  ROUND((e.devoir1 + e.devoir2 + e.composition) / 3,2)<= 20 THEN 'TRES BIEN'
    WHEN  ROUND((e.devoir1 + e.devoir2 + e.composition) / 3,2)>= 14
    AND  ROUND((e.devoir1 + e.devoir2 + e.composition) / 3,2)< 17 THEN 'BIEN'
    WHEN  ROUND((e.devoir1 + e.devoir2 + e.composition) / 3,2)>= 12
     AND  ROUND((e.devoir1 + e.devoir2 + e.composition) / 3,2)< 14 THEN 'ASSEZ BIEN'
    WHEN  ROUND((e.devoir1 + e.devoir2 + e.composition) / 3,2)>= 10
    AND  ROUND((e.devoir1 + e.devoir2 + e.composition) / 3,2)< 12 THEN 'PASSABLE'
    ELSE 'FAIBLE'
    END AS Appréciation
    FROM evaluations e
    INNER JOIN inscriptions i ON e.inscription_id = i.id
    INNER JOIN eleves el ON i.  eleve_id = el.id;
    "; 
     
       $eleves = query($pdo, $sql, false);
    $pdo = null;
  
    // var_dump($eleves);
    // die;
    return   $eleves;
 
}