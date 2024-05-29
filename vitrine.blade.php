<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $nom = htmlspecialchars($_POST["nom"]);
    $email = htmlspecialchars($_POST["email"]);
    $message = htmlspecialchars($_POST["message"]);

    // Connexion à la base de données
    $host = 'localhost';
    $dbname = 'crmradouham';
    $username = 'root';
    $password = '';

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

        // Préparer la requête d'insertion
        $sql = "INSERT INTO RDV (Nom, Mail, Message) VALUES (:nom, :email, :message)";
        $stmt = $pdo->prepare($sql);

        // Binder les paramètres
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':message', $message);

        // Exécuter la requête
        $stmt->execute();

        // Fermer la connexion
        $pdo = null;

        // Rediriger l'utilisateur après l'envoi du formulaire (ajustez la redirection selon vos besoins)
        header("Location: confirmation.php");
        exit();
    } catch (PDOException $e) {
        // Gérer les erreurs de connexion à la base de données
        die("Erreur de connexion à la base de données: " . $e->getMessage());
    }
}
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- Basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Site Metas -->
      <title>InfoTools</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- Style CSS -->
      <link rel="stylesheet" href="css/style.css">
      <!-- Responsive CSS -->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- Favicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <!-- Font Awesome -->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <!-- Fancybox CSS -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
   </head>
   <!-- Body -->
   <body class="main-layout">
      <!-- Header -->
      <header>
         <!-- Header Inner -->
         <div class="header">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                     <div class="full">
                        <div class="center-desk">
                           <div class="logo">
                               <img src="images/call.png" alt="#"/>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                     <nav class="navigation navbar navbar-expand-md navbar-dark">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarsExample04">
                           <ul class="navbar-nav mr-auto">
                              <li class="nav-item">
                                 <a class="nav-link" href="#services">Services</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="#work">Nos Produits</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="{{ route('register') }}">Inscription</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="{{ route('login') }}">Connexion</a>
                              </li>
                           </ul>
                        </div>
                     </nav>
                  </div>
               </div>
            </div>
         </div>
      </header>
      <!-- End Header Inner -->

      <!-- Banner -->
      <section class="banner_main">
         <div class="container-fluid">
            <div class="row d_flex">
               <div class="col-md-7">
                  <div class="text-bg">
                     <div class="padding_lert">
                        <h1>Bienvenue sur InfoTools, conseiller des logiciels,pour vous faire avancer</h1>
                     </div>
                  </div>
               </div>
               <div class="col-md-5 bah">
                  <div class="bann_img">
                     <figure><img src="images/pc.png" alt="#"/></figure>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- End Banner -->

      <!-- Produits/Services -->

      <div class="container mt-5">
    <div class="row">
        <?php
        // Connexion à la base de données
        $host = 'localhost';
        $dbname = 'crmradouham';
        $username = 'root';
        $password = '';

        $conn = new mysqli($host, $username, $password, $dbname);

        // Vérifier la connexion
        if ($conn->connect_error) {
            die("La connexion à la base de données a échoué : " . $conn->connect_error);
        }

        // Requête SQL pour récupérer les données
        $sql = "SELECT NOMPROD AS NomP, Image AS img FROM produit";
        $result = $conn->query($sql);

        // Vérifier si des résultats ont été trouvés
        if ($result->num_rows > 0) {
            // Afficher les images dans le code HTML
            echo '<div class="container mt-5">';
            echo '<h2 id="work" class="text-center mt-4">Découvrez nos produits phares</h2>';
            echo '<div class="row">';

            while ($row = $result->fetch_assoc()) {
                $nomProduit = $row["NomP"];
                $imageURL = 'data:image/jpeg;base64,' . base64_encode($row["img"]);
                

                 // Ajouter lien autour de chaque image pour rediriger vers la page produit
                echo '<a href="page_produit.php?><figure style="max-width: 200px;" class="mx-auto">';
                echo '<figure style="max-width: 200px;" class="mx-auto"><img src="' . $imageURL . '" alt="' . $nomProduit . '"/></figure>';
                echo '</a>';
            }

            echo '</div>';
            echo '</div>';
        } else {
            echo "Aucun résultat trouvé dans la base de données.";
        }

        // Fermer la connexion à la base de données
        $conn->close();
        ?>
    </div>
