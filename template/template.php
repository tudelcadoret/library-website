<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="UTF-8">
        
        <!-- MEDIA QUERIES -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <!-- SEO -->
        <meta name="description" content="Bibliothèque Comme un roman. Lieu de loisirs et de convivialité, la bibliothèque propose de nombreux services : espaces de lecture, jeux, presse, cinéma, ...">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <!-- TITLE -->
        <title>Bibliothèque Comme Un Roman au Landreau</title>

        <!-- FONT AWESOME -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">  
        
        <!-- OTHERS JS FILES -->
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script src="js/ajax.js"></script>
        <script src="js/events.js"></script>
        <script src="js/utilities.js"></script>
        
        <!-- CSS -->
        <link rel="stylesheet" href="css/normalize.css"/>
        <link rel="stylesheet" href="css/style.css"/>

    <body>
        
        <!-- HEADER**********************************************************-->
        <header>
            <div class="container">
                    
                <!-- LOGO -->
                <a href="index.php"><img src="img/logo_bibli_landreau.png" alt="logo de la bibliothèque du landreau"></a>
                
                <!-- NAVBAR-->
                <nav class="flex">
                    
                    <!-- permanent links -->
                    <a href="index.php" title="Redirection vers la page d'accueil">Accueil</a>
                    <a href="index.php?a=showAllBooks" title="Consultez notre sélection de livres">Nos livres</a>
                    <a href="index.php?a=contact" title="Nous sommes à votre écoute">Contact</a>
                    
                    <!-- active session -->
                    <?php if(array_key_exists('user', $_SESSION)) : ?>
                    
                        <!-- session = user or admin -->
                        <a href="index.php?a=logout">Se déconnecter</a>
                        
                        <!-- session = admin -->
                        <?php if($_SESSION['user']['role_user'] == 'admin') { ?>
                            <a 
                            href="admin.php"
                            title="Vous êtes connecté en tant qu'admin"
                            >Admin</a>
                        <?php } ?>
                        
                        <!-- session = user -->
                        <?php if($_SESSION['user']['role_user'] == 'user') { ?>
                            <a 
                            href="index.php?a=userspace&idUser=<?= $_SESSION['user']['id_user'] ?>"
                            title="Vous êtes connecté en tant qu'utilisateur"
                            >Mon espace</a>
                        <?php } ?>
                    
                    <!-- no active session -->
                    <?php else : ?>    
                        <a href="index.php?a=login">Se connecter</a>
                        <a href="index.php?a=register">S'enregistrer</a>
                    <?php endif ;?>
                </nav>
                
            </div>
                
        </header>

        <!-- MAIN************************************************************-->
        <main>
            <!-- TEMPLATE -->
            <?php include $template ?>
            
        </main>
        
        <!-- FOOTER**********************************************************-->
        <footer class="container">
            <nav class="flex">
                <div class="flex">
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-google-plus-g"></i></a>
                </div>
                <a href="#">Mentions légales</a>
            </nav>
        </footer>
    
    <!-- JS -->
    <script src="js/main.js"></script>
    </body>
</html>