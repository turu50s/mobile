<?php
$path = '.' .PATH_SEPARATOR. '../../PEAR';
ini_set('include_path',get_include_path() .PATH_SEPARATOR. $path);
ini_set('session.use_cookies','0');
ini_set('session.use_trans_sid','1');
//ini_set('sendmail_path','/usr/lib/sendmail -t -i');

require_once 'HTTP.php';
require_once 'HTTP/Session2.php';

// POSTデータをｷｰと値に分解
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    foreach($_POST as $k => $v) {
        $v = htmlspecialchars($v, ENT_QUOTES, 'SJIS');
             
        // magic_quotes_gpcの値がONなら\削除
        if ( get_magic_quotes_gpc() ) {
           $v = stripslashes($v);
        }
        $$k = $v;
    }
} 
//session_start();
// 画面切り替え
HTTP_Session2::useCookies(false);
HTTP_Session2::start();
if (!preg_match("/^[1-9][0-9]*$/",$_POST['number1'])) {
    HTTP_Session2::set('messasge', '番号を選択して下さい。');
	//$_SESSION['err'] = "番号を選択して下さい。";
	$sis_id=session_name()."=".session_id();
    HTTP::redirect("http://www.asa-kashiwa.net/mobile/masuo/fon.php?".$sis_id);   
} else if ((1 > $_POST['number1']) || ($_POST['number1'] > $_POST['ticket'])) {
	HTTP_Session2::set('messasge', '正しい番号を選択して下さい。');
    $sis_id=session_name()."=".session_id();
    HTTP::redirect("http://www.asa-kashiwa.net/mobile/masuo/fon.php?".$sis_id); 
}
if ($_POST['number2'] != "") {
	if (!preg_match("/^[1-9][0-9]*$/",$_POST['number2'])) {
	    HTTP_Session2::set('messasge', '番号を選択して下さい。');
	    //$_SESSION['err'] = "番号を選択して下さい。";
	    $sis_id=session_name()."=".session_id();
	    HTTP::redirect("http://www.asa-kashiwa.net/mobile/masuo/fon.php?".$sis_id);   
	} else if ((1 > $_POST['number2']) || ($_POST['number2'] > $_POST['ticket'])) {
	    HTTP_Session2::set('messasge', '正しい番号を選択して下さい。');
	    $sis_id=session_name()."=".session_id();
	    HTTP::redirect("http://www.asa-kashiwa.net/mobile/masuo/fon.php?".$sis_id); 
	}
}
if ($_POST['number3'] != "") {
    if (!preg_match("/^[1-9][0-9]*$/",$_POST['number3'])) {
        HTTP_Session2::set('messasge', '番号を選択して下さい。');
        //$_SESSION['err'] = "番号を選択して下さい。";
        $sis_id=session_name()."=".session_id();
        HTTP::redirect("http://www.asa-kashiwa.net/mobile/masuo/fon.php?".$sis_id);   
    } else if ((1 > $_POST['number3']) || ($_POST['number3'] > $_POST['ticket'])) {
        HTTP_Session2::set('messasge', '正しい番号を選択して下さい。');
        $sis_id=session_name()."=".session_id();
        HTTP::redirect("http://www.asa-kashiwa.net/mobile/masuo/fon.php?".$sis_id); 
    }
}
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
<title>ますお広場</title>
<style type="text/css">
<![CDATA[
a:link{color:blue;}
a:focus{color:red}
a:visited{color:purple;}
]]>
body { margin:0; color:black; }
div.content { background-color:#87fb98; margin-left:auto; margin-right:auto; padding:2px; width:270px; }
div.tex { margin-left:10%; }
</style>
</head>
<body>
<div align="center" class="content">
<!--WRAPPER END-->
<div style="font-size:large;">

<!--ロゴ-->
<div style="text-align:center;" align="center">
<img src="./hiroba.gif" width="250" height="45" alt="" style="margin:7px 0 7px 0;" />
</div>
<!--ロゴEND-->

<!--区切り-->
<hr size="1" color="blue" style="border-color:blue;">
<!--区切りEND-->

<!--マーキー-->
<!--  <div style="display:-wap-marquee;background-color:navy;color:white;"> -->
<div>
<font color="white"><marquee bgcolor="#0080ff" behavior=scroll>
ちゃんと入力してね～</marquee></font>
</div>
<!--マーキーEND-->

<?php
$ssl = 'https://www.asa-kashiwa.net';

switch (@$id) {
case 0:
  scr_ent();          // 入力画面
  break;
case 1:
  scr_check();        // 内容確認画面
  break;
case 2:
  scr_sub();          // メール送信画面
  break;
default:
  scr_ent();
}
        
function scr_ent() {
    // 入力画面
    global $name;
    global $pname;
    global $town;
    global $street;
    global $bilding;
    global $tel;
    global $email1;
    global $email2;
    global $age;
    global $number1;
    global $number2;
    global $number3;
    global $comment;
    global $ticket;
    global $ssl;
    
         
?>
<br>
・以下の項目に入力後、送信して下さい。<br /><br /> 
      <font color="red">※</font>は、必須項目です。
      <div align="left" class="tex">
      <form action="<?php echo $ssl.$_SERVER["PHP_SELF"]; ?>" method="post" accept-charset="SJIS-win">
        <input type="hidden" name="id" value="1">
        <input type="hidden" name="number1" value="<?php print "$number1"; ?>">
        <input type="hidden" name="number2" value="<?php print "$number2"; ?>">
        <input type="hidden" name="number3" value="<?php print "$number3"; ?>">
        <input type="hidden" name="ticket" value="<?php print "$ticket"; ?>">
   <font color="red">※</font>①お名前：<br>
      <input type="text" name="name" value="<?php print "$name"; ?>" istyle="1" accesskey="1" size="20"><br>
　②ペンネーム：<br>
    <input type="text" name="pname" value="<?php print "$pname"; ?>" istyle="1" accesskey="2" size="20"><br>
　③年齢：
  <select name="age" accesskey="3">
  <option value="">選択して下さい</option>
<?php
   for ($i = 7; $i <= 80; $i++) {
     print('<option value ="' . $i . '">' .$i. '歳</option>');
   }
?>
   </select><br>       
   <font color="red">※</font>④ご住所:柏市<br>
  　町名<select name="town" accesskey="4">
  <option value="">選択して下さい</option>
<?php
try {
	mb_language("Japanese");
    mb_internal_encoding ("eucJP-win");
    
    $db = new PDO('sqlite:../../SQLiteManager-1.2.0/mobile.db');
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
    $sql = "SELECT * FROM 'address' WHERE tenpo = 'masuo'";
    $rs  = $db->query($sql);
    while ($row = $rs->fetch(PDO::FETCH_ASSOC)) {
         print('<option value="' . mb_convert_encoding($row['town'],"SJIS-win","UTF-8") .'">'
            . mb_convert_encoding($row['town'],"SJIS-win","UTF-8") . '</option>');
        //print('<option value="' . mb_convert_encoding($row['town'],"SJIS-win",mb_internal_encoding()) .'">'
        //    . mb_convert_encoding($row['town'],"SJIS-win",mb_internal_encoding()) . '</option>');  
    }
} catch (PDOException $e) {
    die('error: '. $e->getMessage());
}
    
?>
  </select><br>
  　番地
     <input type="text" name="street" value="<?php print "$street"; ?>" istyle="4" size="20"><br>
  　建物
     <input type="text" name="bilding" value="<?php print "$bilding"; ?>" istyle="1" size="20"><br>
   <font color="red">※</font>⑤電話：<br>
      <input type="text" name="tel" value="<?php print "$tel"; ?>" istyle="4" accesskey="5" size="20"><br>
    ※ﾒｰﾙｱﾄﾞﾚｽは、半角で入力して下さい。<br>
 ⑥ﾒｰﾙｱﾄﾞﾚｽ：<br>
      <input type="text" name="email1" value="<?php print "$email1"; ?>" istyle="3" accesskey="6" size="20">@
   <select name="email2" >
   <option value="">選択して下さい</option>
<?php   
  try {
    $db = new PDO('sqlite:../../SQLiteManager-1.2.0/mobile.db');
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
    $sql = "SELECT * FROM 'email'";
    $rs  = $db->query($sql);
    while ($row = $rs->fetch(PDO::FETCH_ASSOC)) {
        print('<option value="' . $row['domain'] .'">' . $row['domain'] . '</option>');  
    }
  } catch (PDOException $e) {
    die('error: '. $e->getMessage());
  }
?>
<!--   <option value="docomo.ne.jp">docomo.ne.jp</option>-->
<!--   <option value="ezweb.ne.jp">ezweb.ne.jp</option>-->
<!--   <option value="softbank.ne.jp">softbank.ne.jp</option>-->
<!--   <option value="d.vodafone.ne.jp">d.vodafone.ne.jp</option>-->
<!--   <option value="h.vodafone.ne.jp">h.vodafone.ne.jp</option>-->
<!--   <option value="t.vodafone.ne.jp">t.vodafone.ne.jp</option>-->
<!--   <option value="r.vodafone.ne.jp">r.vodafone.ne.jp</option>-->
<!--   <option value="c.vodafone.ne.jp">c.vodafone.ne.jp</option>-->
<!--   <option value="k.vodafone.ne.jp">k.vodafone.ne.jp</option>-->
<!--   <option value="n.vodafone.ne.jp">n.vodafone.ne.jp</option>-->
<!--   <option value="s.vodafone.ne.jp">s.vodafone.ne.jp</option>-->
<!--   <option value="q.vodafone.ne.jp">q.vodafone.ne.jp</option>-->
<!--   <option value="willcom.com">willcom.com</option>-->
<!--   <option value="pdx.ne.jp">pdx.ne.jp</option>-->
<!--   <option value="di.pdx.ne.jp">di.pdx.ne.jp</option>-->
<!--   <option value="dj.pdx.ne.jp">dj.pdx.ne.jp</option>-->
<!--   <option value="dk.pdx.ne.jp">dk.pdx.ne.jp</option>-->
<!--   <option value="wm.pdx.ne.jp">wm.pdx.ne.jp</option>-->
   </select><br>
       
　⑦コメント：<br>
          <textarea name="comment" cols="20" rows="2" accesskey="7"><?php print "$comment"; ?></textarea><br>
          <input type="submit" value="確認する">
          
      </form><br>
      <a href="fon.php">○チケット選択画面へ戻る。</a>
      </div>
<?php
}
      
// 入力内容確認
function scr_check() {
    
    global $name;
    global $pname;
    global $town;
    global $street;
    global $bilding;
    global $tel;
    global $email1;
    global $email2;
    global $age;
    global $number1;
    global $number2;
    global $number3;
    global $comment;
    global $ticket;
    global $ssl;

    $email = trim($email1) . "@" . trim($email2);
    
    $err = 0;
    if ($name == "") {
       echo "<p>名前を入力して下さい。</p>";
       $err = 1;
    }
    if ($town == "") {
        echo "<p>町名を入力して下さい。</p>";
        $err = 1;
    } elseif ($street == "") {
        echo "<p>番地を入力して下さい。</p>";
        $err = 1;
    }
    if ($tel == "") {
       echo "<p>電話番号を入力して下さい。</p>";
       $err = 1;
    }
    //if ($email == "") {
    //   echo "<p>メールアドレスを入力して下さい。</p>";
    //   $err = 1;
    //} else {
    //   if (!is_mail($email)) {
    //      echo "<p>正しいメールアドレスを入力して下さい。</p>";
    //      $err = 1;
    //   }
    //}
      
    if ($err) {
       scr_err();
       exit();
    }
        
    // 改行処理
    $comment1 = nl2br($comment);

?>
        <p>以下の内容で間違いないでしょうか？</p><br/>
        <div align="left" class="tex">
        <form action="<?php echo $ssl.$_SERVER["PHP_SELF"]; ?>" method="post">
           ①お名前：<?php print "$name"; ?><br>
           ②ペンネーム：<?php print "$pname"; ?><br>
           ③年齢：<?php print "$age"; ?>歳<br>
           ④ご住所：<?php print "$town"; ?><?php print "$street"; ?><br>
            <?php if ($bilding != "") { print "　　　　　"."$bilding<br>"; } ?>
           ⑤電話：<?php print "$tel"; ?><br>
          ⑥Eメール：<br><?php print "　"."$email"; ?><br>
           ⑦チケット番号：<br>
   　　第1希望  <?php print $number1 ?><br>
   　　第2希望  <?php print $number2 ?><br>
   　　第3希望  <?php print $number3 ?><br>
          ⑧コメント：<br><?php print "$comment1"; ?>
          
          <p>内容に間違いが無ければ<b>”送信ボタン”</b>をクリックして下さい。</p>
          <p><input type="submit" value="送信する"></p>
          <input type="hidden" name="id" value="2">
          <input type="hidden" name="name" value="<?php print "$name" ?>">
          <input type="hidden" name="pname" value="<?php print "$pname" ?>">
          <input type="hidden" name="town" value="<?php print "$town" ?>">
          <input type="hidden" name="street" value="<?php print "$street" ?>">
          <input type="hidden" name="bilding" value="<?php print "$bilding" ?>">
          <input type="hidden" name="tel" value="<?php print "$tel"; ?>">
          <input type="hidden" name="email" value="<?php print "$email" ?>">
          <input type="hidden" name="age" value="<?php print "$age" ?>">
          <input type="hidden" name="comment" value="<?php print "$comment" ?>">
          <input type="hidden" name="number1" value="<?php print "$number1"; ?>">
          <input type="hidden" name="number2" value="<?php print "$number2"; ?>">
          <input type="hidden" name="number3" value="<?php print "$number3"; ?>">
          <input type="hidden" name="ticket" value="<?php print "$ticket"; ?>">
        </form>
        <form action="<?php echo $ssl.$_SERVER["PHP_SELF"]; ?>" method="post">
          <input type="hidden" name="id" value="0">
          <input type="hidden" name="name" value="<?php print "$name" ?>">
          <input type="hidden" name="pname" value="<?php print "$pname" ?>">
          <input type="hidden" name="town" value="<?php print "$town" ?>">
          <input type="hidden" name="street" value="<?php print "$street" ?>">
          <input type="hidden" name="bilding" value="<?php print "$bilding" ?>">
          <input type="hidden" name="tel" value="<?php print "$tel"; ?>">
          <input type="hidden" name="email1" value="<?php print "$email1" ?>">
          <input type="hidden" name="email2" value="<?php print "$email2" ?>">
          <input type="hidden" name="age" value="<?php print "$age" ?>">
          <input type="hidden" name="comment" value="<?php print "$comment" ?>">
          <input type="hidden" name="number1" value="<?php print "$number1"; ?>">
          <input type="hidden" name="number2" value="<?php print "$number2"; ?>">
          <input type="hidden" name="number3" value="<?php print "$number3"; ?>">
          <input type="hidden" name="ticket" value="<?php print "$ticket"; ?>">
          <p><input type="submit" value="訂正する"></p>
             
        </form>
      </div>
<?php 
}

// email address check
function is_mail($email) {
       
    if (preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $email)) {
       return TRUE;
    } else {
       return FALSE;
    }
}
      
