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

    public function writeHtml(): string
    {
        // return  '<div id="colorlib-page">
        // <aside id="colorlib-aside" role="complementary" class="js-fullheight">
        //     <nav id="colorlib-main-menu" role="navigation">
        //         <ul>
        //             <li class="colorlib-active"><a href="index.php">Главная</a></li>
        //             <li><a href="posts.php">Блоги</a></li>
        //             <li><a href="users.php">Пользователи</a></li>
        //             <li><a href="about.php">О нас</a></li>
        //             <li><a href="login.php">Вход</a> / <a href="register.php">Регистрация</a></li>
        //             <li><a href="#">Выход</a></li>
        //         </ul>
        //     </nav>
        // </aside> END COLORLIB-ASIDE';

        // return "<div id='colorlib-page'>
        // <aside id='colorlib-aside' role='complementar' class='js-fullheight'>
        //     <nav id='colorlib-main-menu' role='navigation'>
        //         <ul>
        //         <li class='colorlib-active'><a href='{$this->response->getLink('/practice/')}'>Главная</a></li>
        //         <li><a href='{$this->response->getLink('/practice/posts.php')}'>Блоги</a></li>
        //         <li><a href='{$this->response->getLink('/practice/users.php')}'>Пользователи</a></li>
        //         <li><a href='{$this->response->getLink('/practice/about.php')}'>О нас</a></li>
        //         <li><a href='{$this->response->getLink('/practice/login.php')}'>Вход</a> / <a href='{$this->response->getLink('/practice/register.php')}'>Регистрация</a></li>
        //         <li><a href='{$this->response->getLink('/practice/logout.php')}'>Выход</a></li>                
        //         </ul>
        //     </nav>
        // </aside> END COLORLIB-ASIDE";
        // var_dump($this->arrMenu);

        $block =  "<div id='colorlib-page'>
        <aside id='colorlib-aside' role='complementary' class='js-fullheight'>
            <nav id='colorlib-main-menu' role='navigation'>
                <ul>";
    $str = '';
    foreach ($this->arrMenu as $value) {
    
        

            if ( ($value['title'] === 'Пользователи' && ($this->user->isGuest || !$this->user->isAdmin))) {
                $str.=''; 
            } else if (($value['title'] === 'Вход' || $value['title'] === 'Регистрация') && $this->user->id) {
                $str.='';
            } else if ($_SERVER['SCRIPT_NAME'] === '/practice/'. $value['link']) {
            $str .= "<li class='colorlib-active'><a href='". $this->response->getLink($value['link']). "'>" . $value['title']. "</a></li>";
        }else if (($value['title'] === 'Выход') && !$this->user->id) {
            $str.='';
        }else {
            $str .= "<li><a href='". $this->response->getLink($value['link']). "'>". $value['title']."</a></li>";
        }
    }
    
    $end =  "</ul>
            </nav>
        </aside>
    </div>";
    
    return $block . $str . $end;


        
    }
}
