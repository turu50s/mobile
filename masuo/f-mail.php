<?php
$path = '.' .PATH_SEPARATOR. '../../PEAR';
ini_set('include_path',get_include_path() .PATH_SEPARATOR. $path);
ini_set('session.use_cookies','0');
ini_set('session.use_trans_sid','1');
//ini_set('sendmail_path','/usr/lib/sendmail -t -i');

require_once 'HTTP.php';
require_once 'HTTP/Session2.php';

// POST�f�[�^�𷰂ƒl�ɕ���
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    foreach($_POST as $k => $v) {
        $v = htmlspecialchars($v, ENT_QUOTES, 'SJIS');
             
        // magic_quotes_gpc�̒l��ON�Ȃ�\�폜
        if ( get_magic_quotes_gpc() ) {
           $v = stripslashes($v);
        }
        $$k = $v;
    }
} 
//session_start();
// ��ʐ؂�ւ�
HTTP_Session2::useCookies(false);
HTTP_Session2::start();
if (!preg_match("/^[1-9][0-9]*$/",$_POST['number1'])) {
    HTTP_Session2::set('messasge', '�ԍ���I�����ĉ������B');
	//$_SESSION['err'] = "�ԍ���I�����ĉ������B";
	$sis_id=session_name()."=".session_id();
    HTTP::redirect("http://www.asa-kashiwa.net/mobile/masuo/fon.php?".$sis_id);   
} else if ((1 > $_POST['number1']) || ($_POST['number1'] > $_POST['ticket'])) {
	HTTP_Session2::set('messasge', '�������ԍ���I�����ĉ������B');
    $sis_id=session_name()."=".session_id();
    HTTP::redirect("http://www.asa-kashiwa.net/mobile/masuo/fon.php?".$sis_id); 
}
if ($_POST['number2'] != "") {
	if (!preg_match("/^[1-9][0-9]*$/",$_POST['number2'])) {
	    HTTP_Session2::set('messasge', '�ԍ���I�����ĉ������B');
	    //$_SESSION['err'] = "�ԍ���I�����ĉ������B";
	    $sis_id=session_name()."=".session_id();
	    HTTP::redirect("http://www.asa-kashiwa.net/mobile/masuo/fon.php?".$sis_id);   
	} else if ((1 > $_POST['number2']) || ($_POST['number2'] > $_POST['ticket'])) {
	    HTTP_Session2::set('messasge', '�������ԍ���I�����ĉ������B');
	    $sis_id=session_name()."=".session_id();
	    HTTP::redirect("http://www.asa-kashiwa.net/mobile/masuo/fon.php?".$sis_id); 
	}
}
if ($_POST['number3'] != "") {
    if (!preg_match("/^[1-9][0-9]*$/",$_POST['number3'])) {
        HTTP_Session2::set('messasge', '�ԍ���I�����ĉ������B');
        //$_SESSION['err'] = "�ԍ���I�����ĉ������B";
        $sis_id=session_name()."=".session_id();
        HTTP::redirect("http://www.asa-kashiwa.net/mobile/masuo/fon.php?".$sis_id);   
    } else if ((1 > $_POST['number3']) || ($_POST['number3'] > $_POST['ticket'])) {
        HTTP_Session2::set('messasge', '�������ԍ���I�����ĉ������B');
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
<title>�܂����L��</title>
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

<!--���S-->
<div style="text-align:center;" align="center">
<img src="./hiroba.gif" width="250" height="45" alt="" style="margin:7px 0 7px 0;" />
</div>
<!--���SEND-->

<!--��؂�-->
<hr size="1" color="blue" style="border-color:blue;">
<!--��؂�END-->

<!--�}�[�L�[-->
<!--  <div style="display:-wap-marquee;background-color:navy;color:white;"> -->
<div>
<font color="white"><marquee bgcolor="#0080ff" behavior=scroll>
�����Ɠ��͂��Ăˁ`</marquee></font>
</div>
<!--�}�[�L�[END-->

<?php
$ssl = 'https://www.asa-kashiwa.net';

switch (@$id) {
case 0:
  scr_ent();          // ���͉��
  break;
case 1:
  scr_check();        // ���e�m�F���
  break;
case 2:
  scr_sub();          // ���[�����M���
  break;
default:
  scr_ent();
}
        
function scr_ent() {
    // ���͉��
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
�E�ȉ��̍��ڂɓ��͌�A���M���ĉ������B<br /><br /> 
      <font color="red">��</font>�́A�K�{���ڂł��B
      <div align="left" class="tex">
      <form action="<?php echo $ssl.$_SERVER["PHP_SELF"]; ?>" method="post" accept-charset="SJIS-win">
        <input type="hidden" name="id" value="1">
        <input type="hidden" name="number1" value="<?php print "$number1"; ?>">
        <input type="hidden" name="number2" value="<?php print "$number2"; ?>">
        <input type="hidden" name="number3" value="<?php print "$number3"; ?>">
        <input type="hidden" name="ticket" value="<?php print "$ticket"; ?>">
   <font color="red">��</font>�@�����O�F<br>
      <input type="text" name="name" value="<?php print "$name"; ?>" istyle="1" accesskey="1" size="20"><br>
�@�A�y���l�[���F<br>
    <input type="text" name="pname" value="<?php print "$pname"; ?>" istyle="1" accesskey="2" size="20"><br>
�@�B�N��F
  <select name="age" accesskey="3">
  <option value="">�I�����ĉ�����</option>
<?php
   for ($i = 7; $i <= 80; $i++) {
     print('<option value ="' . $i . '">' .$i. '��</option>');
   }
?>
   </select><br>       
   <font color="red">��</font>�C���Z��:���s<br>
  �@����<select name="town" accesskey="4">
  <option value="">�I�����ĉ�����</option>
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
  �@�Ԓn
     <input type="text" name="street" value="<?php print "$street"; ?>" istyle="4" size="20"><br>
  �@����
     <input type="text" name="bilding" value="<?php print "$bilding"; ?>" istyle="1" size="20"><br>
   <font color="red">��</font>�D�d�b�F<br>
      <input type="text" name="tel" value="<?php print "$tel"; ?>" istyle="4" accesskey="5" size="20"><br>
    ��Ұٱ��ڽ�́A���p�œ��͂��ĉ������B<br>
 �EҰٱ��ڽ�F<br>
      <input type="text" name="email1" value="<?php print "$email1"; ?>" istyle="3" accesskey="6" size="20">@
   <select name="email2" >
   <option value="">�I�����ĉ�����</option>
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
       
�@�F�R�����g�F<br>
          <textarea name="comment" cols="20" rows="2" accesskey="7"><?php print "$comment"; ?></textarea><br>
          <input type="submit" value="�m�F����">
          
      </form><br>
      <a href="fon.php">���`�P�b�g�I����ʂ֖߂�B</a>
      </div>
<?php
}
      
// ���͓��e�m�F
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
       echo "<p>���O����͂��ĉ������B</p>";
       $err = 1;
    }
    if ($town == "") {
        echo "<p>��������͂��ĉ������B</p>";
        $err = 1;
    } elseif ($street == "") {
        echo "<p>�Ԓn����͂��ĉ������B</p>";
        $err = 1;
    }
    if ($tel == "") {
       echo "<p>�d�b�ԍ�����͂��ĉ������B</p>";
       $err = 1;
    }
    //if ($email == "") {
    //   echo "<p>���[���A�h���X����͂��ĉ������B</p>";
    //   $err = 1;
    //} else {
    //   if (!is_mail($email)) {
    //      echo "<p>���������[���A�h���X����͂��ĉ������B</p>";
    //      $err = 1;
    //   }
    //}
      
    if ($err) {
       scr_err();
       exit();
    }
        
    // ���s����
    $comment1 = nl2br($comment);

?>
        <p>�ȉ��̓��e�ŊԈႢ�Ȃ��ł��傤���H</p><br/>
        <div align="left" class="tex">
        <form action="<?php echo $ssl.$_SERVER["PHP_SELF"]; ?>" method="post">
           �@�����O�F<?php print "$name"; ?><br>
           �A�y���l�[���F<?php print "$pname"; ?><br>
           �B�N��F<?php print "$age"; ?>��<br>
           �C���Z���F<?php print "$town"; ?><?php print "$street"; ?><br>
            <?php if ($bilding != "") { print "�@�@�@�@�@"."$bilding<br>"; } ?>
           �D�d�b�F<?php print "$tel"; ?><br>
          �EE���[���F<br><?php print "�@"."$email"; ?><br>
           �F�`�P�b�g�ԍ��F<br>
   �@�@��1��]  <?php print $number1 ?><br>
   �@�@��2��]  <?php print $number2 ?><br>
   �@�@��3��]  <?php print $number3 ?><br>
          �G�R�����g�F<br><?php print "$comment1"; ?>
          
          <p>���e�ɊԈႢ���������<b>�h���M�{�^���h</b>���N���b�N���ĉ������B</p>
          <p><input type="submit" value="���M����"></p>
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
          <p><input type="submit" value="��������"></p>
             
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
      
// ���͍��ڂɋ󗓂��������ꍇ
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
     
    // ���s����
    $comment1 = nl2br($comment);
?>
        <h3>������x�A���͂������ĉ������B</h3>
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
          <p><input type="submit" value="���͉�ʂ�"></p>
        </form>
<?php
}
      
      
function scr_sub() {
    // ���[���g�ݗ��āE���M
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
    
    // ���s����
    $comment1 = nl2br($comment);
?>
      
        <p>�`�P�b�g�̂��\�����ݗL�������܂��B<br>
                          �ȉ��̓��e�Ń��[���𑗐M���܂����B</p><br/>
          <div align="left" class="tex">
          �@�����O�F<?php print $name ?><br>
           �A�y���l�[���F<?php print $pname ?><br>
          �B�N��F<?php print $age?>��<br>
         �C���Z���F<?php print $town ?><?php print $street ?><br>
          <?php print "�@�@�@�@�@".$bilding ?><br>
          �D�d�b�F<?php print $tel ?><br>
           �EE���[���F<br><?php print "�@".$email ?><br>
          �F�`�P�b�g�ԍ��F<br>
   �@�@��1��] <?php print $number1 ?><br>
   �@�@��2��] <?php print $number2 ?><br>
   �@�@��3��] <?php print $number3 ?><br>
          �G�R�����g�F<br><?php print $comment1 ?>
        </div>
</br>
<a href="http://www.asams.jp/~a12103">ASA ��޲� ���޽</a>

<?php
    
    $address = $town . $street . $bilding;
    
    // �e�S���X�ւ̑��M
    $header  ="Content-Type:text/plain;charset=iso-2022-jp\n";
    $header .= "From: $email";
       
    $to = "masuo-tk@asa-kashiwa.net";
        
    mb_language("Japanese");
    mb_internal_encoding ("UTF-8");
         
    $title = mb_convert_encoding("�y�܂����L��z�`�P�b�g�v���[���g�\��",mb_internal_encoding() ,"SJIS-win");
    $date  = date("Y/m/d H:i:s (D)");
    $naiyo = "���q�l���u�`�P�b�g�v���[���g�v�̐\�����݂����܂����B\n\n"
             ."----------------------------------------\n" 
             ."��t�����F$date\n�����O�F$name\n�y���l�[���F$pname"."\n�N��F$age"
             ."��\n���Z���F$address\n�d�b�F$tel\n���[���A�h���X�F$email"
             ."\n\n�`�P�b�g�ԍ��F��1��] $number1\n�@�@�@�@�@�@�@��2��] $number2\n�@�@�@�@�@�@�@��3��] $number3\n\n"
             ."----------------------------------------\n\n" 
             ."�y�R�����g�z\n$comment\n";
        
        
    if ($name != "" && $address != "" && $email != "") {
       if (mb_send_mail($to, $title, mb_convert_encoding($naiyo,mb_internal_encoding() ,"SJIS-win"), $header)) {
          print "  ";
       } else {
          print "**** ���[�����M���s�ł��B  ****";
          
       }
    }
    
    // iFAX�ւ̑��M
    $header  ="Content-Type:text/plain;charset=iso-2022-jp\n";
    $header .= "From: f-market@asa-kashiwa.net";
       
    $to = "0471722900@olink.ne.jp";
        
    mb_language("Japanese");
    mb_internal_encoding ("UTF-8");
         
    $title = mb_convert_encoding("�`�P�b�g�v���[���g�̐\��",mb_internal_encoding() ,"SJIS-win");
    $date  = date("Y/m/d H:i:s (D)");
    $naiyo = "#userid=5002688250\n#passwd=sch0112f\n"
             ."�y�܂����L��z\n\n�`�P�b�g�v���[���g�\������\n\n"
             ."------------------------------------------\n\n" 
             ."��t�����F$date\n\n�����O�F$name\n\n�y���l�[���F$pname"."\n\n�N��F$age"
             ."��\n\n���Z���F$address\n\n�d�b�F$tel\n\n���[���A�h���X�F$email"
             ."\n\n�`�P�b�g�ԍ��F��1��] $number1\n�@�@�@�@�@�@�@��2��] $number2\n�@�@�@�@�@�@�@��3��] $number3\n\n"
             ."------------------------------------------\n\n" 
             . "�y�R�����g�z\n$comment\n";
        
        
    if ($name != "" && $address != "" && $email != "") {
       if (mb_send_mail($to, $title, mb_convert_encoding($naiyo,mb_internal_encoding() ,"SJIS-win"), $header)) {
          print "  ";
       } else {
          print "**** ���[�����M���s�ł��B  ****";
       }
    }
}
       
?>
</div>
</body>
</html>