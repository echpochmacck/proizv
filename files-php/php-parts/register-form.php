<div class="container">
			<div class="row d-flex contact-info">
				<div class="col-md-12 mb-1">
					<h2 class="h3">Регистрация</h2>
				</div>

			</div>
			<div class="row block-9">
				<div class="col-lg-6 d-flex">

					<form class="bg-light p-5 contact-form" enctype="multipart/form-data" method="post">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Your Name" name="name" value="<?= $user->name?>">

						</div>
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Your Surname" name="surname" value="<?= $user->surname?>">
						</div>
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Your Patronymic" name="patronymic" value="<?= $user->patronymic?>">
						</div>
						<div class="form-group">
							<input type="text" class="form-control is-invalid"
							 placeholder="Your Login" name="login"  value="<?= $user->login?>">
							<div class="invalid-feedback">
								login error <?= $user->loginMessage?>
							</div>
						</div>
						<div class="form-group">
							<input type="email" class="form-control is-invalid" placeholder="Your Email" name="email" value="<?= $user->email?>">
							<div class="invalid-feedback">
								email error <?= $user->emailMessage?>
							</div>
						</div>
						<div class="form-group">
							<input type="password" class="form-control is-invalid" placeholder="Password" name="password">
							<div class="invalid-feedback">
								password error <?= $user->passwordMessage?>
							</div>
						</div>
						<div class="form-group">
							<input type="password" class="form-control is-invalid" placeholder="Password repeat" name="password_repeat">
							<div class="invalid-feedback">
								password_repeat error
							</div>
						</div>
						<div class="form-group">
						<div class="form-group">
							avatar: </br>
							<input type="file" name='avatar'>
						</div>
						<div class="form-group">
							<div class="form-check">
								<input class="form-check-input is-invalid" type="checkbox" value="" id="rules" aria-describedby="invalidCheck3Feedback" required>
								<label class="form-check-label" for="rules">
									Rules
								</label>
								<div id="rulesFeedback" class="invalid-feedback">
									Необходимо согласиться с правилами регистрации.
								</div>
							</div>
						</div>
						<div class="form-group">
							<input type="submit" value="Регистрация" class="btn btn-primary py-3 px-5">
						</div>
					</form>

				</div>


			</div>
		</div>