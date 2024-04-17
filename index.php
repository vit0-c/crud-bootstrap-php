<?php 
    require "config.php"; 
    require DBAPI; 
	if (!isset($_SESSION)) session_start();
    include(HEADER_TEMPLATE);
    $db = open_database(); 
?>

            <hr>
            <h1>Dashboard</h1>

            <?php if ($db) : ?>

				<div class="row">
					<?php if (isset($_SESSION['user'])) : ?>
						<div class="col-lg-2 col-sm-3 col-md-2">
							<a href="<?php echo BASEURL; ?>customers/add.php" class="btn btn-secondary">
								<div class="row">
									<div class="col-xl-12 text-center">
										<i class="fa-solid fa-user-plus fa-5x"></i>
									</div>
									<div class="col-xl-12 text-center">
										<p>Novo Cliente</p>
									</div>
								</div>
							</a>
						</div>
					<?php else : ?>
						<div class="col-lg-2 col-sm-3 col-md-2">
							<a href="#" class="btn btn-outline-secondary disabled">
								<div class="row">
									<div class="col-xl-12 text-center">
										<i class="fa-solid fa-user-plus fa-5x"></i>
									</div>
									<div class="col-xl-12 text-center">
										<p>Novo Cliente</p>
									</div>
								</div>
							</a>
						</div>
					<?php endif ?>

					<div class="col-lg-2 col-sm-3 col-md-2">
						<a href="<?php echo BASEURL; ?>customers" class="btn btn-light">
							<div class="row">
								<div class="col-xl-12 text-center">
									<i class="fa-solid fa-user fa-5x"></i>
								</div>
								<div class="col-xl-12 text-center">
									<p>Clientes</p>
								</div>
							</div>
						</a>
					</div>
				</div>
				
				<div class="row" id="actions">
					<?php if (isset($_SESSION['user'])) : ?>
						<div class="col-lg-2 col-sm-3 col-md-2">
							<a href="<?php echo BASEURL; ?>vendas/add.php" class="btn btn-secondary">
								<div class="row">
									<div class="col-xl-12 text-center">
										<i class="fa-solid fa-file-circle-plus fa-5x"></i>
									</div>
									<div class="col-xl-12 text-center">
										<p>Nova Venda</p>
									</div>
								</div>
							</a>
						</div>
					<?php else : ?>
						<div class="col-lg-2 col-sm-3 col-md-2">
							<a href="#" class="btn btn-outline-secondary disabled">
								<div class="row">
									<div class="col-xl-12 text-center">
										<i class="fa-solid fa-box fa-5x"></i>
									</div>
									<div class="col-xl-12 text-center">
										<p>Nova Venda</p>
									</div>
								</div>
							</a>
						</div>
						<?php endif ?>
					
					<div class="col-lg-2 col-sm-3 col-md-2">
						<a href="<?php echo BASEURL; ?>vendas" class="btn btn-light">
							<div class="row">
								<div class="col-xl-12 text-center">
									<i class="fa-solid fa-file-invoice-dollar fa-5x"></i>
								</div>
								<div class="col-xl-12 text-center">
									<p>Vendas</p>
								</div>
							</div>
						</a>
					</div>
				</div>
				<?php if (isset($_SESSION['user'])) : ?>
					<?php if ($_SESSION['user'] == "admin") : ?>
						<div class="row" id="actions">
							<div class="col-lg-2 col-sm-3 col-md-2">
								<a href="<?php echo BASEURL; ?>usuarios/add.php" class="btn btn-secondary">
									<div class="row">
										<div class="col-xl-12 text-center">
											<i class="fa-solid fa-user-tie fa-5x"></i>
										</div>
										<div class="col-xl-12 text-center">
											<p>Novo usuário</p>
										</div>
									</div>
								</a>
							</div>
							
							<div class="col-lg-2 col-sm-3 col-md-2">
								<a href="<?php echo BASEURL; ?>usuarios" class="btn btn-light">
									<div class="row">
										<div class="col-xl-12 text-center">
											<i class="fa-solid fa-user-lock fa-5x"></i>
										</div>
										<div class="col-xl-12 text-center">
											<p>Usuários</p>
										</div>
									</div>
								</a>
							</div>
						</div>
					<?php endif; ?>
				<?php endif; ?>

			<?php else : ?>
					<!-- <div class="alert alert-danger" role="alert">
						<p><strong>ERRO:</strong> Não foi possível Conectar ao Banco de Dados!</p>
					</div> -->
					<?php if (!empty($_SESSION['message'])) : ?>
						<div class="alert alert-<?php echo $_SESSION['type']; ?> alert-dimissible" role="alert">
							<p><strong>ERRO:</strong> Não foi possível Conectar ao Banco de Dados!<br>
							<?php echo $_SESSION['message']; ?></p>
							<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
						<?php clear_messages();?>
					<?php endif?>
            <?php endif; ?>

<?php include(FOOTER_TEMPLATE); ?>