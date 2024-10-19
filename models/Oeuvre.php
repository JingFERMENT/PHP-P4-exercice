<?php
require_once(__DIR__ . '/../helpers/connect.php');

class Oeuvre
{

    private ?int $id;
    private string $image;
    private string $title;
    private string $artiste;
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

    //*************** IMAGE***************//
    public function getImage(): string
    {
        return $this->image;
    }

    public function setImage(string $image)
    {
        $this->image = $image;
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

    //*************** Artiste ***************//
    public function getArtiste(): string
    {
        return $this->artiste;
    }

    public function setArtiste(string $artiste)
    {
        $this->artiste = $artiste;
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

        // On teste si data est vide.
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

        $sql = 'INSERT INTO `oeuvres`(`image`, `title`, `artiste`, `description`) 
        VALUES (:image, :title, :artiste, :description);';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':image', $this->getImage());
        $sth->bindValue(':title', $this->getTitle());
        $sth->bindValue(':artiste', $this->getArtiste());
        $sth->bindValue(':description', $this->getDescription());
   
        $sth->execute();
        return $sth->rowCount() > 0;
        
    }
}
