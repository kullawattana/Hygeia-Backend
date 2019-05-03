<?php
    class DbOperations {
        private $con;
        
        function __construct() {
            require_once dirname(__FILE__) . '/DbConnect.php';
            $db = new DbConnect;
            $this->con = $db->connect();
        }

        public function createUser($email, $password, $name, $school) {
            if(!$this->isEmailExist($email)){
                $stmt = $this->con->prepare("INSERT INTO users (email, password, name, school) VALUES (?, ?, ?, ?)");
                $stmt->bind_param("ssss", $email, $password, $name, $school);
                if($stmt->execute()){
                    return USER_CREATED;
                } else {
                    return USER_FAILURE;
                }
                return USER_EXISTS;
            }
        }

        private function isEmailExist($email){
            $stmt = $this->con->prepare("SELECT id FROM users WHERE email = ?");
            $stmt->bind_param("s",$email);
            $stmt->execute();
            $stmt->store_result();
            return $stmt->num_rows > 0;
        }

        public function article($articleId, $articleName, $writerId, $articleContent) {
            $stmt = $this->con->prepare("INSERT INTO Article (articleId, articleName, writerId, articleContent) VALUES (?, ?, ?, ?)");
            $stmt->bind_param($articleId, $articleName, $writerId, $articleContent);
            if($stmt->execute()){
                return USER_CREATED;
            } else {
                return USER_FAILURE;
            }
            return USER_EXISTS;
        }

        public function registereduser($accountId, $password, $firstname, $lastname, $citizenId, $birthday, $hometown, $telephoneNumber, $email, $contact) {
            $stmt = $this->con->prepare("INSERT INTO RegisteredUser (accountId, password, firstname, lastname, citizenId, birthday, hometown, telephoneNumber, email, contact) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param($accountId, $password, $firstname, $lastname, $citizenId, $birthday, $hometown, $telephoneNumber, $email, $contact);
            if($stmt->execute()){
                return USER_CREATED;
            } else {
                return USER_FAILURE;
            }
            return USER_EXISTS;
        }

        public function pharmacist($pharmacistId, $pharmacistName, $pharmacistSurname, $pharmacistLicenseId) {
            $stmt = $this->con->prepare("INSERT INTO Pharmacist (pharmacistId, pharmacistName, pharmacistSurname, pharmacistLicenseId) VALUES (?, ?, ?, ?)");
            $stmt->bind_param($pharmacistId, $pharmacistName, $pharmacistSurname, $pharmacistLicenseId);
            if($stmt->execute()){
                return USER_CREATED;
            } else {
                return USER_FAILURE;
            }
            return USER_EXISTS;
        }

        public function drugRecRequest($requestId, $requesterId, $pharamacistId, $requestDate) {
            $stmt = $this->con->prepare("INSERT INTO DrugRecRequest (requestId, requesterId, pharamacistId, requestDate) VALUES (?, ?, ?, ?)");
            $stmt->bind_param($requestId, $requesterId, $pharamacistId, $requestDate);
            if($stmt->execute()){
                return USER_CREATED;
            } else {
                return USER_FAILURE;
            }
            return USER_EXISTS;
        }

        public function drugRecommend($recommendationId, $creatorId, $creatorName, $receiverId, $receiverName, $createDate) {
            $stmt = $this->con->prepare("INSERT INTO DrugRecommend (recommendationId, creatorId, creatorName, receiverId, receiverName, createDate) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param($recommendationId, $creatorId, $creatorName, $receiverId, $receiverName, $createDate);
            if($stmt->execute()){
                return USER_CREATED;
            } else {
                return USER_FAILURE;
            }
            return USER_EXISTS;
        }

        public function question($questionId, $textMessage, $askerAccountId, $askerName) {
            $stmt = $this->con->prepare("INSERT INTO Question (questionId, textMessage, askerAccountId, askerName) VALUES (?, ?, ?, ?)");
            $stmt->bind_param($questionId, $textMessage, $askerAccountId, $askerName);
            if($stmt->execute()){
                return USER_CREATED;
            } else {
                return USER_FAILURE;
            }
            return USER_EXISTS;
        }

        public function answer($answerId, $textMessage, $questionId, $answererAccountId, $answererName) {
            $stmt = $this->con->prepare("INSERT INTO Answer (answerId, textMessage, questionId, answererAccountId, answererName) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param($answerId, $textMessage, $questionId, $answererAccountId, $answererName);
            if($stmt->execute()){
                return USER_CREATED;
            } else {
                return USER_FAILURE;
            }
            return USER_EXISTS;
        }

        public function drugrequest($requestId, $topic, $attachment) {
            $stmt = $this->con->prepare("INSERT INTO DrugRecRequest (requestId, topic, attachment) VALUES (?, ?, ?)");
            $stmt->bind_param($requestId, $topic, $attachment);
            if($stmt->execute()){
                return USER_CREATED;
            } else {
                return USER_FAILURE;
            }
            return USER_EXISTS;
        }

    }