<?php
$date = getdate();
$day  = $date["mday"];
 
if ($day < 3 || $day > 9) {
	page_e2();
    exit();
}

function page_e2() {
    print <<< EOF
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ja" xml:lang="ja">
<head>
<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=SJIS-win" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="cache-control" content="no-cache" />
<meta http-equiv="expires" content="0" />
<meta name="description" content=" " />
<meta name="keywords" content=" " />
<meta name="robots" content="index,follow" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
<title>ASA�t�����Y</title>
<style type="text/css">
body { margin:0; color:black; }
div.content { background-color:#87fb98; margin-left:auto; margin-right:auto; padding:2px;}
div.menu { text-align:left; margin-left:50px; }
</style>
</head>
<body>
<div align="center" class="content">
<div style="font-size:large;">
<div style="text-align:center;" align="center">
<img src="./friends.gif" width="250" height="45" alt="" style="margin:7px 0 7px 0;" />
</div>
<hr size="1" color="blue" style="border-color:blue;">
<div class="menu">
<h3>���T�C�g�̂����p�A�L�������܂�</h3>
<p><font color="magenta">�@�@�`�P�b�g�̉�����Ԃ́A<br />�@�@�@<u>����3���`9��</u>�ł�</font></p>
<img src="gomen.gif">
</div>
<br><br>
<hr size="1" color="blue" style="border-color:blue;">
<div style="text-align:center;" align="center">
<span style="color:#666;">�L������t�̔���<br> ASA���O���[�v</span>
</div>
</div>
</body>
</html>
EOF;
}
?>