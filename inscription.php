<!doctype html>
<html lang="fr">
  <head>
       <?php
    session_start();
     try
    {
      $bdd = new PDO('mysql:host=localhost;dbname=Swim;charset=utf8', 'root', 'root');
    }
    catch(Exception $e)
    {
            die('Erreur : '.$e->getMessage());
    }
    ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Inscription</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="form-validation.css" rel="stylesheet">
  </head>

  <body class="bg-light">

    <div class="container">
      <div class="py-5 text-center">
        <h2>INSCRIPTION</h2>
      </div>

      <form class="needs-validation" method="post" action="inscrire.php" novalidate>
        <div class="col-md-12 order-md-1">
            <div class="row">
              <div class="col-md-4 mb-3">
                <label for="prenom">Prénom </label>
                <input name="prenom" type="text" class="form-control" id="prenom" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Prénom requis.
                </div>
              </div>

              <div class="col-md-4 mb-3">
                <label for="lastName">Nom de famille</label>
                <input name="nom" type="text" class="form-control" id="lastName" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Nom de famille requis.
                </div>
              </div>
              <div class="col-md-4 mb-3">
              <label for="pseudo">Pseudo</label>
              <input name="pseudo" type="text" class="form-control" id="pseudo" placeholder="" value="" required>
                <div class="invalid-feedback" style="width: 100%;">
                  Pseudo requis.
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-md-12 mb-3">
              <label for="mdp"> Mot de passe </label>
              <input name="mdp" type="text" class="form-control" id="mdp" placeholder="" required>
              <div class="invalid-feedback">
                Mot de passe requis.
              </div> 
            </div>

            <div class="col-md-12 mb-3">
              <label for="date"> Age </label>
              <input name="age" type="number" class="form-control" id="age" placeholder="" required>
              <div class="invalid-feedback">
                Age requis.
              </div> 
            </div>

            <div class="col-md-12 mb-3">
                <label for="statut">Statut</label>
                <select class="custom-select d-block w-100" id="statut" name="statut" required>
                  <option value="">Choisir </option>
                  <option>Etudiant ECE Paris</option>
                  <option>Etudiant ECE Tech</option>
                  <option>Enseignant</option>
                </select>
                <div class="invalid-feedback">
                  Sélectionner un statut.
                </div>
              </div>
            


            <div class="col-md-12 mb-3">
              <label for="email">Email </label>
              <input name="mail" type="email" class="form-control" id="email" placeholder="example@exemple.com" required>
              <div class="invalid-feedback">
                Adresse mail requise.
              </div>
            </div>
          
            <div class="col-md-12 mb-3">
              <label for="adresse">Adresse </label>
              <input name="adresse" type="text" class="form-control" id="adresse" placeholder="" required>
              <div class="invalid-feedback">
                Adresse requise.
              </div>
            </div>


            <div class="col-md-12 order-md-1">
            <div class="row">
              <div class="col-md-4 mb-3">
                <label for="ville">Ville </label>
                <input name="ville" type="text" class="form-control" id="Ville" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Ville requise.
                </div>
              </div>

              <div class="col-md-4 mb-3">
                <label for="codepostal">Code Postal</label>
                <input name="code_postal" type="number" class="form-control" id="Codepostal" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Code postal requis.
                </div>
              </div>

              <div class="col-md-4 mb-3">
             
                <label for="country">Pays </label>
                <select class="custom-select d-block w-100" id="pays" name="pays" required>
                  <option value="">Choisir </option>
                  <option>Angleterre</option>
                  <option>Belgique</option>
                  <option>Chine</option>
                  <option>Corée du Nord</option>
                  <option>Corée du Seud</option>
                  <option>Espagne</option>
                  <option>Etats Unis</option>
                  <option>France</option>
                  <option>Italie</option>
                  <option>Japon</option>
                  <option>Suisse</option>
                </select>
                <div class="invalid-feedback">
                  Sélectionner un pays.
              </div>
              </div>
            </div>
          </div>

			<div class="col-md-12 mt-3">	
		  		<button class="btn btn-primary btn-lg btn-block" type="submit">Confirmer l'inscription</button>
		  	</div>
            
          </form>
        </div>
      

      <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; 2017-2018 Swim</p>
      </footer>
    

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../../../assets/js/vendor/popper.min.js"></script>
    <script src="../../../../dist/js/bootstrap.min.js"></script>
    <script src="../../../../assets/js/vendor/holder.min.js"></script>
    <script>
      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function() {
        'use strict';

        window.addEventListener('load', function() {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');

          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
    </script>
  </body>
</html>
