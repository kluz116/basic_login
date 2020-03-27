<?php
require'connection.php';
session_start();
class Config extends Connection
{


public function loginUser()
{
	if(isset($_POST['username']) && isset($_POST['password'])){
		$username = $_POST['username'];
		$password = $_POST['password'];

		if (!empty($username) && !empty($password)) {
			try{

		    $data =$this->dbh-> prepare('select * from t_Users where password=:password and username=:username');
			$data->bindParam(':username',$username);
			$data->bindParam(':password',$password);
			$data->execute();

			$row = $data->fetch(PDO::FETCH_ASSOC);

			if($row){
				         $_SESSION['username'] = $username;
						if(isset($_SESSION['username'])){
                            header("Location:index.php");
                             exit();
						}else{
							 header("Location:login.php");
						}
			}else{
				echo "User Not Found.";
			}

			}catch(PDOException $e){
				trigger_error('Error: ' .$e->getMessage());
			}

		}else{

			echo "Fill In All Fields.";
		}
	}
}



public function session_details($username)
{
    $data =$this->dbh-> prepare('select Name from t_Users where username=:username');
			$data->bindParam(':username',$username);
            $data->execute();
            while ($row= $data->fetch(PDO::FETCH_ASSOC)) {

                $Name = $row['Name'];
                echo $Name;
            
            }

}




}