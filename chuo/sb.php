<?php 
require_once('dateCheck1.php');
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
<title>ASA�t�����Y</title>
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
<div style="font-size:large">

<!--���S-->
<div style="text-align:center;" align="center">
<img src="./friends.gif" width="170" height="31" alt="" style="margin:7px 0 7px 0;" />
</div>
<!--���SEND-->

<!--��؂�-->
<hr size="1" color="blue" style="border-color:blue;">
<!--��؂�END-->

<!--�}�[�L�[-->
<?php
require_once('markey.php');
?>
<!-- <div style="display:-wap-marquee;background-color:navy;color:white;"> -->
<!-- <div style="display: -wap-marquee;-wap-marquee-loop: infinite;background-color: Blue;color: White;">
�y�����`�P�b�g�������ς�����`</div> -->
<!--
<div>
<font color="white">
<marquee bgcolor="#0080ff" behavior=scroll>
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
<h2>&#xE112
<?php 
print $mon . "���̃`�P�b�g&#xE112" . "</h2>";
?>
</font>
<?php
print "<h3 align=\"right\">vol." . $cnt . "�@�@</h3>";
?>
������]�̃`�P�b�g��<br />�@�ԍ���I�����ĉ�����<br />
<br /> 

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
<hr size="1" color="blue" style="border-color:red;" align="center" width="85%">
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
<form method="post" action="https://www.asa-kashiwa.net/mobile/chuo/s-mail.php">
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
&#xE104<a href="mailto:@?subject=ASA�t�����Y&body=http://www.asa-kashiwa.net/mobile/chuo">���F�B�ɋ�����</a><br />
&#xE103<a href="mailto:&#103;-&#109;a&#114;k&#101;&#116;&#64;as&#97;&#45;&#107;&#97;shiw&#97;&#46;n&#101;&#116;?su&#98;j&#101;ct=A&#83;A&#12501;��&#12531;&#12474;&#58;&#12362;&#21839;����">���₢���킹</a><br />
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