</div>


      <!-- Footer -->
      <footer class="footer">
          <div class="container">
              <div class="row">
                  <div class="col-md-5">
                      <div class="multipurpose">
                          <h3 id="services">Venez parler<br>avec notre<br>entreprise</h3>
                      </div>
                  </div>

                  <div class="col-md-7 sm_none">
                      <div class="contac_detel">
                          <ul>
                              <li><img src="images/call.png" alt="#"/>07 51 20 73 80</li>
                              <li><a href="mailto:radouham@gmail.com"><img src="images/gmail.png" alt="#"/>radouham@gmail.com</a></li>
                          </ul>
                      </div>
                  </div>
                  <div class="center-container">
                      <div class="col-md-12">
                          <div class="multipurpose" alt="#">
                              <p>Nous contacter avec ce numéro de téléphone ou a notre adresse e-mail et pour un rendez-vous remplissez directement le formulaire</p>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-7 sm_show">
                      <div class="contac_detel">
                          <ul>
                              <li><img src="images/call.png" alt="#"/>07 51 20 73 80</li>
                              <li><a href="mailto:radouham@mailtrap.io"><img src="images/gmail.png" alt="#"/>radouham@mailtrap.io</a></li>
                          </ul>
                      </div>
                  </div>

                  <!-- Ajout du formulaire de rendez-vous -->
<div class="col-md-7 mx-auto">
<form id="formulaire-rendezvous" action="{{ route('envoyer.rendezvous') }}" method="post" onsubmit="return submitForm(event)">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="nom">Nom :</label>
                <input type="text" name="nom" id="nom" class="form-control" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="prenom">Prenom :</label>
                <input type="text" name="prenom" id="prenom" class="form-control" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="email">Email :</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="naiss">Date de naissance :</label>
                <input type="date" name="naissance" id="naissance" class="form-control" required>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="message">Message :</label>
        <textarea name="message" id="message" rows="4" class="form-control" required></textarea>
    </div>
    <div class="form-group text-center">
        <button type="submit" class="btn btn-primary">Requête de rendez-vous</button>
        <p> Nous vous repondrons dans les plus bref délais.</p>
        <p>/!\ Ce formulaire collectera vos données. /!\</p>
    </div>
</form>

</div>
              </div>
          </div>
          <div class="copyright">
              <div class="container">
                  <div class="row">
                      <div class="col-md-12">
                          <p>Copyright 2023 All Right Reserved By Radouham</p>
                      </div>
                  </div>
              </div>
          </div>
      </footer>

      <!-- Javascript files -->
      <script src="js/jquery.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
      <script>
    function submitForm(event) {
        event.preventDefault(); // Empêche l'envoi du formulaire par défaut

        // Envoi des données à Laravel pour enregistrement dans la base de données
        var form = event.target;
        var formData = new FormData(form);
        fetch(form.action, {
            method: 'POST',
            body: formData
        })
        .then(response => response.json()) // ou response.text() selon le besoin
        .then(data => {
            // Traitement des données de réponse si nécessaire
            console.log(data);
        })
        .catch(error => {
            console.error('Erreur lors de l\'enregistrement dans la base de données:', error);
        });

        // Envoi des données à Formspree
        var formSpreeURL = 'https://formspree.io/f/xaygrgnp';
        fetch(formSpreeURL, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(Object.fromEntries(formData)),
        })
        .then(response => response.json())
        .then(data => {
            // Traitement des données de réponse si nécessaire
            console.log(data);
        })
        .catch(error => {
            console.error('Erreur lors de l\'envoi à Formspree:', error);
        });
    }
</script>
<script>
    function clearForm() {
        // Sélectionnez chaque champ du formulaire et réinitialisez sa valeur
        document.getElementById('nom').value = '';
        document.getElementById('email').value = '';
        document.getElementById('message').value = '';
    }

    // Ajoutez un gestionnaire d'événements à la soumission du formulaire
    document.getElementById('formulaire-rendezvous').addEventListener('submit', function(event) {
        // Empêche la soumission normale du formulaire
        event.preventDefault();

        // Exécutez la fonction clearForm après la soumission réussie
        clearForm();

        // Soumission du formulaire
        this.submit();
    });
</script>
   </body>
</html>