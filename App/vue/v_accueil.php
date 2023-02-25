<section>
  <h1>
    Lord Of Geek
  </h1>
  <h2>
    le prince des jeux sur internet
  </h2>
</section>

<div>
  <?php
  if (!isset($_SESSION['id'])) {
    // Donnée "identifiant" pas encore enregistrée : 
    // => l'utilisateur n'est pas connecté ; 
    // => le rediriger vers la page de login. 
    //   header('location: login.php'); 
    //   exit; 
    echo "Bonjour ! Veuillez vous connecter.";
  } else {
    // Récupérer l'identifiant de la session (pour l'exemple). 
    // $session = session_id(); 
    // Préparer un message. 
    echo "Bonjour " . $_SESSION['pseudo'] . " !";
  }
  ?>
</div>



<section>
  <form action="" method="GET" name="barreRecherche">
    <input type="text" name="keywords" placeholder="Quel jeu recherchez-vous ?">
    <input type="text" name="uc" value="visite" hidden id="">
    <input type="submit" value="rechercherJeux" name="action">
  </form>
</section>

