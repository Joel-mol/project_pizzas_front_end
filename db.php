<?php
/**
 * clase para manejo de base de datos pdo
 * 
 * @author joel molina <joelmolina843@gmail.com>
 * 
 * @link https://github.com/Joel-mol/project_pizzas_front_end
 * 
 * @version 0.1
 * 
 * @copyright 2022 
 */



class Db{
   private $connection;
   /**
    * establecer una conexion
    *
    * @return connection
    *
    * @return object
    *
    * ejecuta una sql query
    *
    * @param string $query
    *
    * @return object
    *
    * @return close cierra una conexión
    */
   public function __construct()
   {
    try
   {
    $dsn = 'mysql:dbname=' . DATABASE_NAME . ';host=' . SERVER_NAME;
    $this->connection = new PDO($dsn, USER_NAME, PASSWORD);
    return $this->connection;
   }catch(PDOException $e){
   die("conexion fallida");
   }

   return $this->connection;
} 
public function prepare($query)
{
return $this->connection->prepare($query);   
}
public function query($query)
{
   return $this->connection->query($query);
}
public function close()
{
   $this->connection=null;
}

}



?>