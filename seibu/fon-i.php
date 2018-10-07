
<?php 
require_once('dateCheck2-i.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ja" xml:lang="ja">
<head>
<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=UTF-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="cache-control" content="no-cache" />
<meta http-equiv="expires" content="0" />
<meta name="description" content=" " />
<meta name="keywords" content=" " />
<meta name="robots" content="index,follow" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
<title>ASAのミニ情報紙</title>
<style type="text/css">
<![CDATA[
a:link{color:blue;}
a:focus{color:red}
a:visited{color:purple;}
]]>
body { margin:0; color:black; }
div.content { background-color:#87fb98; margin-left:auto; margin-right:auto; padding:2px; width:270px }
div.menu { text-align:left; margin-left:50px; }
</style>
</head>
<body>
<div align="center" class="content">
<!--WRAPPER END-->
<div style="font-size:large;">

<!--ロゴ-->
<div style="text-align:center;" align="center">
<img src="./mini.gif" width="250" height="45" alt="" style="margin:7px 0 7px 0;" />
</div>
<!--ロゴEND-->

<!--区切り-->
<hr size="1" color="blue" style="border-color:blue;">
<!--区切りEND-->

<!--マーキー-->
<!--  <div style="display:-wap-marquee;background-color:navy;color:white;"> -->
<div>
<font color="white"><marquee bgcolor="#0080ff" behavior=scroll>
楽しいチケットがいっぱいだよ～</marquee></font>
</div>
<!--マーキーEND-->

<!--メニュー-->
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
print "<h2>■" . $mon . "月のチケット" . "</h2>";
?>
</font>
<?php
print "<h3 align=\"right\">vol." . $cnt . "　　</h3>";
?>
■ご希望のチケットの番号を<br />選択して下さい。<br />
<br /> 
<div class="menu">

<font color="red">あさぷれ会員限定</font><br>

<?php
$i = 0;
$file = fopen('asapre-i.txt','r');
while ($data = fgetcsv($file,1024,",")) {
    $i++;
    print $i . ". ". $data[0] . "<br />";
    print "<div align=\"right\">" . $data[1]. $data[2] . "　</div><br />";
}
fclose($file);
?>
<!--区切り-->
<hr size="1" color="blue" style="border-color:red;" align="left" width="85%">
<!--区切りEND-->
<?php
$file = fopen('ticket-i.txt','r');
while ($data = fgetcsv($file,1024,",")) {
    $i++;
    print $i . ". ". $data[0] . "<br />";
    print "<div align=\"right\">" . $data[1]. $data[2] . "　</div><br />";
}
fclose($file);
?>
</div>
<br />
</div>
<!--メニューEND-->
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

<!--入力欄-->
<div style="text-align:center;" align="center">
<form method="post" action="https://www.asa-kashiwa.net/mobile/seibu/f-mail-i.php">
第1希望：
<input type="text" name="number1" size="3" style="width:20px;" value="" istyle="4" accesskey="1" />
<br>
第2希望：
<input type="text" name="number2" size="3" style="width:20px;" value="" istyle="4" accesskey="2" />
<br>
第3希望：
<input type="text" name="number3" size="3" style="width:20px;" value="" istyle="4" accesskey="3" />
<br>
<input type="hidden" name="ticket" value="<?php print $i ?>">
<input type="submit" value="GO!!" />
</form>
</div>
<!--入力欄END-->

<!--区切り-->
<hr size="1" color="#999999" style="border-color:#999;">
<!--区切りEND-->

<!--誘導リンク-->
<div>
☆<a href="mailto:@?subject=ASAのミニ情報紙&body=http://www.asa-kashiwa.net/mobile/seibu">▼友達に教える</a><br />
☆<a href="mailto:g-&#109;arke&#x74;&#x40;a&#115;&#97;-&#107;&#97;&#115;h&#105;&#119;a.net?&#115;&#117;b&#106;&#x65;&#99;t&#x3D;AS&#65;のミ&#x30CB;情報&#32025;&#x3A;&#12362;問合せ">お問い合わせ</a><br />
</div>
<!--誘導リンクEND-->

<!--区切り-->
<hr size="1" color="#999999" style="border-color:#999;">
<!--区切りEND-->

<!--フッター-->
<div>
<!-- □<a href="plicy.html">ﾌﾟﾗｲﾊﾞｼｰﾎﾟﾘｼｰ</a><br />
□<a href="test.html">対応機種はｺﾁﾗ</a><br />--->
<br>
□<a href="asapre1.html">あさぷれ会員とは？</a><br />
</div>
<!--フッターEND-->

<!--区切り-->
<hr size="1" color="blue" style="border-color:blue;">
<!--区切りEND-->

<!--著作権-->
<div style="text-align:center;" align="center">
<span style="color:#666;">伸光堂千葉販売㈱<br> ASA柏グループ</span>
</div>
<!--著作権END-->

</div>
<!--WRAPPER END-->
</div>
</body>
</html>