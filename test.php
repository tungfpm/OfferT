<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div>
<div>
<input type="button" value="Xem" style="width:75px;font-size:10px;margin:0px;padding:0px;" onclick="if (this.parentNode.parentNode.getElementsByTagName('div')[1].getElementsByTagName('div')[0].style.display != '') { this.parentNode.parentNode.getElementsByTagName('div')[1].getElementsByTagName('div')[0].style.display = '';this.innerText = ''; this.value = 'Ẩn'; } else { this.parentNode.parentNode.getElementsByTagName('div')[1].getElementsByTagName('div')[0].style.display = 'none'; this.innerText = ''; this.value = 'Xem'; }">
</div>
<div>
<div style="display: none;">
{Phần nội dung bị ẩn}
</div>
</div>
</div>
</body>
</html>