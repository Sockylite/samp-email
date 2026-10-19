<?php
if (isset($_POST['email']) && isset($_POST['code'])) {
    $recipientEmail = $_POST['email'];
    $code = $_POST['code'];

    $apiKey = 'xsmtpsib-d4848ab7b7568ffd59c36054f5758110a26c27b57d3e4bf782f1cfe614138c85-Hz8to1c2SagoSDki';
    $url = 'https://api.brevo.com/v3/smtp/email';

    $data = array(
        'sender' => array('name' => 'Servidor SAMP', 'email' => 'sockylite@hotmail.com'),
        'to' => array(array('email' => $recipientEmail)),
        'subject' => 'Codigo de Verificacao',
        'htmlContent' => '<p>Seu codigo de confirmacao e: <b>' . $code . '</b></p>'
    );

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'accept: application/json',
        'api-key: ' . $apiKey,
        'content-type: application/json'
    ));

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    echo "Status: " . $httpCode;
}
?>
