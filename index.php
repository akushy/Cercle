<!DOCTYPE html>
<html>
<head>
	<title>Le CI recrute | Jérémie Rindone</title>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,400,700' rel='stylesheet' type='text/css'>

	<?php include("meta_opengraph.php"); ?>
</head>

<body>
	<nav>
		<div class="navbar navbar-inverse navbar-fixed-top">
			<div class="navbar-inner">
				<div class="container">
					<a class="brand" href="#">Exercices de PHP</a>
					<ul class="nav">
						<li><a href="https://github.com/akushy/PHP_DWM">Code Github</a></li>
						<li><a class="inactive" href="#">Plus d'exercices</a></li>
						<li><a class="inactive" href="#">Pense-bête</a></li>
					</ul>
				</div>
			</div>
		</div>
	</nav>

	<div class="row-fluid">
		<div class="span6 offset3">
			<!-- <pre> -->
				<?php 

					if(!empty($_POST["nickName"])) {
						die("Not me, buddy !"); 
					}

					function is_valid_email($mail){
						return filter_var($mail, FILTER_VALIDATE_EMAIL);
					}

					function cleaner($inputValue){
						return trim(strip_tags($inputValue));
					}

					if (count($_POST) > 0){

					$firstName 	= 	cleaner($_POST["firstName"]);
					$lastName 	= 	cleaner($_POST["lastName"]);
					$birthDay 	= 	cleaner($_POST["birthDay"]);
					$birthMonth = 	cleaner($_POST["birthMonth"]);
					$birthYear 	= 	cleaner($_POST["birthYear"]);
					$mail 		=	cleaner($_POST["mail"]);
					$adress 	=	cleaner($_POST["adress"]);
					$q1 		=	cleaner($_POST["q1"]);

					$errors = [
						"Vous n'avez pas entré votre nom.", 
						"Vous n'avez pas entré votre prénom.", 
						"Vous n'avez pas entré votre adresse mail.", 
						"Vous n'avez pas répondu à la question."
					];

					if($firstName == "") {
						echo $errors[0];
					}

					if($lastName == "") {
						echo $errors[1];
					}

					if(is_valid_email($mail)){
						echo $errors[2];
					} 

					if($mail == ""){
						echo $errors[2];
					}  

					if(empty($q1)) {
						echo $errors[3];
					}

					$thank = false;

					if(count($_POST) > 0){
						$to      = 'jeremie.rindone@gmail.com';
						$subject = 'Le cercle info recrute';
						$message = $firstName ." ". $lastName ." ". $birthDay ." ". $birthMonth ." ". $birthYear ." ". $mail ." ". $adress ." ". $q1;
						$headers = 'From: Formulaire du cercle' . "\r\n" .
						'Reply-To: jeremie.rindone@gmail.com' . "\r\n" .
						'X-Mailer: PHP/' . phpversion();

						mail($to, $subject, $message, $headers);
						
						$thank = true;
					} else {
						echo "Remplis tous les champs STP !";
					}
					

					// $result = $firstName ." ". $lastName ."<br>". $birthDay ." ". $birthMonth ." ". $birthYear ."<br>". $mail ."<br>". $adress ."<br>". $q1 ."<br>". $errors[1];
					// $result = $errors;
					// print_r($result);
					}
				?>
			<!-- </pre> -->


			<h1>Le cercle infographie recrute !</h1>
			<p>On est trois pelés et deux tondus à boire des Caras comme des clochards trois fois par semaine. <br/>
			On cherche donc des premières années motivés pour nous aider à finir nos palettes de bière. <br/>
			Rejoignez-nous et prouvons aux autres qu'on est mieux...</p>

			<p class="thank">
				<?php if ($thank == true) { echo "<div class='alert alert-success'>
				    <button type='button' class='close' data-dismiss='alert'>&times;</button>
				    <strong>Merci !</strong>, le formulaire a bien été envoyé !
				</div>"; } ?>
			</p>

			<p class="errors">
				<?php if (empty($firstName)) { echo "<div class='alert alert-error'>
				    <button type='button' class='close' data-dismiss='alert'>&times;</button>
				    <strong>Attention</strong>, $errors[0] 
				</div>"; } ?>
			</p>

			<p class="errors">
				<?php if (empty($lastName)) { echo "<div class='alert alert-error'>
				    <button type='button' class='close' data-dismiss='alert'>&times;</button>
				    <strong>Attention</strong>, $errors[1] 
				</div>"; } ?>
			</p>

			<p class="errors">
				<?php if (empty($mail)) { echo "<div class='alert alert-error'>
				    <button type='button' class='close' data-dismiss='alert'>&times;</button>
				    <strong>Attention</strong>, $errors[2] 
				</div>"; } ?>
			</p>
			
			<p class="errors">
				<?php if (empty($q1)) { echo "<div class='alert alert-error'>
				    <button type='button' class='close' data-dismiss='alert'>&times;</button>
				    <strong>Attention</strong>, $errors[3] 
				</div>"; } ?>
			</p>

				<form action="" method="post" >
					<ol>
						<li class="control-group span6">
							<div class="controls">
								<label class="control-label" for="inputFirstName">Nom *</label>
								<input type="text" id="inputFirstName" class="span12" name="firstName" placeholder="Rindone" 
								value="<?php if (isset($_POST['firstName'])){echo $_POST['firstName'];} ?>">
							</div>
						</li>
						<li class="span6">		
							<div class="controls">
								<label class="control-label" for="inputLastName">Prénom *</label>
								<input type="text" id="inputLastName" class="span12" name="lastName" placeholder="Jérémie"
								value="<?php if (isset($_POST['lastName'])){echo $_POST['lastName'];} ?>">
							</div>
						</li>	
						<li class="nickname">		
							<div class="controls">
								<label class="control-label" for="inputNickname">Surnom</label>
								<input type="text" id="inputNickname" name="nickName" placeholder="Jéronimo"
								value="<?php if (isset($_POST['nickName'])){echo $_POST['nickName'];} ?>">
							</div>
						</li>			
							
						<li class="control-group">
							<div class="span12">
								<div class="span2">
									<div class="controls">
										<label class="control-label" for="inputDay">Jour *</label>
										<select id="inputDay" class="span12" name="birthDay">
											<?php 
											for ($i = 1; $i <= 31; $i++) {
												echo "<option value='$i'>$i</option>";
											}								
											?>
										</select>
									</div>
								</div>

								<div class="span2">
									<div class="controls">
										<label class="control-label" for="inputMonth">Mois *</label>
										<select id="inputMonth" class="span12" name="birthMonth">
											<option value="janvier">Janvier</option>
											<option value="fevrier">Février</option>
											<option value="mars">Mars</option>
											<option value="avril">Avril</option>
											<option value="mai">Mai</option>
											<option value="juin">Juin</option>
											<option value="juillet">Juillet</option>
											<option value="aout">Aout</option>
											<option value="septembre">Septembre</option>
											<option value="octobre">Octobre</option>
											<option value="novembre">Novembre</option>
											<option value="decembre">Décembre</option>
										</select>
									</div>
								</div>

								<div class="controls span2">
									<label class="control-label" for="inputYears">Année *</label>
									<select id="inputYears" class="span12" name="birthYear">
										<?php 
										array_merge(array1);
										for ($i = 1950; $i <= date("Y") - 18; $i++) {
											echo "<option value='$i'>$i</option>";
										}								
										?>
									</select>
								</div>
							
								<div class="controls span6">
									<label class="control-label" for="inputMail">Mail *</label>
									<input type="text" id="inputMail" class="span12" name="mail" placeholder="jeremie.rindone@gmail.com"
									value="<?php if (isset($_POST['mail'])){echo $_POST['mail'];} ?>">
								</div>	
							</div>
						</li>
					
						<li class="control-group">
							<div class="span12">
								<label class="control-label" for="inputAdress">Adresse complète</label>
								<textarea type="text" id="inputAdress" class="span12" name="adress" placeholder="Rue Raymond, 91 — 4800 Verviers — Belgique " 
								rows="3"><?php if (isset($_POST['adress'])){echo $_POST['adress'];} ?></textarea>
							</div>
						</li>
							
						<li class="control-group">
							<div class="span12 mb25">
								<h4 for="question">Combien de temps te faut-il pour afonner une chope de 33cl ? *</h4>
								<label class="radio" id="question">
									Je suis un pro, à peine en main elle est vide !
									<input type="radio" name="q1" value="Je suis un pro, à peine en main elle est vide !"
									<?php if( $_POST['q1']=='Je suis un pro, à peine en main elle est vide !'){ echo 'checked="checked"';} ?> >
								</label>
								<label class="radio" id="question">
									Ça dépend de sa température !
									<input type="radio" name="q1" value="Ça dépends de sa température !"
									<?php if( $_POST['q1']=='Ça dépends de sa température !'){ echo 'checked="checked"';} ?> >
								</label>
								<label class="radio" id="question">
									Aucune idée, je dirais 25 minutes !
									<input type="radio" name="q1" value="Aucune idée, je dirais 25 minutes !"
									<?php if( $_POST['q1']=='Aucune idée, je dirais 25 minutes !'){ echo 'checked="checked"';} ?> >
								</label>
							</div>
						</li>
							
						<li>
							<div class="control-group">
								<button class="btn btn-primary btn-block" type="submit">Postuler !</button>
							</div>
						</li>
					</ol>
				</form>	
			</div>
		</div>

		<!-- SCRIPT -->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="js/jquery-2.1.1.min.js"><\/script>')</script>
		<script src="js/main.js"></script>
		<script src="js/bootstrap.js"></script>
		<!-- SCRIPT END -->
	</body> 
</html>