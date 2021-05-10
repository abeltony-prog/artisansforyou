<?php
    include('DB.php');
    class Login{
      Public Static function isLoggedIn() {
        if (isset($_COOKIE['SNID'])) {
          if (DB::query('SELECT artisan_id FROM artisan_login WHERE tokens = :token', array(':token'=>sha1($_COOKIE['SNID'])))) {
            $artisan_id = DB::query('SELECT artisan_id FROM artisan_login WHERE tokens = :token', array(':token'=>sha1($_COOKIE['SNID'])))[0]['artisan_id'];
            //return $user_id;
            if (isset($_COOKIE['SNID_'])) {
              return $artisan_id;
            }else {
              $cstrong = True;
              $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
              DB::query('INSERT INTO artisan_login VALUES(\'\',:artisan_id, :tokens)', array(':artisan_id'=>$artisan_id,':tokens'=>sha1($token)));
              DB::query('DELETE FROM artisan_login WHERE tokens = :token', array(':token'=>sha1($_COOKIE['SNID'])));

              setcookie("SNID", $token, time() + 60 * 60 * 24 * 7, '/', NULL, NULL, TRUE );
              setcookie("SNID_", '1', time() + 60 * 60 * 24 * 3, '/', NULL, NULL, TRUE );
              return $artisanid;
            }
          }
        }
        return false;
      }
    }
 ?>
