<?php 
    $loguser = $this->request->session()->read('Auth.User');
?>

    <form>
      <table style="width:100%;">
        <tr>
          <th><?=$type=='mean'?"Nghĩa":"Định nghĩa"?></th>
          <th>:</th>
          <th><?=$type=='mean'?$mean->mean:$define->define?></th>
        </tr>
        <tr>
          <th>Người báo cáo</th>
          <th>:</th>
          <td><?=$loguser?'<span id="userwarning">'.$loguser['namedisplay'].'</span>':
            "<input type='text' name='userwarning' id='userwarning' value=''>"?>
          </td>
        </tr>
        <tr>
          <th>Nội dung báo cáo</th>
          <th>:</th>
          <td><textarea name="contentwarning" id="contentwarning"></textarea></td>
        </tr>
      <table>
    <form>  
