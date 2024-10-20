<?php
require_once(__DIR__ . '/../helpers/connect.php');

class Oeuvre
{

    private ?int $id;
    private string $image_link;
    private string $title;
    private string $author;
    private string $description;

    //*************** ID ***************//
    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }

    //*************** IMAGE LINK***************//
    public function getImageLink(): string
    {
        return $this->image_link;
    }

    public function setImageLink(string $image_link)
    {
        $this->image_link = $image_link;
    }

    //*************** Title ***************//
    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    //*************** Auhtor ***************//
    public function getAuthor(): string
    {
        return $this->author;
    }

    public function setAuthor(string $author)
    {
        $this->author = $author;
    }

    //*************** Description ***************//
    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    /*
     * Méthode permettant de récupérer toutes les oeuvres
     */
    public static function getAll(): array | false
    {

        $pdo = Database::connect();
        $sql = 'SELECT * FROM `oeuvres`;';
        $sth = $pdo->prepare($sql);
        $sth->execute();
        $data = $sth->fetchAll();

        if (!$data) {
            throw new Exception('Erreur lors de la récupération des oeuvres');
        } else {
            return $data;
        }
    }

    /*
     * Méthode permettant de récupérer une oeuvre
     */
    public static function getOne(int $id):array |false
    {
        $pdo = Database::connect();
        
        $sql = 'SELECT * FROM `oeuvres` WHERE `id` =:id;';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        $sth->execute();
        $data = $sth->fetch();

        if (!$data) {
            throw new Exception('Erreur lors de la récupération de l\'oeuvre');
        } else {
            return $data;
        }
    }


    /*
     * Méthode permettant d'ajouter une oeuvre
     */
    public function insert(): bool 
    {
        $pdo = Database::connect();

        $sql = 'INSERT INTO `oeuvres`(`image_link`, `title`, `author`, `description`) 
        VALUES (:image_link, :title, :author, :description);';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':image_link', $this->getImageLink());
        $sth->bindValue(':title', $this->getTitle());
        $sth->bindValue(':author', $this->getAuthor());
        $sth->bindValue(':description', $this->getDescription());
   
        $sth->execute();
        return $sth->rowCount() > 0;  
    }

     /*
     * Méthode permettant de vérifier s'il y a des doublons 
     */

    public static function exist($title, $author): bool
    {
        $pdo = Database::connect();

        $sql = 'SELECT COUNT(*) AS `nbOfOeuvre` FROM `Oeuvres` WHERE `title` = :title and `author` = :author ';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':title', $title);
        $sth->bindValue(':author', $author);

        $sth->execute();

        // fetchAll     => renvoyer toutes les lignes sous forme de tableau associatif
        // fetch        => récupérer première ligne à trouver ()
        // fetchColumn  => récupérer la valeur de la première colonne de chaque ligne.
        $result = $sth->fetchColumn();

        // Si le nombre de lignes correspondantes est supérieur à zéro, la valeur existe
        return $result > 0;
    }
}
