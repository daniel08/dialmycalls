<?php
require_once __DIR__ . '/vendor/autoload.php';

// Configure API key authorization: api_key
DialMyCalls\Configuration::getDefaultConfiguration()->setApiKey('X-Auth-ApiKey', '98790f4f249be9ae24043fd9b82cb5c8');

$api_instance = new \DialMyCalls\Api\Contacts();

if( isset($_POST['addContact']) ){
    
    $createContactParameters = new \DialMyCalls\Models\CreateContactParameters(); // \DialMyCalls\Models\CreateContactParameters | Request body
    
    $createContactParameters->setFirstname(cleanRequired('fname'));
    $createContactParameters->setLastname(cleanRequired('lname'));
    $createContactParameters->setPhone(cleanPhone('phone'));
    $createContactParameters->setEmail(cleanEmail('email'));

    try {
        $result = $api_instance->createContact($createContactParameters);
        header('Content-Type: application/json');
        echo json_encode($result);
        exit();
    } catch (Exception $e) {
        echo 'Exception when calling Contacts->createContact: ', $e->getMessage(), PHP_EOL;
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
        return '';
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
            return '';
        }
    }else{
        return '';
    }
}

function cleanPhone($key){
    if( $value = cleanRequired($key) ){
        $clean = preg_replace('/[^0-9]/', '', trim($value));
        if( preg_match('/[0-9]{10}/', $clean) ){
            return $clean;
        }
        else{
            return '';
        }
    }else{
        return '';
    }
}

