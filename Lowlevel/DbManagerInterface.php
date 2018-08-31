<?php
/*
* Interface de gestion des bases
*/
namespace Baobab\LowLevel;

interface DbManagerInterface {
    //insertion
    public function InsertData();
    // recuperation
    public function getData(); 
    // mise a jour et suppression
    public function modifyData();
   
    //recuperation des informations sur une table
    public function getTableInfo(); 
           
}
?>