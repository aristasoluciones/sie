<?php 
include_once('../conexion.php');
class User 
{
	public $userId;
	public $pass;


	public function setUserId($value)
	{
		$this->userId = trim($value);
	}

	public function setPass($value)
	{
		$this->pass = trim($value);
	}

	public function Info()
	{
				
		$sql="select * from user where userId=".$this->userId."";
		$row=mysql_query($sql);
		$data=mysql_fetch_assoc($row);
		return $data;
	}
	
	public function loginUser()
	{
				
		$sql = "select COUNT(*) from user where usuario='".$this->userId."'";
		$p1=mysql_query($sql);
		$user=mysql_result($p1,0);
		
		return $user;
	}
	
	
	public function loginMedic()
	{
				
		$sql = "select COUNT(*) from medico where user='".$this->userId."'";
		$p1=mysql_query($sql);
		$user=mysql_result($p1,0);
		
		return $user;
	}
	
	public function loginUserpas()
	{
				
		$sql = "select COUNT(*) from user where usuario='".$this->userId."' and password ='".$this->pass."'";

		$p1=mysql_query($sql);
		$user=mysql_result($p1,0);
		
		return $user;
	}
	
	public function loginMedicpass()
	{
				
		$sql = "select COUNT(*) from medico where user='".$this->userId."' and pass ='".$this->pass."'";

		$p1=mysql_query($sql);
		$user=mysql_result($p1,0);
		
		return $user;
	}
	
	public function Infouser()
	{
				
		$sql = "select * from user where usuario='".$this->userId."' and password ='".$this->pass."'";

		$p1=mysql_query($sql);
		$user=mysql_fetch_assoc($p1);
		
		return $user;
	}
	
		public function InfoMedic()
	{
				
		 $sql = "select * from medico where user='".$this->userId."' and pass ='".$this->pass."'";

		$p1=mysql_query($sql);
		$user=mysql_fetch_assoc($p1);
		
		return $user;
	}
	
		public function AllowAccess()
	{	
			// session_start();
			if(!isset($_SESSION["userIdlogin"]))
			{
			header("Location:".WEB_ROOT);
			exit;
			}
	}

}

?>