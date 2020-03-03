<?php

error_reporting(0);
include ("func.php");
echo "\e            THEDEVILS KOMUNITAS            \n";
echo "\e      TOLONG GUNAKAN DENGAN TIDAK BIJAK :V \n";
echo "\e            GOJEK INDONESIA                \n";
echo "\e       AUTO CLAIM VOUCHER DAN NGANU        \n";
echo "\n";
nope:
echo "\e[?] Masukin Nomor HP Lau : ";
$nope = trim(fgets(STDIN));
$cek = cekno($nope);
if ($cek == false)
    {
    echo "\e[x] Nomor Udah Kedaftar Cuk\n";
			goto nope;
    }
  else
    {
echo "\e[!] Siapkan OTP Lau\n";
sleep(5);
$register = register($nope);
if ($register == false)
    {
    echo "\e[x] Failed Get OTP!\n";
    }
  else
    {
    otp:
    echo "\e[!] Masukkan Kode Verifikasi (OTP) : ";
    $otp = trim(fgets(STDIN));
    $verif = verif($otp, $register);
    if ($verif == false)
        {
        echo "\e[x] Kode Verifikasi Salah\n";
        goto otp;
        }
      else
        {
		$h=fopen("newgojek.txt","a");
		fwrite($h,json_encode(array('token' => $verif, 'voc' => 'gofood gak ada'))."\n");
		fclose($h); 
                echo "\e[!] Trying to redeem Reff : G-75SR565 !\n";
                sleep(3);
            $claim = reff($verif);
            if ($claim == false){
            echo "\e[!] Failed to Claim Voucher, Try to Claim Manually\n";
            }else{
                echo "\e[+] ".$claim."\n";
            }
    }
    }
    }


?>
