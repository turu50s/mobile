<?php 
require_once('dateCheck1.php');
?>

<!DOCTYPE html PUBLIC "-//OPENWAVE//DTD XHTML 1.0//EN" "http://www.openwave.com/DTD/xhtml-basic.dtd">
<!-- <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> -->
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
<title>ASA�̃~�j���</title>
<style type="text/css">
<![CDATA[
a:link{color:blue;}
a:focus{color:red}
a:visited{color:purple;}
]]>
</style>
</head>
<body width="100%" bgcolor="#87fb98">

<!--WRAPPER END-->
<div style="font-size:xx-small;">

<!--���S-->
<div style="text-align:center;" align="center">
<img src="./mini.gif" width="145" height="28" alt="" style="margin:7px 0 7px 0;" />
</div>
<!--���SEND-->

<!--��؂�-->
<hr size="1" color="blue" style="border-color:blue;">
<!--��؂�END-->

<!--�}�[�L�[-->
<!--  <div style="display:-wap-marquee;background-color:navy;color:white;"> -->
<div>
<font color="white"><marquee bgcolor="#0080ff" behavior=scroll>
�y�����`�P�b�g�������ς�����`</marquee></font>
</div>
<!--�}�[�L�[END-->

<!--���j���[-->
<div>
<?php
$file = fopen('../config.txt','r');
$data = fgetcsv($file,1024,",");
$mon = $data[0];
$cnt = $data[1];
fclose($file);
?>
<font color="#ff00ff" style="text-align:center">
<?php 
print "<h2 style=\"font-size:x-small;\">��" . $mon . "���̃`�P�b�g��" . "</h2>";
?>
</font>
<?php
print "<h3 align=\"right\" style=\"font-size:x-small;\">vol." . $cnt . "�@�@</h3>";
?>
������]�̃`�P�b�g��<br />�@�ԍ���I�����ĉ�����<br />
<br /> 

<font color="red">�����Ղ�������</font><br>

<?php
$i = 0;
$file = fopen('asapre.txt','r');
while ($data = fgetcsv($file,1024,",")) {
    $i++;
    print $i . ". ". $data[0] . "<br />";
    print "<div align=\"right\">" . $data[1]. $data[2] . "�@</div><br />";
}
fclose($file);
?>
<hr size="1" color="blue" style="border-color:red;" align="left" width="85%">
<?php
$file = fopen('ticket.txt','r');
while ($data = fgetcsv($file,1024,",")) {
    $i++;
    print $i . ". ". $data[0] . "<br />";
	print "<div align=\"right\">" . $data[1]. $data[2] . "�@</div><br />";
}
fclose($file);
?>
<br />
</div>
<!--���j���[END-->
<?php 
$path = '.' .PATH_SEPARATOR. '../../PEAR';
ini_set('include_path',get_include_path() .PATH_SEPARATOR. $path);
ini_set( 'display_errors', 0 );

ini_set('session.use_cookies','0');
ini_set('session.use_trans_sid','1');

require_once 'HTTP/Session2.php';

HTTP_Session2::useCookies(false);
HTTP_Session2::start();
//session_start(); 
//echo $_SESSION['err']; 
?>
<p style="color:red"><?php echo HTTP_Session2::get('messasge'); ?></p>

<!--���͗�-->
<div style="text-align:center;" align="center">
<!-- <form method="post" action="https://cp.in-plus.jp/ssl/102//asa-kashiwa.net/mobile/seibu/a-mail.php">  -->
<form method="post" action="https://www.asa-kashiwa.net/mobile/seibu/a-mail.php">
��1��]�F
<input type="text" name="number1" size="3" style="font-size:xx-small" value="" istyle="4" accesskey="1" />
<br>
��2��]�F
<input type="text" name="number2" size="3" style="font-size:xx-small" value="" istyle="4" accesskey="2" />
<br>
��3��]�F
<input type="text" name="number3" size="3" style="font-size:xx-small" value="" istyle="4" accesskey="3" />
<br>
<input type="hidden" name="ticket" value="<?php print $i ?>">
<input type="submit" style="font-size:xx-small" value="GO��" />
</form>
</div>
<!--���͗�END-->

<!--��؂�-->
<hr size="1" color="#999999" style="border-color:#999;">
<!--��؂�END-->

<!--�U�������N-->
<div>
��<a href="mailto:@?subject=ASA�̃~�j���&body=http://www.asa-kashiwa.net/mobile/seibu">���F�B�ɋ�����</a><br />
�w<a href="mailto:g-&#109;arke&#x74;&#x40;a&#115;&#97;-&#107;&#97;&#115;h&#105;&#119;a.net?&#115;&#117;b&#106;&#x65;&#99;t&#x3D;AS&#65;�̃~&#x30CB;���&#32025;&#x3A;&#12362;�⍇��">���₢���킹</a><br />
</div>
<!--�U�������NEND-->

<!--��؂�-->
<hr size="1" color="#999999" style="border-color:#999;">
<!--��؂�END-->

<!--�t�b�^�[-->
<div>
<!-- ��<a href="plicy.html">��ײ�޼���ؼ�</a><br />
��<a href="test.html">�Ή��@��ͺ��</a><br />--->
<br>
��<a href="asapre.html">�����Ղ����Ƃ́H</a><br />
</div>
<!--�t�b�^�[END-->

<!--��؂�-->
<hr size="1" color="blue" style="border-color:blue;">
<!--��؂�END-->

<!--���쌠-->
<div style="text-align:center;" align="center">
<span style="color:#666;">�L������t�̔���<br> ASA���O���[�v</span>
</div>
<!--���쌠END-->

</div>
<!--WRAPPER END-->

</body>
</html>