<?php 

class Database
{
    protected function Dbconnect()
    {
        try 
        {
            $pdo = new PDO('mysql:host=db.3wa.io;dbname=tudel_librairie', 'tudel', '3af7ba7439603e4077e389b54514d092');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->exec('SET NAMES UTF8');
        }
        catch (PDOException $e)
        {
            echo 'La connexion a échoué.<br >';
            echo '<br> code erreur : [ ' , $e->getCode(), '] ';
            echo '<br> message erreur : '. $e->getMessage();
            echo '<br> ligne de l erreur : '. $e->getLine();
            echo '<br> fichier contenant l erreur  : '. $e->getFile();
        }
        return $pdo;
    }
}
