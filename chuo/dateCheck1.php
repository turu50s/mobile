<?php
$date = getdate();
$day  = $date["mday"];

/*
if ($month % 2 != 0) {
	if ($day < 3 || $day > 9) {
		page_e1();
		exit();
	}
} else {
	page_e1();
	exit();
}
*/
	page_e1();
	exit();

function page_e1() {
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
<title>ASA�t�����Y</title>
</head>
<body width="100%" bgcolor="#87fb98">
<div style="font-size:xx-small;">
<div style="text-align:center;" align="center">
<img src="./friends.gif" width="150" height="31" alt="" style="margin:7px 0 7px 0;" />
</div>
<br><br>
<hr size="1" color="blue" style="border-color:blue;">
<!-- <h3>���T�C�g�̂����p�A<br />�L�������܂�</h3> -->
<h3>���܂ŁA���T�C�g�̂����p�A<br />�L�������܂����B</h3>
<p><font color="magenta">���T�C�g�ł̃`�P�b�g�v���[���g�́A�I���v���܂���</font></p>
<img src="gomen.gif">
<hr size="1" color="blue" style="border-color:blue;">
<div style="text-align:center;" align="center">
<span style="color:#666;">�L������t�̔���<br> ASA���O���[�v</span>
</div>
</body>
</html>
EOF;
}
?>