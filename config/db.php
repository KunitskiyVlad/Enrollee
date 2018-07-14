<?php 
	class DBApi
		{
			public $pdo;
			 function __construct($params)
			 
			 {
			 	
			 	$this->connect($params);
			 
			 }

			 function connect($params)

			{
				extract($params);
				try{
					$options = [
			    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
			    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
			    			];

				$this->pdo = new PDO($dsn, $user, $pass, $options);
				
				}
				
				catch (PDOException $e) 
				{
					die();
        		}
				
				
			}

			public function select($tableName)
			{
				$sql = 'select * from '.$tableName;
				$row = $this->pdo->query($sql);
				while($result = $row->fetchALL(PDO::FETCH_ASSOC)){
				//print_r($result);
                return($result);
            }
			}

			public function insert($tableName, $values)
			{
				$set ='';
				foreach ($values as $key => $value) {
				
				$set = $set.' '.$key.' = '."'".$value." ',";
				}
			
			$set = 'SET '.$set;
			$set = rtrim($set,',');
			$sql = "INSERT INTO ".$tableName.' '.$set;
			$this->pdo->query($sql);
			}
			public function update($tableName, $values, $condition)
			{
				$set ='';
				foreach ($values as $key => $value) {
				
				$set = $set.' '.$key.' = '."'".$value." ',";
				}
			
			$set = 'SET '.$set;
			$set = rtrim($set,',');
			$where='';
			foreach ($condition as $key => $value) {
				
				$where = $where.' '.$key.' = '."'".$value." '";
				}
			$sql = "UPDATE ".$tableName.' '.$set.' WHERE '.$where;
			$this->pdo->query($sql);
			//echo $sql;
			}

			public function delete($tableName, $condition)
			{

			$where='';
			foreach ($condition as $key => $value) {
				
				$where = $where.' '.$key.' = '."'".$value." '";
				}
			$sql = "DELETE FROM ".$tableName.' '.' WHERE '.$where;
			$this->pdo->query($sql);
			//echo $sql;
			}

		}