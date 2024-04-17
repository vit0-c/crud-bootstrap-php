<?php
	include("functions.php");
	if (!isset($_SESSION)) session_start();
	view($_GET['id']);
	include(HEADER_TEMPLATE); 
?>
		<?php if (!empty($_SESSION['message'])) : ?>
			<div class="alert alert-<?php echo $_SESSION['type']; ?> alert-dismissible" role="alert" id="actions">
				<?php echo $_SESSION['message']; ?>
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
		<?php else: ?>
			<header>
				<h2>Venda <?php echo $venda['id']; ?></h2>
			</header>
			<hr>
			
			<dl class="dl-horizontal">
				<dt>FormaPgto:</dt>
				<dd><?php echo $venda['formapgto']; ?></dd>
				
				<dt>Observações: </dt>
				<dd><?php echo $venda['obs']; ?></dd>

				<dt>Data da Venda: </dt>
				<dd><?php echo formatadata($venda['datavenda'], "d-m-Y"); ?></dd>

				<dt>Data da Entrega: </dt>
				<dd><?php echo formatadata($venda['dataentrega'], "d-m-Y"); ?></dd>
				
				<dt>Foto:</dt>
				<dd><?php
					if(!empty($venda['foto'])) {
						echo "<img src=\"fotos/" . $venda['foto'] . "\" class=\"shadow p-1 mb-1 bg-body rounded\" width=\"300px\">";
					} else{
						echo "<img src=\"fotos/semimagem.jpg\" class=\"shadow p-1 mb-1 bg-body rounded\" width=\"300px\">";
					}
					?>
				</dd>
			</dl>
		<?php endif; ?>
		
			<div id="actions" class="row">
				<div class="col-md-12">
					<?php if (isset($_SESSION['user'])) : ?>
						<a href="edit.php?id=<?php echo $venda['id']; ?>" class="btn btn-secondary"><i class="fa-solid fa-pen-to-square"></i> Editar</a>
						<?php else : ?>
					<a href="" class="btn btn btn-secondary disabled"><i class="fa fa-pencil"></i> Editar</a>
						<?php endif; ?>
					<a href="index.php" class="btn btn-light"><i class="fa-solid fa-arrow-left"></i> Voltar</a>
				</div>
			</div>
		<?php clear_messages();?>
		
<?php include(FOOTER_TEMPLATE); ?>