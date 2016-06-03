<?php

//print file_get_contents('http://geocoder.cit.api.here.com/6.2/geocode.xml?app_id=510iTbj64l3Q9cPv56Dg&app_code=sECOJD4NX-DfqbYXAX14Ug&gen=9&country=USA&state=NY&city=new%20delh');
/*
		$api_request = str_replace( '+' , '%20' , "geocoder.cit.api.here.com/6.2/geocode.json?app_id=510iTbj64l3Q9cPv56Dg&app_code=sECOJD4NX-DfqbYXAX14Ug&gen=9&country=USA&state=NY&city=new%20delh" );
        $out['api_request'] = $api_request ;
		//echo $api_request;
        $api_session = curl_init($api_request);
        // curl_setopt($api_session, CURLOPT_HTTPHEADER, $api_headers);
        // curl_setopt ($api_session, CURLOPT_POSTFIELDS, $api_params);
   //     curl_setopt($api_session, CURLOPT_HEADER, false);
       // curl_setopt($api_session, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1_2);
		curl_setopt($api_session, CURLOPT_SSL_VERIFYHOST, 1);
		curl_setopt($api_session, CURLOPT_SSL_VERIFYPEER, 1);
      //  curl_setopt($api_session, CURLOPT_RETURNTRANSFER, true);
	  //curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $api_response = curl_exec($api_session);
		// also get the error and response code
		$errors = curl_error($api_session);
		$response = curl_getinfo($api_session, CURLINFO_HTTP_CODE);		
		curl_close($api_session);
		print_r($response);print_r($errors);
		
	*/	
		
?>
<?php

 $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "http://reverse.geocoder.api.here.com/6.2/reversegeocode.json?app_id=510iTbj64l3Q9cPv56Dg&app_code=sECOJD4NX-DfqbYXAX14Ug&gen=9&prox=42.9370842,-75.6107025,100&mode=retrieveAddresses",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_PROXY=>'172.18.65.22:80',
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache"
  ),
));
//curl_setopt($ch, CURLOPT_PROXY, null);
$response = curl_exec($curl);
$err = curl_error($curl);
$respon= curl_getinfo($curl);
curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  //echo $response;
} 
//print_r($response);
print_r(json_decode($response)->Response->View[0]->Result[0]->Location->Address->AdditionalData[0]->value);
//print_r(json_decode($response)->Response->View[0]->Result[0]->Location->->Address->AdditionalData[0]CountryName);
/* 
$url = 'http://geocoder.cit.api.here.com/6.2/geocode.json?app_id=510iTbj64l3Q9cPv56Dg&app_code=sECOJD4NX-DfqbYXAX14Ug&gen=9&country=USA&state=NY&city=new%2520delh';
$proxy = '172.18.65.22:80';
//$proxyauth = 'user:password';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_PROXY, $proxy);
//curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxyauth);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HEADER, 1);


echo $api_response = curl_exec($ch);
		// also get the error and response code
		$errors = curl_error($ch);
		$response = curl_getinfo($ch, CURLINFO_HTTP_CODE);		
		curl_close($ch);
		print_r($response);print_r($errors); */
?>