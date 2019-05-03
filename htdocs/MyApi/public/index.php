<?php

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';

require '../includes/DbOperations.php';

$app = new \Slim\App;

/*
    endpoint: createuser
    parameters : email, password, name, school
    method: POST
*/

$app->post('/createuser', function(Request $request, Response $response){
    if(!haveEmptyParameters(array('email','password','name','school'), $response)){
        $request_data = $request->getParsedBody();

        $email = $request_data['email'];
        $password = $request_data['password'];
        $name = $request_data['name'];
        $school = $request_data['school'];

        $hash_password = password_hash($password, PASSWORD_DEFAULT);

        $db = new DbOperations;
        $result = $db->createUser($email, $hash_password, $name, $school);

        if($result == USER_CREATED) {
            $message = array();
            $message['error'] = false;
            $message['message'] = 'User created Successfully';

            $response->write(json_encode($message));
            return $response
                ->withHeader('Content-type', 'application/json')
                ->withStatus(201);

        } else if($result == USER_FAILURE){

            $message = array();
            $message['error'] = true;
            $message['message'] = 'Some error occured';

            $response->write(json_encode($message));
            return $response
                ->withHeader('Content-type', 'application/json')
                ->withStatus(422);

        } else if($result == USER_EXISTS){
            
            $message = array();
            $message['error'] = false;
            $message['message'] = 'User Already Exists';

            $response->write(json_encode($message));
            return $response
                ->withHeader('Content-type', 'application/json')
                ->withStatus(422);

        }
    }
    return $response
                ->withHeader('Content-type', 'application/json')
                ->withStatus(422);
});

/*
    endpoint: article
    parameters : articleId,articleName,writerId,articleContent
    method: POST
*/

//---------------------------------------------------------------------
$app->post('/article', function(Request $request, Response $response){
    if(!haveEmptyParameters(array('articleId','articleName','writerId','articleContent'), $response)){
        $request_data = $request->getParsedBody();

        $articleId = $request_data['articleId'];
        $articleName = $request_data['articleName'];
        $writerId = $request_data['writerId'];
        $articleContent = $request_data['articleContent'];

        $db = new DbOperations;
        $result = $db->article($articleId, $articleName, $writerId, $articleContent);

        if($result == USER_CREATED) {
            $message = array();
            $message['error'] = false;
            $message['message'] = 'User created Successfully';

            $response->write(json_encode($message));
            return $response
                ->withHeader('Content-type', 'application/json')
                ->withStatus(201);

        } else if($result == USER_FAILURE){

            $message = array();
            $message['error'] = true;
            $message['message'] = 'Some error occured';

            $response->write(json_encode($message));
            return $response
                ->withHeader('Content-type', 'application/json')
                ->withStatus(422);

        } else if($result == USER_EXISTS){
            
            $message = array();
            $message['error'] = false;
            $message['message'] = 'Data Already Exists';

            $response->write(json_encode($message));
            return $response
                ->withHeader('Content-type', 'application/json')
                ->withStatus(422);

        }
    }
    return $response
                ->withHeader('Content-type', 'application/json')
                ->withStatus(422);
});
//---------------------------------------------------------------------

/*
    endpoint: registereduser
    parameters : accountId,password,firstname,lastname,citizenId,birthday,hometown,telephoneNumber,email,contact
    method: POST
*/

