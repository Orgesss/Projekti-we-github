<?php
 include "dbh.classes.php";

class Produkti extends Dbh{

    private $id;
    private $emri;
    private $cmimi;

    public function __construct(
        $id = ' ',
        $emri = ' ',
        $cmimi = ' '
    ){
        parent::__construct();
        $this->id = $id;
        $this->emri = $emri;
        $this->cmimi = $cmimi;
     
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    public function getId()
    {
        return $this->id;
    }
    public function setEmri($emri)
    {
        $this->emri = $emri;
    }
    public function getEmri()
    {
        return $this->emri;
    }
    public function setCmimi($cmimi)
    {
        $this->cmimi = $cmimi;
    }
    public function getCmimi()
    {
        return $this->cmimi;
    }

    public function insertoDhenat()
    {
        $sql = "INSERT INTO Produkti (id,emri,cmimi)
        VALUES (?,?,?)";
        $stm = $this->dbhconn->prepare($sql);
        $stm->execute([$this->id, $this->emri, $this->cmimi]);
        echo "<script>
        alert('Produktet jane regjistruar me sukses');
        document.location='displayDhenat.php';
        </script>";
    }
    public function lexoDhenat()
    {
        $sql = 'SELECT * FROM Produkti';
        $stm = $this->dbhconn->prepare($sql);
        $stm->execute();
        $rezultati = $stm->fetchAll(PDO::FETCH_ASSOC);
        return $rezultati;
    }
    public function lexoDhenatSipasIDs($id)
    {
        $sql = 'SELECT * FROM Produkti where id=:id';
        $stm = $this->dbhconn->prepare($sql);
        $stm->execute([':id' => $this->id = $id]);
        $rezultati = $stm->fetch(PDO::FETCH_ASSOC);
        return $rezultati;
    }
    public function updateDhenat()
    {
        $sql = 'UPDATE Produkti SET id=?, emri=?, cmimi=? WHERE id=?';
        $stm = $this->dbhconn->prepare($sql);
        return $stm->execute([$this->id, $this->emri, $this->cmimi]);
    }
    public function deleteDhenat($id)
    {
        $sql = "DELETE FROM Produkti WHERE id=:id";
        $stm = $this->dbhconn->prepare($sql);
        $stm->bindParam(':id', $id);
        $stm->execute();
        if ($stm == true) {
            echo "<script>
                alert('Produktet jane fshire me sukses');
                document.location='displayDhenat.php';
                </script>";
        } else {
            return false;
        }
    }
}
