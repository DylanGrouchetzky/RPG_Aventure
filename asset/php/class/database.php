<?php 

class Database {

    //Connection a la base de donné

    protected function dbConnect(){
		$db = new PDO('mysql:host=localhost;dbname=rpg_aventure;charset=utf8', 'root', '');
		return $db;
	}

    /*
    Renvoi une liste de donnée de la table selectionné 
    Prend 2 argument en paramétre
    1er: string => nom de la table 
    2éme: string => condition de selection
    */
    public function Query($table,$conditon = null){
		$db = $this->dbConnect();
		if($conditon === null){
			$list = $db->query('SELECT * FROM '.$table);
		}else{
			$list = $db->query('SELECT * FROM '.$table.' '.$conditon);
		}
		return $list;
	}
    /*
    Renvoi une option en HTML pour une selection de formulaire
    Prend 1 argument
    1er: string => nom de la table
    */
    public function listClasses($table){
        $list = $this->Query($table);
        while($data = $list->fetch()){
            echo '<option>'.$data['name'].'</option>';
        }
    }
	
}