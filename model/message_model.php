<?php
class Message {

	//insert the message in DB
	public function InsertMessage($nickname, $question, $suggestion){
		try{
			//mount the sql
			$sql = 'INSERT INTO Messages(Nickname,Question,Message,Active,Date_registered) VALUES(:nickname,:question,:suggestion,:active,:date)';
			$sql = Connection::prepare($sql);
			$sql->bindValue(":nickname", $nickname);
			$sql->bindValue(":question", $question);
			$sql->bindValue(":suggestion", $suggestion);
			$sql->bindValue(":active", 1);
			$sql->bindValue(":date", date("Y-m-d H:i:s"));

			Connection::update($sql);
			return 0;
		}catch(Exception $e){
			return 1;
		}
	}

	//insert the message in DB
	public function DeleteMessage($message){
		try{
			//mount the sql and just update the active
			$sql = 'UPDATE Messages SET Active = 0 WHERE Id_message = :message';
			$sql = Connection::prepare($sql);
			$sql->bindValue(":message", $message);
			Connection::update($sql);
			return 0;
		}catch(Exception $e){
			return 1;
		}
	}

	public function getMessages() {
		//get the messages that is active
		$sql = 'SELECT Id_message,Nickname,Question,Message FROM Messages WHERE (Active = 1) ORDER BY Date_registered DESC';
		$sql = Connection::prepare($sql);
		$result = Connection::select($sql);

		return $result;
	}

	//get the total by options
	public function percentageQuestions() {
		$sql = 'SELECT Question, COUNT(1) Total FROM Messages WHERE (Active = 1) GROUP BY Question ORDER BY COUNT(1) DESC';
		$sql = Connection::prepare($sql);
		$result = Connection::select($sql);

		return $result;
	}
}

?>