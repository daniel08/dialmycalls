<?php
require_once __DIR__ . '/vendor/autoload.php';

// Configure API key authorization: api_key
DialMyCalls\Configuration::getDefaultConfiguration()->setApiKey('X-Auth-ApiKey', '98790f4f249be9ae24043fd9b82cb5c8');

$api_instance = new \DialMyCalls\Api\Contacts();

if( isset($_POST['addContact']) ){
    
    $createContactParameters = new \DialMyCalls\Models\CreateContactParameters(); // \DialMyCalls\Models\CreateContactParameters | Request body

    

    try {
        $createContactParameters->setFirstname(cleanRequired('firstname'));
        $createContactParameters->setLastname(cleanRequired('lastname'));
        $createContactParameters->setPhone(cleanPhone('phone'));
        $createContactParameters->setEmail(cleanEmail('email'));
        
        $result = $api_instance->createContact($createContactParameters);
        header('Content-Type: application/json');
        echo json_encode($result);
        exit();
    }
    catch (Exception $e) {
        $response = ['status' => 'error', 'msg' => ''];
        if( $e instanceof DialMyCalls\ApiException){
            $response['msg'] = 'An error occured: '. $e->getResponseBody()->results->error->message. PHP_EOL;
        }else{
            $response['msg'] = 'An error occured: '. $e->getMessage(). PHP_EOL;
        }
        header('Content-Type: application/json');
        echo json_encode($response);
        exit();
    }

   
}

if( isset($_GET['getContacts']) ){
    try {
        $result = $api_instance->getContacts();
        header('Content-Type: application/json');
        echo json_encode($result);
        exit();
    } catch (Exception $e) {
        echo 'Exception when calling Contacts->getContacts: ', $e->getMessage(), PHP_EOL;
    }
}

function cleanRequired($key){
    if( empty($_POST[$key]) OR $_POST[$key] == '' ){
        throw new Exception("Field $key is required.");
    }else{
        return $_POST[$key];
    }
}

function cleanEmail($key){
    $reg = '/.+@.+\..+/i'; //simple email regex
    if( $value = cleanRequired($key) ){
        if( preg_match($reg, trim($value)) ){
            return trim($value);
        }
        else{
            throw new Exception("$value is not a valid email.");
            return false;
        }
    }else{
        return false;
    }
}

function cleanPhone($key){
    if( $value = cleanRequired($key) ){
        $clean = preg_replace('/[^0-9]/', '', trim($value));
        if( preg_match('/[0-9]{10}/', $clean) ){
            return $clean;
        }
        else{
            throw new Exception("$value is not a valid phone number.");
            return false;
        }
    }else{
        return false;
    }
}

