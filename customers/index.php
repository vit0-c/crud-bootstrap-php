<?php
	require ("functions.php");
	if (!isset($_SESSION)) session_start();
	index();
	
?>

<?php include(HEADER_TEMPLATE); ?>
			
			<header class='mt-2'>
				<div class="row">
					<div class="col-sm-6">
						<h2>Clientes</h2>
					</div>
					<div class="col-sm-6 text-end h2">
					<?php if (isset($_SESSION['user'])) : ?>
						<a class="btn btn-light" href="add.php"><i class="fa-solid fa-user-plus"></i> Novo Cliente</a>
					<?php else : ?>
						<a class="btn btn-light disabled" href="#"><i class="fa-solid fa-user-plus"></i> Novo Cliente</a>
				<?php endif ?>
						<a class="btn btn-default" href="index.php"><i class="fa-solid fa-refresh"></i> Atualizar</a>
					</div>
				</div>
			</header>
			<?php if (!empty($_SESSION['message'])) : ?>
			<div class="alert alert-<?php echo $_SESSION['type']; ?> alert-dismissible" role="alert">
				<button type="button" class="close" data-bs-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<?php echo $_SESSION['message']; ?>
			</div>
			<?php clear_messages(); ?>
			<?php endif; ?>
			<hr>
			<table class="table table-hover">
			<thead>
			<tr>
			<th>ID</th>
			<th width="30%">Nome</th>
			<th>CPF/CNPJ</th>
			<th>Telefone</th>
			<th>Adicionado em</th>
			<th>Atualizado em</th>
			<th>Opções</th>
			</tr>
			</thead>
			<tbody>
			<?php if ($customers) : ?>
			<?php foreach ($customers as $customer) : ?>
			<tr>
			<td><?php echo $customer['id']; ?></td>
			<td><?php echo $customer['name']; ?></td>
			<td><?php echo formatacpfcnpj($customer['cpf_cnpj']); ?></td>
			<td><?php echo formatamobile($customer['mobile']); ?></td>
			<td><?php echo formatadata($customer['created'], "d/m/Y - H:i:s"); ?></td>
			<td><?php echo formatadata($customer['modified'], "d/m/Y - H:i:s"); ?></td>
			<td>
				<a href="view.php?id=<?php echo $customer['id']; ?>" class="btn btn-sm btn-light"><i class="fa fa-eye"></i> Visualizar</a>
				<?php if (isset($_SESSION['user'])) : ?>
				<a href="edit.php?id=<?php echo $customer['id']; ?>" class="btn btn-sm btn-secondary"><i class="fa fa-pencil"></i> Editar</a>
				<a href="#" class="btn btn-sm btn-dark" data-bs-toggle="modal" data-bs-target="#delete-modal-label" data-customer="<?php echo $customer['id']; ?>">
					<i class="fa fa-trash"></i> Excluir
				</a>
				<?php else : ?>
					<a href="" class="btn btn-sm btn-secondary disabled"><i class="fa fa-pencil"></i> Editar</a>
				<a href="#" class="btn btn-sm btn-dark disabled" data-bs-toggle="modal" data-bs-target="#delete-user-modal" data-customer="<?php echo $customer['id']; ?>">
					<i class="fa fa-trash"></i> Excluir
				</a>
				<?php endif ?>

			</td>
			</tr>
			<?php endforeach; ?>
			<?php else : ?>
			<tr>
			<td colspan="6">Nenhum registro encontrado.</td>
			</tr>
			<?php endif; ?>
			</tbody>
			</table>

<?php include('modal.php'); ?>
<?php include(FOOTER_TEMPLATE); ?>