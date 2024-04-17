<?php 
  include("functions.php");
  if (!isset($_SESSION)) session_start();
  if (isset($_SESSION['user'])){
	  }
 else {
	  $_SESSION['message'] = "Você precisa estar logado para acessar esse recurso!";
	  $_SESSION['type'] = "danger";
	  header("Location: " .  BASEURL . "index.php");
  }
  edit();
?>

<?php include(HEADER_TEMPLATE); ?>

			<h2>Atualizar Cliente</h2>

			<form action="edit.php?id=<?php echo $customer['id']; ?>" method="post">
			  <hr />
				<div class="row">
					<div class="form-group col-md-7">
					  <label for="name">Nome / Razão Social</label>
					  <input type="text" class="form-control" minlength="2" maxlength="60" placeholder="Digite seu Nome/Razão Social" name="customer['name']" value="<?php echo $customer['name']; ?>" required>
					</div>

					<div class="form-group col-md-3">
					  <label for="campo2">CNPJ / CPF</label>
					  <input type="text" class="form-control" minlength="11" maxlength="11" placeholder="Digite seu CNPJ/CPF" name="customer['cpf_cnpj']" value="<?php echo $customer['cpf_cnpj']; ?>" required>
					</div>

					<div class="form-group col-md-2">
					  <label for="campo3">Data de Nascimento</label>
					  <input type="date" class="form-control" name="customer['birthdate']" value="<?php echo formatadata($customer['birthdate'], "Y-m-d"); ?>">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-5">
					  <label for="campo1">Endereço</label>
					  <input type="text" class="form-control" minlength="8" maxlength="60" placeholder="Digite seu Endereço" name="customer['address']" value="<?php echo $customer['address']; ?>" required>
					</div>

					<div class="form-group col-md-3">
					  <label for="campo2">Bairro</label>
					  <input type="text" class="form-control" minlength="5" maxlength="50" placeholder="Digite seu Bairro" name="customer['hood']" value="<?php echo $customer['hood']; ?>" required>
					</div>

					<div class="form-group col-md-2">
					  <label for="campo3">CEP</label>
					  <input type="text" class="form-control" minlength="8" maxlength="8" placeholder="Digite seu CEP" name="customer['zip_code']" value="<?php echo $customer['zip_code']; ?>" required>
					</div>

					<div class="form-group col-md-2">
					  <label for="campo3">Data de Cadastro</label>
					  <input type="date" class="form-control" name="customer['created']" disabled value="<?php echo formatadata($customer['created'], "Y-m-d"); ?>" required>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-5">
					  <label for="campo1">Município</label>
					  <input type="text" class="form-control" minlength="4" maxlength="50" placeholder="Digite seu Município" name="customer['city']" value="<?php echo $customer['city']; ?>" required>
					</div>

					<div class="form-group col-md-2">
					  <label for="campo2">Telefone</label>
					  <input type="text" class="form-control" minlength="8" maxlength="8" placeholder="Digite seu Telefone"  name="customer['phone']" value="<?php echo $customer['phone']; ?>" required>
					</div>

					<div class="form-group col-md-2">
					  <label for="campo3">Celular</label>
					  <input type="text" class="form-control" minlength="11" maxlength="11" placeholder="Digite seu Celular" name="customer['mobile']" value="<?php echo $customer['mobile']; ?>" required>
					</div>

					<div class="form-group col-md-1">
					  <label for="campo3">UF</label>
					  <input type="text" class="form-control" minlength="2" maxlength="2" placeholder="UF" name="customer['state']" value="<?php echo $customer['state']; ?>" required>
					</div>

					<div class="form-group col-md-2">
					  <label for="campo3">Inscrição Estadual</label>
					  <input type="text" class="form-control" minlength="9" maxlength="9" placeholder="Digite sua IE" name="customer['ie']" value="<?php echo $customer['ie']; ?>">
					</div>
				</div>
					<div id="actions" class="row mt-2">
						<div class="col-md-12">
							<button type="submit" class="btn btn-secondary"><i class="fa-solid fa-sd-card"></i> Salvar</button>
							<a href="index.php" class="btn btn-light"><i class="fa-solid fa-arrow-left"></i> Cancelar</a>
						</div>
				</div>
			</form>
<?php include(FOOTER_TEMPLATE); ?>