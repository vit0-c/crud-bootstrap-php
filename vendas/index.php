<?php
	include("functions.php");
	if (!isset($_SESSION)) session_start();
	index();
	include(HEADER_TEMPLATE); 
?>

	<header style="margin-top:10px;">
		<div class="row">
			<div class="col-sm-6">
				<h2>Usuários</h2>
			</div>
			<div class="col-sm-6 text-end h2">
				<?php if (isset($_SESSION['user'])) : ?>
				<a class="btn btn-secondary" href="add.php"><i class="fa fa-plus"></i> Nova Venda</a>
				<?php else : ?>
						<a class="btn btn-light disabled" href="#"><i class="fa-solid fa-user-plus"></i> Nova Venda</a>
				<?php endif ?>
				<a class="btn btn-light" href="index.php"><i class="fa-solid fa-refresh"></i> Atualizar</a>
			</div>
		</div>
	</header>
		<?php if (!empty($_SESSION['message'])) : ?>
			<div class="alert alert-<?php echo $_SESSION['type']; ?> alert-dismissible" role="alert">
				<?php echo $_SESSION['message']; ?>
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
		<?php clear_messages(); ?>
		<?php endif; ?>
			<table class="table table-hover">
				<thead>
					<tr>
						<th>ID</th>
						<th>FormaPgto</th>
						<th>Obs</th>
						<th>DataVenda</th>
						<th>DataEntrega</th>
						<th>Foto NF</th>
						<th>Opções</th>
					</tr>
				</thead>
				<tbody>
		<?php if ($vendas) : ?>
			<?php foreach ($vendas as $venda) : ?>
					<tr>
						<td allign='center'><?php echo $venda['id']; ?></td>
						<td><?php echo $venda['formapgto']; ?></td>
						<td><?php echo $venda['obs']; ?></td>
						<td><?php echo formatadata($venda['datavenda'], "d/m/Y"); ?></td>
						<td><?php echo formatadata($venda['dataentrega'], "d/m/Y"); ?></td>
						<td><?php 
								if(!empty($venda['foto'])){
									echo "<img src=\"fotos/" . $venda['foto'] . "\" class=shadow p-1 mb-1 bg-body rouded\" width=\"100px\">";
								} else {
									echo "<img src=\"fotos/semimagem.jpg\" class=shadow p-1 mb-1 bg-body rouded\" width=\"100px\">";
								}
							?>
						</td>
						<td>
							<a href="view.php?id=<?php echo $venda['id']; ?>" class="btn btn-sm btn-light"><i class="fa fa-eye"></i> Visualizar</a>
							<?php if (isset($_SESSION['user'])) : ?>
							<a href="edit.php?id=<?php echo $venda['id']; ?>" class="btn btn-sm btn-secondary"><i class="fa fa-pencil"></i> Editar</a>
							<a href="#" class="btn btn-sm btn-dark" data-bs-toggle="modal" data-bs-target="#delete-user-modal" data-usuario="<?php echo $venda['id']; ?>">
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
<?php include("modal.php"); ?>
<?php include(FOOTER_TEMPLATE); ?>