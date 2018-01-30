<?php
class Form{
	
	private $name;
    private $email;
    private $message;

    function __construct(string $userName, string $userEmail, string $userMessage){
		if(isset($userName) && isset($userEmail) && isset($userMessage)){
			$this->name = filter_input(INPUT_POST, 'userName');
			$this->email = filter_input(INPUT_POST, 'userEmail');
			$this->message = filter_input(INPUT_POST, 'userMessage');
		}
    }
	
	public function getName(){
		return $this->name;
	}
	
	public function getEmail(){
		return $this->email;
	}
	
	public function getMessage(){
		return $this->message;
	}
	
	// This function sends an email
	public function sendEmail(){
		if(isset($_POST['submit'])){
		    try{
				$msg = $this->getName()." sent you the following message:\n\n".$this->getMessage()."\n\n";
				
				// Please, enter your email address here
				if(mail("kirovav@bia-bg.com", "Contact Form", $msg, "From: ".$this->getEmail()."\r\nReply-to: ".$this->getEmail()."\r\nContent-Type: text/plain; charset=utf-8\r\n")){
					echo "<div class=\"alert alert-success\"> Your message was sent successfully!</div>";
				} else {
					echo "<div class=\"alert alert-danger\"> Error occured! </div>";
				}
			} catch(Exception $e) {
				$error = $e->getMessage();
			}
		}
	}
}

$data = new Form($_POST['userName'],$_POST['userEmail'],$_POST['userMessage']);

$data->sendEmail();


