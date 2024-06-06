        <div class="post">
                            <h1 class="mb-3"><?= $post->title ?></h1>
                            <div class="meta-wrap">
                                <p class="meta">
                                    <!-- <img src='avatar.jpg' /> -->
                                    <span class="text text-3">
                                        <!-- << /span> -->
                                        <span><i class="icon-calendar mr-2"></i><?= $post->date ?></span>
                                        <span><i class="icon-comment2 mr-2"></i> <?= $post->numberOfComment ?>
                                            Comment</span>
                                </p>
                            </div>
                            <p>
                                <?= $post->content ?>
                            </p>
                            <?php if ($post->file) : ?>

                            <div><img src="/practice/files-php/uploads/<?= $post->file ?>" alt="#" width='200px'
                                    height="300px"></div>
                            <?php endif ?>
                            <!-- <div>
							<a href="" class="text-warning" style="font-size: 1.8em;" title="Редактировать">🖍</a>
							
							<a href="" class="text-danger" style="font-size: 1.8em;" title="Удалить">🗑</a>
						</div> -->

                        </div>