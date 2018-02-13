<?php
class User {

	//login
	public function Login($login,$senha){
		
		//check the user
		$sql = 'SELECT User, Password FROM User WHERE User = :login';
		$sql = Connection::prepare($sql);
		$sql->bindValue(":login", $login);
		$result = Connection::select($sql);
		
		if(sizeof($result) == 0 ){
			return 1;
		}
		
		foreach($result as $row){
            $hash = $row['Password'];
            if (crypt($senha, $hash) != $hash) {
                return 1;
            }
		}
		return 0;
	}
}