//---------------------------------------------------------------------
$app->post('/registereduser', function(Request $request, Response $response){
    if(!haveEmptyParameters(array('accountId','password','firstname','lastname','citizenId','birthday','hometown','telephoneNumber','email','contact'), $response)){
        $request_data = $request->getParsedBody();

        $accountId = $request_data['accountId'];
        $password = $request_data['password'];
        $firstname = $request_data['firstname'];
        $lastname = $request_data['lastname'];
        $citizenId = $request_data['citizenId'];
        $birthday = $request_data['birthday'];
        $hometown = $request_data['hometown'];
        $telephoneNumber = $request_data['telephoneNumber'];
        $email = $request_data['email'];
        $contact = $request_data['contact'];

        $db = new DbOperations;
        $result = $db->registereduser($accountId, $password, $firstname, $lastname, $citizenId, $birthday, $hometown, $telephoneNumber, $email, $contact);

        if($result == USER_CREATED) {
            $message = array();
            $message['error'] = false;
            $message['message'] = 'User created Successfully';

            $response->write(json_encode($message));
            return $response
                ->withHeader('Content-type', 'application/json')
                ->withStatus(201);

        } else if($result == USER_FAILURE){

            $message = array();
            $message['error'] = true;
            $message['message'] = 'Some error occured';

            $response->write(json_encode($message));
            return $response
                ->withHeader('Content-type', 'application/json')
                ->withStatus(422);

        } else if($result == USER_EXISTS){
            
            $message = array();
            $message['error'] = false;
            $message['message'] = 'Data Already Exists';

            $response->write(json_encode($message));
            return $response
                ->withHeader('Content-type', 'application/json')
                ->withStatus(422);

        }
    }
    return $response
                ->withHeader('Content-type', 'application/json')
                ->withStatus(422);
});
//---------------------------------------------------------------------

/*
    endpoint: pharmacist
    parameters : pharmacistId,pharmacistName,pharmacistSurname,pharmacistLicenseId
    method: POST
*/

//---------------------------------------------------------------------
$app->post('/pharmacist', function(Request $request, Response $response){
    if(!haveEmptyParameters(array('pharmacistId','pharmacistName','pharmacistSurname','pharmacistLicenseId'), $response)){
        $request_data = $request->getParsedBody();

        $pharmacistId = $request_data['pharmacistId'];
        $pharmacistName = $request_data['pharmacistName'];
        $pharmacistSurname = $request_data['pharmacistSurname'];
        $pharmacistLicenseId = $request_data['pharmacistLicenseId'];

        $db = new DbOperations;
        $result = $db->pharmacist($pharmacistId, $pharmacistName, $pharmacistSurname, $pharmacistLicenseId);

        if($result == USER_CREATED) {
            $message = array();
            $message['error'] = false;
            $message['message'] = 'User created Successfully';

            $response->write(json_encode($message));
            return $response
                ->withHeader('Content-type', 'application/json')
                ->withStatus(201);

        } else if($result == USER_FAILURE){

            $message = array();
            $message['error'] = true;
            $message['message'] = 'Some error occured';

            $response->write(json_encode($message));
            return $response
                ->withHeader('Content-type', 'application/json')
                ->withStatus(422);

        } else if($result == USER_EXISTS){
            
            $message = array();
            $message['error'] = false;
            $message['message'] = 'Data Already Exists';

            $response->write(json_encode($message));
            return $response
                ->withHeader('Content-type', 'application/json')
                ->withStatus(422);

        }
    }
    return $response
                ->withHeader('Content-type', 'application/json')
                ->withStatus(422);
});
//---------------------------------------------------------------------

/*
    endpoint: drugRecRequest
    parameters : requestId,requesterId,pharamacistId,requestDate
    method: POST
*/

//---------------------------------------------------------------------
$app->post('/drugRecRequest', function(Request $request, Response $response){
    if(!haveEmptyParameters(array('requestId','requesterId','pharamacistId','requestDate'), $response)){
        $request_data = $request->getParsedBody();

        $requestId = $request_data['requestId'];
        $requesterId = $request_data['requesterId'];
        $pharamacistId = $request_data['pharamacistId'];
        $requestDate = $request_data['requestDate'];

        $db = new DbOperations;
        $result = $db->drugRecRequest($requestId, $requesterId, $pharamacistId, $requestDate);

        if($result == USER_CREATED) {
            $message = array();
            $message['error'] = false;
            $message['message'] = 'User created Successfully';

            $response->write(json_encode($message));
            return $response
                ->withHeader('Content-type', 'application/json')
                ->withStatus(201);

        } else if($result == USER_FAILURE){

            $message = array();
            $message['error'] = true;
            $message['message'] = 'Some error occured';

            $response->write(json_encode($message));
            return $response
                ->withHeader('Content-type', 'application/json')
                ->withStatus(422);

        } else if($result == USER_EXISTS){
            
            $message = array();
            $message['error'] = false;
            $message['message'] = 'Data Already Exists';

            $response->write(json_encode($message));
            return $response
                ->withHeader('Content-type', 'application/json')
                ->withStatus(422);

        }
    }
    return $response
                ->withHeader('Content-type', 'application/json')
                ->withStatus(422);
});
//---------------------------------------------------------------------

