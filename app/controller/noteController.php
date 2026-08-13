  <?php
  require_once dirname(__DIR__)."/models/EvaluationModel.php";
   require_once dirname(__DIR__)."/models/ClasseModel.php";
   require_once dirname(__DIR__)."/models/MatiereModel.php";
   require_once dirname(__DIR__)."/models/PeriodeModel.php";
   require_once dirname(__DIR__)."/models/noteModel.php";
   require_once dirname(__DIR__)."/models/listeModels.php";

function afficherNote(){
        $periodes =  getAllPeriode();
          // var_dump($classes);
          //   die;
          $classes = getAllClasse();
          $matieres = getAllMatiere();
          $eleves = getAllEleves();
          if($_SERVER['REQUEST_METHOD']==='POST'){
            
            $selectionclasse = (int)$_POST['classe'];
            $selectionmatiere = (int)$_POST['matiere'];
            $selectionperiode = (int)$_POST['periode'];
           // var_dump($classes);
          //   die;
            $moyens = getMoyen($selectionclasse,$selectionperiode,$selectionmatiere );
          }

          
    require_once dirname(__DIR__)."/views/saisiesNote.html.php";
}