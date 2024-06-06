<div class="comments pt-5 mt-5">
    <h3 class="mb-5 font-weight-bold"> <?= $post->numberOfComment ?> комментариев</h3>
    <ul class="comment-list">
        <li class="comment">

            <?php $html = '';
            //    Comment::list($post->id, $user->mysql, $user->request);
            function probeg2(array $arr, $response, $user, $html = '', $lvl = 0): string
            {
                foreach ($arr as $value) {
                    $value['com']->formDate();
                    $html .= "<li class='comment' "
                        . ($lvl ? "style='margin-left:" . $lvl * 100 . "px'" : '')
                        . ">";
                    if ($value['com']->user->link) {
                        $html .= "
                                                            <div class='vcard bio'>
                                                            <img src='files-php/uploads/{$value['com']->user->link}' alt='Image placeholder'>
                                                        </div>";
                    }

                    $html .= "<div class='comment-body'>
                                            <div class='d-flex justify-content-between'><h3>";
                    $html .= $value['com']->user->login . "</h3>  ";


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
                        $html = probeg2($value['answer'], $response, $user, $html, $lvl + 1);
                    }
                }

                return $html;
            }


            if ($post->numberOfComment) {
                $html = probeg2(Comment::list($post->id, $user->mysql, $user->request), $response, $user, $html);
            }

            ?>
            <?= $html ?>
    </ul>
    <!-- END comment-list -->
    <?php if (!$user->isAdmin && !$user->isGuest && $user->id !== $post->user_id) : ?>
        <div class="comment-form-wrap pt-5">
            <h3 class="mb-5">Оставьте комментарий</h3>
            <form action="#" class="p-3 p-md-5 bg-light" method="POST">
                <div class="form-group">
                    <label for="message">Сообщение</label>
                    <textarea name="message" id="message" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" value="Отправить" name="send_comment" class="btn py-3 px-4 btn-primary">
                </div>
            </form>
        </div>
    <?php endif ?>
</div>