/*
    endpoint: drugRecommend
    parameters : recommendationId,creatorId,creatorName,receiverId,receiverName,createDate
    method: POST
*/

//---------------------------------------------------------------------
$app->post('/drugRecommend', function(Request $request, Response $response){
    if(!haveEmptyParameters(array('recommendationId','creatorId','creatorName','receiverId','receiverName','createDate'), $response)){
        $request_data = $request->getParsedBody();

        $recommendationId = $request_data['recommendationId'];
        $creatorId = $request_data['creatorId'];
        $creatorName = $request_data['creatorName'];
        $receiverId = $request_data['receiverId'];
        $receiverName = $request_data['receiverName'];
        $createDate = $request_data['createDate'];

        $db = new DbOperations;
        $result = $db->drugRecommend($recommendationId, $creatorId, $creatorName, $receiverId, $receiverName, $createDate);

        if($result == USER_CREATED) {
            $message = array();
            $message['error'] = false;
            $message['message'] = 'User created Successfully';

            $response->write(json_encode($message));
            return $response
                ->withHeader('Content-type', 'application/json')
                ->withStatus(201);

        } else if($result == USER_FAILURE){

            $message = array();
            $message['error'] = true;
            $message['message'] = 'Some error occured';

            $response->write(json_encode($message));
            return $response
                ->withHeader('Content-type', 'application/json')
                ->withStatus(422);

        } else if($result == USER_EXISTS){
            
            $message = array();
            $message['error'] = false;
            $message['message'] = 'Data Already Exists';

            $response->write(json_encode($message));
            return $response
                ->withHeader('Content-type', 'application/json')
                ->withStatus(422);

        }
    }
    return $response
                ->withHeader('Content-type', 'application/json')
                ->withStatus(422);
});
//---------------------------------------------------------------------

/*
    endpoint: question
    parameters : questionId,textMessage,askerAccountId,askerName
    method: POST
*/

//---------------------------------------------------------------------
$app->post('/question', function(Request $request, Response $response){
    if(!haveEmptyParameters(array('questionId','textMessage','askerAccountId','askerName'), $response)){
        $request_data = $request->getParsedBody();

        $questionId = $request_data['questionId'];
        $textMessage = $request_data['textMessage'];
        $askerAccountId = $request_data['askerAccountId'];
        $askerName = $request_data['askerName'];

        $db = new DbOperations;
        $result = $db->question($questionId, $textMessage, $askerAccountId, $askerName);

        if($result == USER_CREATED) {
            $message = array();
            $message['error'] = false;
            $message['message'] = 'User created Successfully';

            $response->write(json_encode($message));
            return $response
                ->withHeader('Content-type', 'application/json')
                ->withStatus(201);

        } else if($result == USER_FAILURE){

            $message = array();
            $message['error'] = true;
            $message['message'] = 'Some error occured';

            $response->write(json_encode($message));
            return $response
                ->withHeader('Content-type', 'application/json')
                ->withStatus(422);

        } else if($result == USER_EXISTS){
            
            $message = array();
            $message['error'] = false;
            $message['message'] = 'Data Already Exists';

            $response->write(json_encode($message));
            return $response
                ->withHeader('Content-type', 'application/json')
                ->withStatus(422);

        }
    }
    return $response
                ->withHeader('Content-type', 'application/json')
                ->withStatus(422);
});
//---------------------------------------------------------------------

