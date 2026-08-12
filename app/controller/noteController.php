  <?php
  require_once dirname(__DIR__)."/models/EvaluationModel.php";
   require_once dirname(__DIR__)."/models/ClasseModel.php";
   require_once dirname(__DIR__)."/models/MatiereModel.php";
   require_once dirname(__DIR__)."/models/PeriodeModel.php";
   require_once dirname(__DIR__)."/models/noteModel.php";

function afficherNote(){
          $classes = getAllClasse();
          $matieres = getAllMatiere();
          $periodes =  getAllPeriode();
          // var_dump($classes);
          //   die;
          if($_SERVER['REQUEST_METHOD']==='POST'){
            
            $selectionclasse = $_POST['classe'];
            $selectionmatiere = $_POST['matiere'];
            $selectionperiode = $_POST['periode'];
            // var_dump($_POST['classe']);
            // die;
            $moyens = getMoyen($selectionclasse,$selectionmatiere,$selectionperiode );
          }
          
    require_once dirname(__DIR__)."/views/saisiesNote.html.php";
}