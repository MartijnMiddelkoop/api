<?php
class Product
{
   // database connectie en tabel-naam
   private $conn;
   private $table_name = "product";
   // object properties
   public $id;
   // constructor with $db as database connection
   public function __construct($db)
   {
       $this->conn = $db;
   }
   // read products
   
   function read($id = null) {
    if($id == null){
        $where = "";
    }else{
        $where = " WHERE id = " . $id;
    }
       // select all query
       $query = "SELECT * FROM " . $this->table_name. "" . $where;
       return $this->conn->query($query);
   }



    function delete($id) {
     $query = "DELETE FROM " . $this->table_name . "WHERE id=" . $id;
     return $this->conn->query($query);

     }


 function create($naam, $beschrijving, $prijs, $categorie) {
     $query = "INSERT INTO " . $this->table_name . 
     "(`naam`,`beschrijving`,`prijs`,`categorie_id`,`toegevoegd_op`) " . 
     "VALUES ('$naam','$beschrijving','$prijs','$categorie',now())";

     if ($result = $this->conn->query($query) === TRUE) {
         return true;
     } else {
         return false;
     }
    return $result;
 }

 function update($id, $naam, $beschrijving, $prijs, $categorie) {
     $query = "UPDATE '. $this->table_name . ' SET lastname='$naam', beschrijving='$beschrijving',prijs='$prijs'categorie='$categorie'  WHERE id=$id";
     return $this->conn->query($query);
 }
}