/*
    endpoint: answer
    parameters : answerId,textMessage,questionId,answererAccountId,answererName
    method: POST
*/

//---------------------------------------------------------------------
$app->post('/answer', function(Request $request, Response $response){
    if(!haveEmptyParameters(array('answerId','textMessage','questionId','answererAccountId','answererName'), $response)){
        $request_data = $request->getParsedBody();

        $answerId = $request_data['answerId'];
        $textMessage = $request_data['textMessage'];
        $questionId = $request_data['questionId'];
        $answererAccountId = $request_data['answererAccountId'];
        $answererName = $request_data['answererName'];

        $db = new DbOperations;
        $result = $db->answer($answerId, $textMessage, $questionId, $answererAccountId, $answererName);

        if($result == USER_CREATED) {
            $message = array();
            $message['error'] = false;
            $message['message'] = 'User created Successfully';

            $response->write(json_encode($message));
            return $response
                ->withHeader('Content-type', 'application/json')
                ->withStatus(201);

        } else if($result == USER_FAILURE){

            $message = array();
            $message['error'] = true;
            $message['message'] = 'Some error occured';

            $response->write(json_encode($message));
            return $response
                ->withHeader('Content-type', 'application/json')
                ->withStatus(422);

        } else if($result == USER_EXISTS){
            
            $message = array();
            $message['error'] = false;
            $message['message'] = 'Data Already Exists';

            $response->write(json_encode($message));
            return $response
                ->withHeader('Content-type', 'application/json')
                ->withStatus(422);

        }
    }
    return $response
                ->withHeader('Content-type', 'application/json')
                ->withStatus(422);
});
//---------------------------------------------------------------------

/*
    endpoint: drugrequest
    parameters : requestId,topic,attachment
    method: POST
*/

//---------------------------------------------------------------------
$app->post('/drugrequest', function(Request $request, Response $response){
    if(!haveEmptyParameters(array('requestId','topic','attachment'), $response)){
        $request_data = $request->getParsedBody();

        $requestId = $request_data['requestId'];
        $topic = $request_data['topic'];
        $attachment = $request_data['attachment'];

        $db = new DbOperations;
        $result = $db->drugrequest($requestId, $topic, $attachment);

        if($result == USER_CREATED) {
            $message = array();
            $message['error'] = false;
            $message['message'] = 'User created Successfully';

            $response->write(json_encode($message));
            return $response
                ->withHeader('Content-type', 'application/json')
                ->withStatus(201);

        } else if($result == USER_FAILURE){

            $message = array();
            $message['error'] = true;
            $message['message'] = 'Some error occured';

            $response->write(json_encode($message));
            return $response
                ->withHeader('Content-type', 'application/json')
                ->withStatus(422);

        } else if($result == USER_EXISTS){
            
            $message = array();
            $message['error'] = false;
            $message['message'] = 'Data Already Exists';

            $response->write(json_encode($message));
            return $response
                ->withHeader('Content-type', 'application/json')
                ->withStatus(422);

        }
    }
    return $response
                ->withHeader('Content-type', 'application/json')
                ->withStatus(422);
});
//---------------------------------------------------------------------

function haveEmptyParameters($required_params, $response){
    $error = false;
    $error_params = '';
    $request_params = $_REQUEST;        //request param

    foreach($required_params as $param){
        
        if(!isset($request_params[$param]) || strlen($request_params[$param]) <= 0){
            $error = true;
            $error_params .= $param . ',';
        }
    }

    if($error){
        $error_detail = array();
        $error_detail['error'] = true;
        $error_detail['message'] = 'Required parameters'  .  substr($error_params, 0, -2) . "are missing empty";
        $response->write(json_encode($error_detail));
    }

    return $error;
}

$app->run();
