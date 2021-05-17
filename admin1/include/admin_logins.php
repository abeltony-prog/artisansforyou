<?php
    include('DB.php');
    class Login{
      Public Static function isLoggedIn() {
        if (isset($_COOKIE['SNID'])) {
          if (DB::query('SELECT admin_id FROM admin_logins WHERE tokens = :token', array(':token'=>sha1($_COOKIE['SNID'])))) {
            $admin_id = DB::query('SELECT admin_id FROM admin_logins WHERE tokens = :token', array(':token'=>sha1($_COOKIE['SNID'])))[0]['admin_id'];
            //return $user_id;
            if (isset($_COOKIE['SNID_'])) {
              return $admin_id;
            }else {
              $cstrong = True;
              $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
              DB::query('INSERT INTO admin_logins VALUES(\'\',:admin_id, :tokens)', array(':admin_id'=>$admin_id,':tokens'=>sha1($token)));
              DB::query('DELETE FROM admin_logins WHERE tokens = :token', array(':token'=>sha1($_COOKIE['SNID'])));

              setcookie("SNID", $token, time() + 60 * 60 * 24 * 7, '/', NULL, NULL, TRUE );
              setcookie("SNID_", '1', time() + 60 * 60 * 24 * 3, '/', NULL, NULL, TRUE );
              return $adminid;
            }
          }
        }
        return false;
      }
    }
 ?>
