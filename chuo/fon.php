
<?php 
require_once('dateCheck2.php');
?>

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
<![CDATA[
a:link{color:blue;}
a:focus{color:red}
a:visited{color:purple;}
]]>
body { margin:0; color:black; }
div.content { background-color:#87fb98; margin-left:auto; margin-right:auto; padding:2px; width:270px}
div.menu { text-align:left; margin-left:50px; }
</style>
</head>
<body>
<div align="center" class="content">
<!--WRAPPER END-->
<div style="font-size:large;">

<!--���S-->
<div style="text-align:center;" align="center">
<img src="./friends.gif" width="250" height="45" alt="" style="margin:7px 0 7px 0;" />
</div>
<!--���SEND-->

<!--��؂�-->
<hr size="1" color="blue" style="border-color:blue;">
<!--��؂�END-->

<!--�}�[�L�[-->
<?php
require_once('markey.php');
?>
<!--  <div style="display:-wap-marquee;background-color:navy;color:white;"> -->
<!--
<div>
<font color="white"><marquee bgcolor="#0080ff" behavior=scroll>
�y�����`�P�b�g�������ς�����`</marquee></font>
</div>
-->
<!--�}�[�L�[END-->

<!--���j���[-->
<div>
<?php
$file = fopen('../config_c.txt','r');
$data = fgetcsv($file,1024,",");
$mon = $data[0];
$cnt = $data[1];
fclose($file);
?>
<font color="#ff00ff" style="text-align:center">
<?php 
print "<h2>��" . $mon . "���̃`�P�b�g" . "</h2>";
?>
</font>
<?php
print "<h3 align=\"right\">vol." . $cnt . "�@�@</h3>";
?>
������]�̃`�P�b�g�̔ԍ���<br />�I�����ĉ������B<br />
<br /> 
<div class="menu">

<?php
//���m�点��
$fp1 = fopen('notice.txt', 'r' );
for( $count = 0; fgets( $fp1 ); $count++ );
fclose($fp1);

if ($count > 0) {
	print '<font color="red">�y���m�点�z</font><br>';

	$fp1 = fopen('notice.txt','r');
	while ($txt = fgets($fp1)) {
	    print "<div align=\"left\">" . "<font size=\"3\">" . "�@" . $txt . "</font></div><br />";
	}
	fclose($fp1);
}

//�����Ղ���
$fp = fopen('asapre.txt', 'r' );
for( $count = 0; fgets( $fp ); $count++ );
fclose($fp);

if ($count > 0) {
	print '<font color="red">�����Ղ�������</font><br>';

	$i = 0;
	$file = fopen('asapre.txt','r');
	while ($data = fgetcsv($file,1024,",")) {
	    $i++;
	    print $i . ". ". $data[0] . "<br />";
	    print "<div align=\"right\">" . $data[1]. $data[2] . "�@</div><br />";
	}
	fclose($file);
}

?>
<!--��؂�-->
<hr size="1" color="blue" style="border-color:red;" align="left" width="85%">
<!--��؂�END-->
<?php
$file = fopen('ticket.txt','r');
while ($data = fgetcsv($file,1024,",")) {
    $i++;
    print $i . ". ". $data[0] . "<br />";
    print "<div align=\"right\">" . $data[1]. $data[2] . "�@</div><br />";
}
fclose($file);
?>
</div>
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
<form method="post" action="https://www.asa-kashiwa.net/mobile/chuo/f-mail.php">
��1��]�F
<input type="text" name="number1" size="3" style="width:20px;" value="" istyle="4" accesskey="1" />
<br>
��2��]�F
<input type="text" name="number2" size="3" style="width:20px;" value="" istyle="4" accesskey="2" />
<br>
��3��]�F
<input type="text" name="number3" size="3" style="width:20px;" value="" istyle="4" accesskey="3" />
<br>
<input type="hidden" name="ticket" value="<?php print $i ?>">
<input type="submit" value="GO!!" />
</form>
</div>
<!--���͗�END-->

<!--��؂�-->
<hr size="1" color="#999999" style="border-color:#999;">
<!--��؂�END-->

<!--�U�������N-->
<div>
��<a href="mailto:@?subject=ASA�t�����Y&body=http://www.asa-kashiwa.net/mobile/chuo">���F�B�ɋ�����</a><br />
��<a href="mailto:&#103;-&#109;a&#114;k&#101;&#116;&#64;as&#97;&#45;&#107;&#97;shiw&#97;&#46;n&#101;&#116;?su&#98;j&#101;ct=A&#83;A&#12501;��&#12531;&#12474;&#58;&#12362;&#21839;����">���₢���킹</a><br />
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
��<a href="asapre1.html">�����Ղ����Ƃ́H</a><br />
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
</div>
</body>
</html>