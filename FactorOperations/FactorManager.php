<?php

namespace FactorOperations;

/* BaobadManager : classe manager qui gère la communication avec l'interface utilisateur
*   @version 1.0
*   @author : NK
*
*/
use FactorData\FactorMysqlManager;

final class FactorManager {
    
    protected $connexion;
    const insert = 1;
    const update = 2;
    const delete = 3;

    protected function __construct($arrayConfig) {
        $this->connexion = $this -> makeConnexion($arrayConfig);
    }
    
    // choisi la connexion par rapport au driver spécifier dans le tableau de configuration
    protected function makeConnexion($arrayConfig) {
        switch (strtolower($arrayConfig['dbdriver'])) {
            case  'mysql' :
                return FactorMysqlManager::getConnexion($arrayConfig);
                break;
            default :
                return null;
        }
        
    }
/**
 * information simplify by using class's instance.
 */

    public function insertData($insertObject, $lastInsert=false) {

        $this->executeQuery($insertObject, $lastInsert=false, self::insert);
    }
  
    public function changeData($insertObject, $lastInsert=false) {

        $this->executeQuery($insertObject, $lastInsert=false, self::update);
        
    }
  
    public function deleteData($insertObject) {
        $this->executeQuery($insertObject, $lastInsert=false, self::delete);
    }
  
   
    // get records by criteria
    public function getData($strClassName, $fieldList=array(), $whereArray=array(), $orderByArray=array()) {
        $queryAndParams = FactorUtils::makeGetDataQuery($strClassName, $fieldList, $whereArray, $orderByArray);
        $result = $this->connexion->getData($queryAndParams['query'], $queryAndParams['sqlVars']);
    
    }

/**
 * data retrieve by complexe query
 */
    public function getDataByQuery($query, $params) {
        return new EntityManager($query, $params, $this->connexion);
    }

    protected function getObjectVarsValues($insertObject) {
       // FactorUtils::

    }

    protected function executeQuery($insertObject, $lastInsert=false, $operation) {
        $queryAndParams = array();
        switch ($operation) {
            case self::insert :
                $queryAndParams = FactorUtils::makeInsertQuery($insertObject);
            case self::update :
                $queryAndParams = FactorUtils::makeUpdateQuery($insertObject);
            case self::delete :
                $queryAndParams = FactorUtils::makedeleteQuery($insertObject);
        }
         $this->connexion->modifyData($queryAndParams['query'], $queryAndParams['sqlVars'], $lastInsert);
        
    }

    // fonction d'entrée pour assurer une seule instance du manager 
    public static function create($arrayConfig) {
        return  ( is_array($arrayConfig) &&  count($arrayConfig) >= 4 ) ?   new FactorManager($arrayConfig) : null; 
        
    }

}
?>