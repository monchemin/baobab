<?php
namespace FactorData;

/*
*/
use PDO;
final class FactorMysqlManager implements IFactorDbManager {

    
    protected $pdo;

    protected function __construct($arrayConfig) {
       
        try {
            $this->pdo =  new PDO('mysql:host='. $arrayConfig['host'] . ';dbname='. $arrayConfig['dbname'] .';charset=utf8', 
                                    $arrayConfig['user'], 
                                    $arrayConfig['password'], 
                                    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
                                );
                                
        } catch( Exception $pdoError)
        {
            die('Erreur : ' . $pdoError->getMessage());
        }   

    }

    
    public function insertData($queryString, $pamarsArray=null, $lastInsert=false) {
        
        $pdoQuery = $this->pdo->prepare($queryString);
        try {
                $pdoResult =  $pdoQuery->execute($pamarsArray);
                
                if( $pdoQuery->rowCount() && $lastInsert ){ 
                    //return result as array
                    return  $this->pdo->lastInsertId;
                }
        } catch(PDOException $pdoError ) {
            
        }
    }

    public function getData($queryString, $pamarsArray=null) {
        $pdoQuery = $this->pdo->prepare($queryString);
        try {
                $pdoResult =  $pdoQuery->execute($pamarsArray);
                if( $pdoQuery->rowCount() ){ 
                    //return result as array
                    $arrayResult =  $pdoQuery->fetchAll();
                    $pdoQuery->closeCursor();
                    return $arrayResult;
                }
        } catch(PDOException $pdoError ) {
            
        }
    }
    

    public function ModifyData($queryString, $pamarsArray=null, $returnLine=false){
        $pdoQuery = $this->pdo->prepare($queryString);
        try {
                $pdoResult =  $pdoQuery->execute($pamarsArray);
                if( $pdoQuery->rowCount() && $returnLine ){ 
                    //return result as array
                    return $pdoResult->lastInsertId;
                }
        } catch(PDOException $pdoError ) {
            
        }
    }

    

    public function getTableInfo() {
        
    }

    public static function getConnexion($arrayConfig) {
        return new FactorMysqlManager($arrayConfig);

    }


}

?>