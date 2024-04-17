
<?php
	include('functions.php');
	if (!isset($_SESSION)) session_start();
	view($_GET['id']);
	include(HEADER_TEMPLATE); 
?>
			<header>	
				<h2>Cliente <?php echo $customer['id']; ?></h2>
				<hr>
			</header>
			
			<?php if (!empty($_SESSION['message'])) : ?>
				<div class="alert alert-<?php echo $_SESSION['type']; ?>"><?php echo $_SESSION['message']; ?></div>
			<?php endif; ?>
			<dl class="dl-horizontal">
				<dt>Nome / Razão Social:</dt>
				<dd><?php echo $customer['name']; ?></dd>
				<dt>CPF / CNPJ:</dt>
				<dd><?php echo $customer['cpf_cnpj']; ?></dd>
				<dt>Data de Nascimento:</dt>
				<dd><?php echo formatadata($customer['birthdate'], "d/m/Y"); ?></dd>
			</dl>
			<dl class="dl-horizontal">
				<dt>Endereço:</dt>
				<dd><?php echo $customer['address']; ?></dd>
				<dt>Bairro:</dt>
				<dd><?php echo $customer['hood']; ?></dd>
				<dt>CEP:</dt>
				<dd><?php echo $customer['zip_code']; ?></dd>
				<dt>Data de Cadastro:</dt>
				<dd><?php echo formatadata($customer['created'], "d/m/Y - H:i:s"); ?></dd>
				<dt>Alterado em:</dt>
				<dd><?php echo formatadata($customer['modified'], "d/m/Y - H:i:s"); ?></dd>
			</dl>
			<dl class="dl-horizontal">
				<dt>Cidade:</dt>
				<dd><?php echo $customer['city']; ?></dd>
				<dt>Telefone:</dt>
				<dd><?php echo $customer['phone']; ?></dd>
				<dt>Celular:</dt>
				<dd><?php echo $customer['mobile']; ?></dd>
				<dt>UF:</dt>
				<dd><?php echo $customer['state']; ?></dd>
				<dt>Inscrição Estadual:</dt>
				<dd><?php echo $customer['ie']; ?></dd>
			</dl>
			<div id="actions" class="row">
				<div class="col-md-12">
				<?php if (isset($_SESSION['user'])) : ?>
					<a href="edit.php?id=<?php echo $customer['id']; ?>" class="btn btn-secondary"><i class="fa-solid fa-pencil"></i>Editar</a>
				<?php else : ?>
					<a href="#" class="btn btn-secondary disabled"><i class="fa-solid fa-pencil"></i>Editar</a>
				<?php endif ?>
					<a href="index.php" class="btn btn-light" ><i class="fa-solid fa-circle-arrow-left"></I>Voltar</a>
				</div>
			</div>
<?php include(FOOTER_TEMPLATE); ?>