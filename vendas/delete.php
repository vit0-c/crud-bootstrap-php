<?php 
	include("functions.php"); 

	if (isset($_GET['id'])){
		try{
			//consultando o usuário para obter o nome do arquivo da foto
			$venda = find("vendas", $_GET['id']);
			//Chamando a função delete para apagar o usuário do banco de dados
			delete($_GET['id']);
			//Apagando o araquivo da foto do usuário pasta fotos
			unlink("fotos/" . $venda['foto']);
		}catch (Exeption $e){
			$_SESSION['message'] = "Não foi possível realizar a operação: " . $e->GetMessage();
			$_SESSION['type'] = "danger";
		}
	}
?>