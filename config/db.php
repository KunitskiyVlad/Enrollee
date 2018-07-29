<?php 


	class DBApi
		{
			public  $pdo;
			 function __construct()
			 
			 {
			 	$params = array(
				'dsn' => 'mysql:host=localhost;dbname=enrollee;charset=utf8' ,
				'user' => 'root',
				'pass' => '',
				);
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

				return $this->pdo = new PDO($dsn, $user, $pass, $options);
				
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
				//echo $sql;
				while($result = $row->fetchALL(PDO::FETCH_ASSOC)){
				//print_r($result);
                return($result);
            }
			}

			public function insert($tableName, $values)
			{  
				$i =1;
				$sql = "INSERT INTO ".$tableName.
				$set ='';
				$data = '';
				foreach ($values as $key => $value) {
				$data =$data.' '.'?'.',';
				$set = $set.' '.$key.',';
				
				}
			$set = rtrim($set,',');
			$data =rtrim($data, ',');
			$set ='('.$set.') ';
			$data ='VALUES ('.$data.') ';
			$sql = $sql.' '.$set.$data;
			$stmt = $this->pdo->prepare($sql);
			foreach ($values as $key => $value) 			
			{
				$stmt->bindValue($i,$value);
				$i++;
			}
			//echo $sql;
			$stmt->execute();
			}

			public function update($tableName, $values, $condition, $keys)
			{
				$set ='';
				foreach ($values as $key => $value) {
				
				$set = $set.' '.$key.' = '."'".$value." ',";
				}
			
			$set = 'SET '.$set;
			$set = rtrim($set,',');
			$where='';
			$where = $where.' '.$keys.' = '."'".$condition." '";
				
			$sql = "UPDATE ".$tableName.' '.$set.' WHERE '.$where;
			$this->pdo->query($sql);
			echo $sql;
			}

			static function delete($tableName, $condition)
			{

			$where='';
			foreach ($condition as $key => $value) {
				
				$where  = $where.' '.$key.' = '."'".$value." '";
				}
			$sql = "DELETE FROM ".$tableName.' '.' WHERE '.$where;
			$this->pdo->query($sql);
			//echo $sql;
			}
			
			public function selectOne($tableName, $condition, $key)
			{
			$where='';
		    //var_dump( $condition);
			$where = $where.' '.$key.' =  ?';
			$sql = "SELECT *FROM ".$tableName.' '.' WHERE '.$where;
			$stmt = $this->pdo->prepare($sql);
			//echo $sql;
			$stmt->bindParam(1,$condition);
			$row =$stmt->execute();
			while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
				//print_r($result);
                return($result);
            }
			}

			public function Count($tableName, $condition = null, $key = null)
			{
			$where='';
		    //var_dump( $condition);
		    $sql = " SELECT COUNT(*) FROM ".$tableName;
		    if(isset($condition) && isset($key))
		    {
			$where = ' WHERE '.$key.' = '."'".$condition." '";
			$sql = $sql.$where;
			}
			//echo $sql;
			$row =$this->pdo->query($sql);
			while($result = $row->fetchColumn()){
				//print_r($result);
                return($result);
            }
			}

			public function Sort($tableName, $condition, $order, $start =null, $how = null ,$like=null, $conditionLike=null)
			{
				$sql = " SELECT name, surname, mark, age FROM ".$tableName.' ';

				if(isset($like) && isset($conditionLike))
				{
					$search = ' WHERE '.$conditionLike.' LIKE '.'?';
					$sql = $sql.$search;
				}
				
				$order=' ORDER BY '. $condition.' '.$order;
				//echo $sql;
				$sql = $sql.$order;
				$Limit ='';
				if(isset($start) && isset($how))
				{
					$Limit = $Limit.' LIMIT '.$start.', '.$how;
					$sql=$sql.$Limit;
					//echo $sql;
				}
				//echo $sql;
				//$row =$this->pdo->query($sql);
				$stmt = $this->pdo->prepare($sql);
				if(isset($like) && isset($conditionLike))
				{
				
				$like = '%'.$like.'%';
				$stmt->bindParam(1,$like);
				}
				$stmt->execute();
				while($result = $stmt->fetchALL(PDO::FETCH_ASSOC)){
				//print_r($result);
                return($result);
            }
			}
		}