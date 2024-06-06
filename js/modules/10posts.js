function posts() {
  arr = [];
  $.ajax({
    url: "../../files-php/php-parts/10post.php",
    method: "GET",
    datatype: "json",
    success: function (data) {
      arr = JSON.parse(data);
      html = "";
      arr.forEach((key, value) => {
        $html += `<div class='col-md-12 col-xl-12'>
         <div class='blog-entry ftco-animate d-md-flex'>`;
        $html += `<div class='text text-2 pl-md-4'>
         <h3 class='mb-2'><a href='".$response->getLink('post-action.php', ['post-id'=>$value->id])."'>$value->title</a></h3>
                 <div class='meta-wrap'>
                     <p class='meta'>`;
        if (value.user.link) {
          html += `<div class='vcard bio'> <img src = 'files-php/uploads/{$value->user->link}' width='100px' height = '100px' alt='Image placeholder'> </div>`;
        }
        $html += `<span class='text text-3'>{$value->user->login}</span>
                                      <span><i class='icon-calendar mr-2'></i>$value->date</span>
                    <span><i class='icon-comment2 mr-2'></i> $value->numberOfComment Comment</span>
                 </p>
                                </div>
                                 <p class='mb-4'>$value->preview</p>
                                 <div class='d-flex pt-1  justify-content-between'>
                                     <div>
                                       <a href='".$response->getlink('post.php', ['post-id'=>$value->id])."' class='btn-custom'>
                                             Подробнее... <span class='ion-ios-arrow-forward'></span></a>
                                    </div>`;
                                               
      });
    },
  });
}

posts();

// <?php
// // var_dump($user);die;
// $html = '';
// foreach ($post->list(10) as $key=>$value) {

//     // var_dump($value->user);
//     $html .= "<div class='col-md-12 col-xl-12'>
//     <div class='blog-entry ftco-animate d-md-flex'>";

//         $html .= "<div class='text text-2 pl-md-4'>
//             <h3 class='mb-2'><a href='".$response->getLink('post-action.php', ['post-id'=>$value->id])."'>$value->title</a></h3>
//             <div class='meta-wrap'>
//                 <p class='meta'>";
//                 if ($value->user->link){
//                     // var_dump("'practice/files-php/uploads/{$value->user->link}'");die;
//                     $html.=	"   <div class='vcard bio'> <img src = 'files-php/uploads/{$value->user->link}' width='100px' height = '100px' alt='Image placeholder'> </div>";
//                 }
//                 // var_dump($value->user->link);die;
//                     $html.="<span class='text text-3'>{$value->user->login}</span>
//                     <span><i class='icon-calendar mr-2'></i>$value->date</span>
//                     <span><i class='icon-comment2 mr-2'></i> $value->numberOfComment Comment</span>
//                 </p>
//             </div>
//             <p class='mb-4'>$value->preview</p>
//             <div class='d-flex pt-1  justify-content-between'>
//                 <div>
//                     <a href='".$response->getlink('post.php', ['post-id'=>$value->id])."' class='btn-custom'>
//                         Подробнее... <span class='ion-ios-arrow-forward'></span></a>
//                 </div>";
//                 if (!$user->isGuest && !$user->isAdmin && $value->user->id === $user->id){
//                     // var_dump($value->user->id);die;
//                     $html.= "<div>
//                     <a href='".$response->getLink('post-action.php', ['post-id'=>$value->id])."' style='font-size: 1.8em;' title='Редактировать'>🖍</a>
//                     <a href='".$response->getLink('delete.php', ['post-id'=>$value->id])."' style='font-size: 1.8em;' title='Удалить'>🗑</a>
//                     </div>";}
//                     if (!$user->isGuest && $user->isAdmin){
//                         // var_dump($value->user->id);die;
//                         $html.= "<div>
//                         <a href='".$response->getLink('delete.php', ['post-id'=>$value->id])."'class ='text-danger' style='font-size: 1.8em;' title='Удалить'>🗑</a>
//                         </div>";}
//                     $html.="</div>
//                 </div>
//             </div>
//         </div>";
//                 } ;?>
// <?= $html ?>
