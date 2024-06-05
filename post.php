<?php require_once './files-php/parts/header.php' ?>
<?php require_once './files-php/init/init-post.php';
echo $menu->writeHtml(); ?>
<div id="colorlib-main">
    <section class="ftco-no-pt ftco-no-pb">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 px-md-3 py-5">
                    <?php if (!$user->isGuest ) : ?>
                    <div>
                        <?php if (!$user->isAdmin && $user->id === $post->user_id) : ?>
                        <a href="<?= $response->getLink('/practice/post-action.php') ?>" class="text-warning"
                            style="font-size: 1.8em;" title="Редактировать">🖍</a>
                            <?php endif ?>
                            <?php if (!$user->isAdmin && $user->id === $post->user_id) :  ?>
                            <a href="<?= $response->getLink('/practice/delete.php') ?>" class="text-danger"
                                style="font-size: 1.8em;" title="Удалить">🗑</a>
                                <?php endif?>
                                <?php endif?>


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
                        <div class="comments pt-5 mt-5">
                            <h3 class="mb-5 font-weight-bold"> <?= $post->numberOfComment ?> комментариев</h3>
                            <ul class="comment-list">
                                <li class="comment">
                                    <!-- avatar
												<div class="vcard bio">
												<img src="images/person_1.jpg" alt="Image placeholder">
											</div> -->
                                    <!-- <div class="comment-body">
                                    <div class="d-flex justify-content-between">
                                        <h3>John Doe</h3>
                                        <a href="" class="text-danger" style="font-size: 1.8em;" title="Удалить">🗑</a>
                                    </div>
                                    <div class="meta">October 03, 2018 at 2:21pm</div>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                        Pariatur
                                        quidem laborum necessitatibus, ipsam impedit vitae autem, eum
                                        officia, fugiat saepe enim sapiente iste iure! Quam voluptas
                                        earum
                                        impedit necessitatibus, nihil?
                                    </p> -->
                                    <!-- <p><a href="#" class="reply">Ответить</a></p> -->
                                    <!-- </div>
                            </li> -->

                                    <?php $html = '';
                            //    Comment::list($post->id, $user->mysql, $user->request);
                                function probeg2(array $arr, $response, $user, $html = '', $lvl=0): string
                                {
                                    foreach ($arr as $value) {
                                        $value['com']->formDate();
                                        $html .= "<li class='comment' "
                                                    . ($lvl ? "style='margin-left:" . $lvl * 100 . "px'" : '')
                                                . ">";
                                                if ( $value['com']->user->link){
                                                    $html .= "
                                                            <div class='vcard bio'>
                                                            <img src='files-php/uploads/{$value['com']->user->link}' alt='Image placeholder'>
                                                        </div>"; }

                                        $html .= "<div class='comment-body'>
                                            <div class='d-flex justify-content-between'><h3>";  
                                                $html .= $value['com']->user->login."</h3>  ";
                                                

                                        if ($user->isAdmin) {
                                            $html .= "<a href='" . $response->getLink('deleteComment.php', ['comment_id' => $value['com']->id]) . "' class='text-danger' style='font-size: 1.8em;'' title='Удалить'>🗑</a>";
                                        }
                                        $html .= " </div> <div class='meta'>
                                                {$value['com']->date}
                                            </div>
                                            <p>
                                                {$value['com']->message}
                                            </p>";
                                        if (!$user->isAdmin && !$user->isGuest && $user->request->get('comment_id') !== $value['com']->id && $user->id !== $value['com']->user->id) {
                                            $html .= "<p><a href='" . $response->getLink('post.php', ['comment_id' => $value['com']->id]) . "' class='reply'>Ответить</a></p>";
                                        } else if (!$user->isAdmin && !$user->isGuest && $user->id !== $value['com']->user->id) {
                                            $html .= "<div class='comment-form-wrap pt-5'>
                                                <h3 class='mb-5'>Оставьте комментарий</h3>
                                                <form action='" . $response->getLink('post.php', ['comment_id' => $value['com']->id]) . "' class='p-3 p-md-5 bg-light' method='POST'>
                                                    <div class='form-group'>
                                                        <label for='message'>Сообщение</label>
                                                        <textarea name='message' id='message' cols='30' rows='10' class='form-control'></textarea>
                                                    </div>
                                                    <div class='form-group'>
                                                        <input type='submit' value='Отправить' name='send_comment' class='btn py-3 px-4 btn-primary'>
                                                    </div>
                                                </form>
                                            </div>";
                                        }
                                        $html .= "</div>
                                    </li>
                                    ";
                                        if (!empty($value['answer'])) {
                                            $html = probeg2($value['answer'], $response, $user, $html,$lvl+1);
                                        }
                                    }

                                    return $html;
                                }

                        
                                if ($post->numberOfComment) {
                                   $html = probeg2(Comment::list($post->id, $user->mysql, $user->request), $response, $user, $html);
                                }
                                       
                                       
                                       
                                       
                                       
                                //        $html .= "<li class='comment'>
								// 	<!-- avatar
								// 						<div class='vcard bio'>
								// 						<img src='images/person_1.jpg' alt='Image placeholder'>
								// 					</div> -->
								// 	<div class='comment-body'>
								// 		<div class='d-flex justify-content-between'>
								// 			<h3>{$value['com']->user->login}</h3>";
                                //         if ($user->isAdmin) {
                                //             $html .= "<a href='" . $response->getLink('deleteComment.php', ['comment_id' => $value['com']->id]) . "' class='text-danger' style='font-size: 1.8em;'' title='Удалить'>🗑</a>";
                                //         }
                                    
                                //         $html .= " </div> <div class='meta'>
								// 			{$value['com']->date}
								// 		</div>
								// 		<p>
								// 			{$value['com']->message}
								// 		</p>";
                                //         if (!$user->isAdmin && !$user->isGuest && $user->request->get('comment_id') !== $value['com']->id) {
                                //             $html .= "<p><a href='". $response->getLink('post.php', ['comment_id' => $value['com']->id])."' class='reply'>Ответить</a></p>";
                                //         } else if (!$user->isAdmin && !$user->isGuest){
                                //             $html .= "<div class='comment-form-wrap pt-5'>
                                //             <h3 class='mb-5'>Оставьте комментарий</h3>
                                //             <form action='".$response->getLink('post.php', ['comment_id' => $value['com']->id])."' class='p-3 p-md-5 bg-light' method='POST'>
                                //                 <div class='form-group'>
                                //                     <label for='message'>Сообщение</label>
                                //                     <textarea name='message' id='message' cols='30' rows='10' class='form-control'></textarea>
                                //                 </div>
                                //                 <div class='form-group'>
                                //                     <input type='submit' value='Отправить' name='send_comment' class='btn py-3 px-4 btn-primary'>
                                //                 </div>
                                //             </form>
                                //         </div>";
                                //         }
                                //         $html .= "</div>
								// </li>
								// ";
                                //     }
                                // }
                                ?>
                                    <?= $html ?>


                                    <!-- <li class="comment">
                                < avatar <div class="vcard bio">
                                    <img src="images/person_1.jpg" alt="Image placeholder">
                    </div> -->
                                    <!-- <div class="comment-body">
                        <div class="d-flex justify-content-between">
                            <h3>John Doe</h3>
                            <a href="" class="text-danger" style="font-size: 1.8em;" title="Удалить">🗑</a>
                        </div>
                        <div class="meta">
                            October 03, 2018 at 2:21pm
                        </div>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            Pariatur
                            quidem laborum necessitatibus, ipsam impedit vitae autem, eum
                            officia, fugiat saepe enim sapiente iste iure! Quam voluptas
                            earum
                            impedit necessitatibus, nihil?
                        </p>
                        <p><a href="#" class="reply">Ответить</a></p>
                    </div>

                    </li> -->
                            </ul>
                            <!-- END comment-list -->
                            <?php if (!$user->isAdmin && !$user->isGuest && $user->id!==$post->user_id) :?>
                            <div class="comment-form-wrap pt-5">
                                <h3 class="mb-5">Оставьте комментарий</h3>
                                <form action="#" class="p-3 p-md-5 bg-light" method="POST">
                                    <div class="form-group">
                                        <label for="message">Сообщение</label>
                                        <textarea name="message" id="message" cols="30" rows="10"
                                            class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Отправить" name="send_comment"
                                            class="btn py-3 px-4 btn-primary">
                                    </div>
                                </form>
                            </div>
                            <?php endif ?>
                        </div>
                    </div>
                </div><!-- END-->
            </div>
    </section>
</div><!-- END COLORLIB-MAIN -->
</div><!-- END COLORLIB-PAGE -->

<!-- loader -->
<?php require_once './files-php/parts/preloader.php' ?>
<?php require_once './files-php/parts/scripts.php'  ?>
<?php require_once './files-php/parts/end.php' ?>