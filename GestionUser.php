<?php
include "connexion.php";

class GestionUser{
    private $c;
   

    public function __construct()  {
        $this->c = new connexion();
    }
    public function getallusers(){
        $res = $this->c->getIdcon()->query(" select * from client where user=(select id from user where cin = ".$_SESSION['user'].")");
       return $res->fetchAll(PDO::FETCH_ASSOC);
    }
    public function verif ($login,$pwd){
       
        $res = $this->c->getIdcon()->prepare("select * from user where cin=? and mdp=?");
        $res->bindParam(1,$login);
        $res->bindParam(2,md5($pwd));
        $res->execute();
        if($res->fetch())
            { 
               $_SESSION['user']=$login;
                header('Location: aff_user.php');}
                    else {
                    header('Location: login.php');
                    }


    }
    public function ajout($n,$p,$v,$e,$d){
        $id=$this->c->getIdcon()->query("select id from user where cin = ".$_SESSION['user']);
        $tab=$id->fetchAll(PDO::FETCH_ASSOC);
        foreach($tab as $row)
            $idp=$row['id'];
        $stmt= $this -> c -> getIdcon()->prepare("insert into client(nom,prenom,adresse,cin,user,date_de_livraison) values (?,?,?,?,?,?)");
        $stmt->bindParam(1,$n);
        $stmt->bindParam(2,$p);
        $stmt->bindParam(3,$v);
        $stmt->bindParam(4,$e);
        $stmt->bindParam(5,$idp);
        $stmt->bindParam(6,$d);

        $stmt->execute();

        header('Location: aff_user.php');

    }

    public function suppression ($id){
        $stmt= $this -> c -> getIdcon()->prepare("delete from client where id=?");
        $stmt->bindParam(1,$id);
        $stmt->execute();
        header('Location: aff_user.php');
    }
    public function rechercher($id){
        $stmt= $this -> c -> getIdcon()->prepare("select * from client where id=?");
        $stmt->bindParam(1,$id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function modifier($nom,$prenom,$adresse,$cin,$id,$d){
        $stmt= $this -> c -> getIdcon()->prepare("UPDATE client SET nom = ? , prenom = ?, adresse = ?,cin = ? ,date_de_livraison =? where id=?");
        $stmt->bindParam(1,$nom);
        $stmt->bindParam(2,$prenom);
        $stmt->bindParam(3,$adresse);
        $stmt->bindParam(4,$cin);
        $stmt->bindParam(5,$d);

        $stmt->bindParam(6,$id);
        $stmt->execute();
        header('Location: aff_user.php');
    
    }
    public function getallproduct(){
        $res = $this->c->getIdcon()->query(" select * from produit");
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }
    public function addcommande($id,$idp)
    {  $stmt= $this -> c -> getIdcon()->prepare("insert into commande(id,idp) values (?,?)");
        $stmt->bindParam(1,$id);
        $stmt->bindParam(2,$idp);
       $stmt->execute();
        header('location:index.php?id='.$id);
    }
    public function getcommandebyid($id)
    {
        $res = $this->c->getIdcon()->prepare(" select * from produit where id in(select idp from commande where id=?)");
        $res->bindParam(1,$id);
        $res->execute();
        return $res->fetchAll(PDO::FETCH_ASSOC);





    }
    public function suppression_commande ($id,$idp){
        $stmt= $this -> c -> getIdcon()->prepare("delete from commande where id=? AND idp=?");
        $stmt->bindParam(1,$id);
        $stmt->bindParam(2,$idp);
        $stmt->execute();
        header('Location: commande.php?id='.$id);
    }


}

 