<?php
	 
	 
	function open_database()
	{
		$servername = "localhost";
		$username = "root";
		$password = "";
		try {
			$conn = new PDO("mysql:host=$servername;dbname=wda_crud", $username, $password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			// if($conn){
			// 	echo "conexao efetuada";
			// }
			return $conn;
		} catch (Exception $e) {
			echo $e->getMessage();
			return null;
		}
	}

	function close_database($conn)
	{
		try {
			$conn = null;
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

		/**
		 *  Pesquisa um Registro pelo ID em uma Tabela
		 */
	function find($table = null, $id = null)
	{
		try {
			$database = open_database();
			$found = null;
			if ($id) {
				$stmt = $database->prepare("SELECT * FROM " . $table . " WHERE id = ?");
				$stmt->bindParam(1, $id);
	 
				$stmt->execute();
	 
				if($stmt->rowCount() > 0) {
					$found = $stmt->fetch(PDO::FETCH_ASSOC);
				}
			} else {
				$stmt = $database->prepare("SELECT * FROM " . $table);
				$stmt->execute();
	 
				if ($stmt->rowCount() > 0) {
					$found = $stmt->fetchAll(PDO::FETCH_ASSOC);
	 
					/* Metodo alternativo
						$found = array();
						while ($row = $result->fetch_assoc()) {
						array_push($found, $row);
						} */
				}
			}
		} catch (Exception $e) {
			$_SESSION['message'] = $e->GetMessage();
			$_SESSION['type'] = 'danger';
		}
	 
		close_database($database);
		return $found;
	}

	function find_all( $table ) {
		return find($table);
	}

	function formatadata( $date, $formato ) {
		$dt = new Datetime($date, new DatetimeZone("America/Sao_Paulo"));
		return $dt ->format($formato);
	}
	
	function formatacep( $cep ) {
		$cp = substr($cep,0 ,5). "-" . substr($cep,5);
		return $cp;
	}
	
	function formatacpfcnpj($cpf_cnpj) {
		$cpf_cnpj = substr($cpf_cnpj, 0, 3) . "." . substr($cpf_cnpj, 3, 3) . "." . substr($cpf_cnpj, 6, 3) . "-" . substr($cpf_cnpj,9, 2);
		return $cpf_cnpj;
	}
	
	/*
	formata o telefone
	*/
	
	function formataphone($phone) 
	{
		$phone = substr($phone, 0, 4) . "-" . substr($phone, 4, 4);
		return $phone;
	}

	/*
	formata celular
	*/
	
	function formatamobile($mobile) 
	{
		$mobile = "(" . substr($mobile, 0, 2) . ") " . substr($mobile, 2, 5) . "-" . substr($mobile, 5, 4);
		return $mobile;
	}
		
	// /**
	//  *  Insere um registro no BD
	//  */
	function save($table = null, $data = null)
	{
	 
		$database = open_database();
	 
		$columns = null;
		$values = null;
	 
		//print_r($data);
	 
		foreach ($data as $key => $value) {
			$columns .= trim($key, "'") . ",";
			$values .= "'$value',";
		}
	 
		// remove a ultima virgula
		$columns = rtrim($columns, ',');
		$values = rtrim($values, ',');
	 
		
		$stmt = $database->prepare("INSERT INTO " . $table . "($columns)" . " VALUES " . "($values);");
	 
		try {
			$stmt->execute();
			$_SESSION['message'] = 'Registro cadastrado com sucesso.';
			$_SESSION['type'] = 'success';
		} catch (PDOException $e) {
	 
			$_SESSION['message'] = 'Nao foi possivel realizar a operacao.';
			$_SESSION['type'] = 'danger';
		}
	 
		close_database($database);
	}
 
 
	function update($table = null, $id = 0, $data = null)
	{
	 
		$database = open_database();
	 
		$items = null;
	 
		foreach ($data as $key => $value) {
			$items .= trim($key, "'") . "='$value',";
		}
	 
		// remove a ultima virgula
		$items = rtrim($items, ',');
	 
		$stmt = $database->prepare("UPDATE " . $table . " SET $items" . " WHERE id= ? ;");
		try {
			$stmt->bindParam(1, $id);
			$stmt->execute();
	 
			$_SESSION['message'] = 'Registro atualizado com sucesso.';
			$_SESSION['type'] = 'success';
		} catch (Exception $e) {
	 
			$_SESSION['message'] = 'Nao foi possivel realizar a operacao.';
			$_SESSION['type'] = 'danger';
		}
	 
		close_database($database);
	}
	 
	function remove($table = null, $id = null)
	{
	 
		$database = open_database();
	 
		try {
			if ($id) {
	 
				$stmt = $database->prepare("DELETE FROM " . $table . " WHERE id = ? ");
				$stmt->bindParam(1, $id);
				$result = $stmt->execute();
	 
				if ($result) {
					$_SESSION['message'] = "Registro Removido com Sucesso.";
					$_SESSION['type'] = 'success';
				}
			}
		} catch (Exception $e) {
	 
			$_SESSION['message'] = $e->GetMessage();
			$_SESSION['type'] = 'danger';
		}
	 
		close_database($database);
	}
 
	/**
	* Pesquisa registros pelo parametro $p que foi passado
	*/
	function filter( $table = null, $p=null) {
 
	$database = open_database();
	$found = null;
 
	try{
		if ($p) {
			$stmt = $database->prepare("SELECT * FROM ". $table . " WHERE nome LIKE ?");
			$stmt->bindParam(1, $p, PDO::PARAM_STR);
			$stmt->execute();
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
			if ($stmt->rowCount() > 0){
				$found = $result;
			} else{
				throw new Exception("Não foram encontrados registros de dados!");
			}
		}
	} catch(Exception $e) {
		$_SESSION['message'] = "Ocorreu um erro: " . $e->GetMessage();
		$_SESSION['type'] = "danger";
	}
 
		close_database($database);
		return $found;
	}

	
	/**
	* Criptografia
	*/
	function criptografia($senha) {
		$custo = "08";
		$salt = "CflfllePArKlBJomM0F6aJ";
		$hash = crypt($senha, "$2a$" . $custo . "$" . $salt . "$");
		
		return $hash;
	}
	
	function clear_messages(){
		$_SESSION['message'] = null;
		$_SESSION['type'] = null;
	}
?>