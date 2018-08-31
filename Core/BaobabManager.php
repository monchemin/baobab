<?php

namespace Baobab\Core;

/* BaobadManager : classe manager qui gère la communication avec l'interface utilisateur
*   @version 1.0
*   @author : NK
*
*/
use Baobab\LowLevel;

final class BaobabManager {
    
    protected $connexion;

    protected function __construct($arrayConfig) {
    
        $this->connexion = $this -> makeConnexion($arrayConfig);
    }
    
    // choisi la connexion par rapport au driver spécifier dans le tableau de configuration
    protected function makeConnexion($arrayConfig) {
        
        switch ($arrayConfig['dbdriver']) {
            case  'mysql' :
                return MysqlManager::getConnexion($arrayConfig);
                break;
            default :
                return null;
        }
        
    }

    public function getOne() {

    }

    public function getAll($filterArray, $groupByArray, $orderByArray) {

    }

    
    public function putData(Object $insertObject) {

    }
    public function postData(Object $insertObject, $fieldArray=null, $fields=false) {
    
    }
    public function deleteData(Object $insertObject) {

    }

    public function getData($query, $params) {
        return new EntityManager($query, $params, $this->connexion);
    }

    // fonction d'entrée pour assurer une seule instance du manager 
    public static function create($arrayConfig) {

        return  ( is_array($arrayConfig) &&  count($arrayConfig) < 4 ) ?   new Baobab($arrayConfig) : null; 
        
    }

}
?>