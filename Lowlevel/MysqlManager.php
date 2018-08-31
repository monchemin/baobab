<?php
namespace Baobab\LowLevel;

/*
*/

final class MysqlManager implements DbManagerInterface {

    
    protected $pdo;

    private function __constuct($arrayConfig) {

        try {
            $this->pdo =  new PDO('mysql:host='+ $arrayConfig['host'] +';dbname='+ $arrayConfig['dbname'] +';charset=utf8', 
                                    $arrayConfig['user'], 
                                    $arrayConfig['password'], 
                                    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
                                );
        } catch( Exception $pdoError)
        {
            die('Erreur : ' . $pdoError->getMessage());
        }   

    }

    

    public function InsertData($queryString, $pamarsArray=null, $lastInsert=false) {
        $pdoQuery = $this->pdo->prepare($queryString);
        try {
                $pdoResult =  $pdoResult->execute($pamarsArray);
                if( $pdoResult->rowCount() && $lastInsert ){ 
                    //return result as array
                    return $pdoResult->lastInsertId;
                }
        } catch(PDOException $pdoError ) {
            
        }
    }

    public function getData($queryString, $pamarsArray=null, $lastInsert=false) {
        $pdoQuery = $this->pdo->prepare($queryString);
        try {
                $pdoResult =  $pdoResult->execute($pamarsArray);
                if( $pdoResult->rowCount() ){ 
                    //return result as array
                    $arrayResult =  $pdoResult->fetch(PDO::FETCH_ASSOC);
                    $pdoResult->closeCursor();
                    return $arrayResult;
                }
        } catch(PDOException $pdoError ) {
            
        }
    }
    

    public function ModifyData($queryString, $pamarsArray=null){
        $pdoQuery = $this->pdo->prepare($queryString);
        try {
                $pdoResult =  $pdoResult->execute($pamarsArray);
                if( $pdoResult->rowCount() && $lastInsert ){ 
                    //return result as array
                    return $pdoResult->lastInsertId;
                }
        } catch(PDOException $pdoError ) {
            
        }
    }

    

    public function getTableInfo() {
        
    }

    public static function getConnexion($arrayConfig) {

        return new DbManager($arrayConfig);

    }


}

?>