<?php

function Encrypt($data, $key) {
    $result = '';
    for ($i = 0; $i < strlen($data); $i++) {
        $result .= chr(ord($data[$i]) ^ $key);
    }
    return base64_encode($result); 
}

function Decrypt($data, $key) {
    $data = base64_decode($data); 
    $result = '';
    for ($i = 0; $i < strlen($data); $i++) {
        $result .= chr(ord($data[$i]) ^ $key);
    }
    return $result;
}

?>