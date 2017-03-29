<?=($login?'
<li class="dropdown"> 
    <a href="#" >Xin chào,'.$login['namedisplay'].'</a>
</li>'.
($login["isadmin"]?'
<li class="dropdown">'
    .$this->Html->link("Trang Quản Trị",["controller"=>"admin"]).'
</li>':'').
'<li class="dropdown">
    <a href="users/logout" > Đăng xuất </a>
</li>
':'false')?>