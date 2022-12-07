<?php
    ##################################################################################################
    #Função de API Geografica por IP
	##################################################################################################
    #Pegando localização e dados do usuario para armazenar em log
    $ip_addr = $_SERVER['REMOTE_ADDR'];
    $url = "http://ip-api.com/json/$ip_addr?fields=258047&lang=pt-BR";
    
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
    $resultado = json_decode(curl_exec($ch));
    $status = $resultado->status;

    #Caso a API de IPGeo não funcione
    if($status == "fail"){
        $pais = "Não localizado";
        $regiao = "Não localizado";
        $cidade = "Não localizado";
        $lat = "Não localizado";
        $long = "Não localizado";
        $isp = "Não localizado";
        $org = "Não localizado";
        $inst = "Não localizado";
        $nivel_log_registro = "warning";
    }else{
        $pais = $resultado->country;
        $regiao = $resultado->regionName;
        $cidade = $resultado->city;
        $lat = $resultado->lat;
        $long = $resultado->lon;
        $isp = $resultado->isp;
        $org = $resultado->org;
        $inst = $resultado->as;
        $nivel_log_registro = "info";
    }
	##################################################################################################
?>