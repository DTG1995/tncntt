<?php
$loguser = $this->request->session()->read('Auth.User');
?>
<div class="admin index large-9 medium-8 columns content">
<h1>Thông tin tài khoản</h1>
<table class="table table-striped">
	<tr>
		<td>Username</td>
		<td>Tên hiển thị</td>
		<td>Ngày tạo</td>
	</tr>
	<tr>
		<td><?= $loguser['username']?></td>
		<td><?= $loguser['namedisplay']?></td>
		<td><?= $loguser['created']?></td>
	</tr>
</table>
</div>