// 入力項目に空欄があった場合
function scr_err() {
    global $name;
    global $pname;
    global $town;
    global $street;
    global $bilding;
    global $tel;
    global $email1;
    global $email2;
    global $age;
    global $number1;
    global $number2;
    global $number3;
    global $comment;
    global $ticket;
    global $ssl;
     
    // 改行処理
    $comment1 = nl2br($comment);
?>
        <h3>もう一度、入力し直して下さい。</h3>
        <form action="<?php echo $ssl.$_SERVER["PHP_SELF"]; ?>" method="post">
          <input type="hidden" name="id" value="0">
          <input type="hidden" name="name" value="<?php print "$name" ?>">
          <input type="hidden" name="pname" value="<?php print "$pname" ?>">
          <input type="hidden" name="town" value="<?php print "$town" ?>">
          <input type="hidden" name="street" value="<?php print "$street" ?>">
          <input type="hidden" name="bilding" value="<?php print "$bilding" ?>">
          <input type="hidden" name="tel" value="<?php print "$tel"; ?>">
          <input type="hidden" name="email1" value="<?php print "$email1" ?>">
          <input type="hidden" name="email2" value="<?php print "$email2" ?>">
          <input type="hidden" name="number1" value="<?php print "$number1"; ?>">
          <input type="hidden" name="number2" value="<?php print "$number2"; ?>">
          <input type="hidden" name="number3" value="<?php print "$number3"; ?>">
          <input type="hidden" name="comment" value="<?php print "$comment1" ?>">
          <input type="hidden" name="ticket" value="<?php print "$ticket"; ?>">
          <p><input type="submit" value="入力画面へ"></p>
        </form>
<?php
}
      
      
function scr_sub() {
    // メール組み立て・送信
    global $name;
    global $pname;
    global $town;
    global $street;
    global $bilding;
    global $email;
    global $tel;
    global $age;
    global $number1;
    global $number2;
    global $number3;
    global $comment;
    global $ticket;
    global $ssl;
    
    // 改行処理
    $comment1 = nl2br($comment);
?>
      
        <p>チケットのお申し込み有難う御座います。<br>
                          以下の内容でメールを送信しました。</p><br/>
          <div align="left" class="tex">
          ①お名前：<?php print $name ?><br>
           ②ペンネーム：<?php print $pname ?><br>
          ③年齢：<?php print $age?>歳<br>
         ④ご住所：<?php print $town ?><?php print $street ?><br>
          <?php print "　　　　　".$bilding ?><br>
          ⑤電話：<?php print $tel ?><br>
           ⑥Eメール：<br><?php print "　".$email ?><br>
          ⑦チケット番号：<br>
   　　第1希望 <?php print $number1 ?><br>
   　　第2希望 <?php print $number2 ?><br>
   　　第3希望 <?php print $number3 ?><br>
          ⑧コメント：<br><?php print $comment1 ?>
        </div>
</br>
<a href="http://www.asams.jp/~a12103">ASA ﾓﾊﾞｲﾙ ｻｰﾋﾞｽ</a>

<?php
    
    $address = $town . $street . $bilding;
    
    // 各担当店への送信
    $header  ="Content-Type:text/plain;charset=iso-2022-jp\n";
    $header .= "From: $email";
       
    $to = "masuo-tk@asa-kashiwa.net";
        
    mb_language("Japanese");
    mb_internal_encoding ("UTF-8");
         
    $title = mb_convert_encoding("【ますお広場】チケットプレゼント申込",mb_internal_encoding() ,"SJIS-win");
    $date  = date("Y/m/d H:i:s (D)");
    $naiyo = "お客様より「チケットプレゼント」の申し込みが来ました。\n\n"
             ."----------------------------------------\n" 
             ."受付時刻：$date\nお名前：$name\nペンネーム：$pname"."\n年齢：$age"
             ."歳\nご住所：$address\n電話：$tel\nメールアドレス：$email"
             ."\n\nチケット番号：第1希望 $number1\n　　　　　　　第2希望 $number2\n　　　　　　　第3希望 $number3\n\n"
             ."----------------------------------------\n\n" 
             ."【コメント】\n$comment\n";
        
        
    if ($name != "" && $address != "" && $email != "") {
       if (mb_send_mail($to, $title, mb_convert_encoding($naiyo,mb_internal_encoding() ,"SJIS-win"), $header)) {
          print "  ";
       } else {
          print "**** メール送信失敗です。  ****";
          
       }
    }
    
    // iFAXへの送信
    $header  ="Content-Type:text/plain;charset=iso-2022-jp\n";
    $header .= "From: f-market@asa-kashiwa.net";
       
    $to = "0471722900@olink.ne.jp";
        
    mb_language("Japanese");
    mb_internal_encoding ("UTF-8");
         
    $title = mb_convert_encoding("チケットプレゼントの申込",mb_internal_encoding() ,"SJIS-win");
    $date  = date("Y/m/d H:i:s (D)");
    $naiyo = "#userid=5002688250\n#passwd=sch0112f\n"
             ."【ますお広場】\n\nチケットプレゼント申し込み\n\n"
             ."------------------------------------------\n\n" 
             ."受付時刻：$date\n\nお名前：$name\n\nペンネーム：$pname"."\n\n年齢：$age"
             ."歳\n\nご住所：$address\n\n電話：$tel\n\nメールアドレス：$email"
             ."\n\nチケット番号：第1希望 $number1\n　　　　　　　第2希望 $number2\n　　　　　　　第3希望 $number3\n\n"
             ."------------------------------------------\n\n" 
             . "【コメント】\n$comment\n";
        
        
    if ($name != "" && $address != "" && $email != "") {
       if (mb_send_mail($to, $title, mb_convert_encoding($naiyo,mb_internal_encoding() ,"SJIS-win"), $header)) {
          print "  ";
       } else {
          print "**** メール送信失敗です。  ****";
       }
    }
}
       
?>
</div>
</body>
</html>