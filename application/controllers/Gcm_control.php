<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gcm_control extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        // simple loading
        // note: you have to specify API key in config before
        $this->load->library('gcm');
    } 

    public function send()
    {

        $url = 'https://fcm.googleapis.com/fcm/send';

        $fields = array (
            'registration_ids' => array (
                "1"
                ),
            'data' => array (
                "message" => "Test"
                )
            );
        $fields = json_encode ( $fields );

        $headers = array (
            'Authorization: key=' . "AIzaSyBzeD2UPg4CsEEPgZZa-ferJ7iC5_lvZXw",
            'Content-Type: application/json'
            );

        $ch = curl_init ();
        curl_setopt ( $ch, CURLOPT_URL, $url );
        curl_setopt ( $ch, CURLOPT_POST, true );
        curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers );
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
        curl_setopt ( $ch, CURLOPT_POSTFIELDS, $fields );

        $result = curl_exec ( $ch );
        echo $result;
        curl_close ( $ch );
    }

    // controller
    public function send_gcm()
    {

        // simple adding message. You can also add message in the data,
        // but if you specified it with setMesage() already
        // then setMessage's messages will have bigger priority
        $this->gcm->setMessage('Test message '.date('d.m.Y H:s:i'));

        // add recepient or few
        // $this->gcm->addRecepient('539268942200');
        $this->gcm->addRecepient('539268942200');

        // set additional data
        $this->gcm->setData(array(
            'some_key' => 'some_val'
            ));

        // also you can add time to live
        $this->gcm->setTtl(500);
        // and unset in further
        $this->gcm->setTtl(false);

        // set group for messages if needed
        $this->gcm->setGroup('Test');
        // or set to default
        $this->gcm->setGroup(false);

        // then send
        if ($this->gcm->send())
            echo 'Success for all messages';
        else
            echo 'Some messages have errors';

        // and see responses for more info
        print_r($this->gcm->status);
        print_r($this->gcm->messagesStatuses);

        die(' Worked.');
    }
}