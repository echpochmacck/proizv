<?php
class Menu
{
    public array  $arrMenu = [];
    public object $response ;
    public object $user; 
    public function __construct($arrMenu, $response, $user)
    {
        $this->arrMenu =  $arrMenu;
        $this->response = $response;
        $this->user = $user;
    }

    public function writeHtml(object $user): string
    {
        if ($user->isGuest) {
            $role = 'guest';
        } else if($user->isAdmin) {
            $role = 'admin';
        } else {
            $role = 'avtor';
        }
        $block =  "<div id='colorlib-page'>
        <aside id='colorlib-aside' role='complementary' class='js-fullheight'>
            <nav id='colorlib-main-menu' role='navigation'>
                <ul>";
    $str = '';
    foreach ($this->arrMenu as $value) {
        if (array_filter($value['role'], fn($elem) => $elem === $role)) {
            if ($_SERVER['SCRIPT_NAME'] === '/practice/'. $value['link']) {
                $str .= "<li class='colorlib-active'><a href='". $this->response->getLink($value['link']). "'>" . $value['title']. "</a></li>";
            } else {
                $str .= "<li><a href='". $this->response->getLink($value['link']). "'>". $value['title']."</a></li>";
            }   
        }
        //     if ( ($value['title'] === 'Пользователи' && ($this->user->isGuest || !$this->user->isAdmin))) {
        //         $str.=''; 
        //     } else if (($value['title'] === 'Вход' || $value['title'] === 'Регистрация') && $this->user->id) {
        //         $str.='';
        //     } else if ($_SERVER['SCRIPT_NAME'] === '/practice/'. $value['link']) {
        //     $str .= "<li class='colorlib-active'><a href='". $this->response->getLink($value['link']). "'>" . $value['title']. "</a></li>";
        // }else if (($value['title'] === 'Выход') && !$this->user->id) {
        //     $str.='';
        // }else {
        //     $str .= "<li><a href='". $this->response->getLink($value['link']). "'>". $value['title']."</a></li>";
        // }
    }
    
    $end =  "</ul>
            </nav>
        </aside>
    </div>";
    
    return $block . $str . $end;


        
    }
}
