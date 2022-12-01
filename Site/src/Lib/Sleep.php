<?php

class Sleep extends Thread {

    private int $time;

    public function __construct($time) {
        $this->time = $time;
      }
      
    public function run(){
        sleep($this->time);
        echo "Thread is done";
    }


}

?>