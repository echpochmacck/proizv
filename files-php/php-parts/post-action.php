<div class="container">
			<div class="row d-flex contact-info">
				<div class="col-md-12 mb-1">
					<h2 class="h3">Создание поста</h2>
				</div>

			</div>
			<div class="row block-9">
				<div class="col-lg-6 d-flex">

					<form action="#" class="bg-light p-5 contact-form" method="POST" enctype="multipart/form-data">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Post title" name="title" value="<?=$post->title?>">

						</div>
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Post preview" name="preview" value="<?=$post->preview?>">
						</div>
						<div class="form-group">
							<textarea name="content" id="" cols="30" rows="10" class="form-control" placeholder="Post content"><?=$post->content?></textarea>
						</div>

						<div class="form-group">
							<input type="submit" value="Создать" class="btn btn-primary py-3 px-5">
						</div>
						<br>

							<div class="form-group">
							image: </br>
							<input type="file" name='image'>
						</div>
					</form>

				</div>


			</div>
		</div>