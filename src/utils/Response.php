<?php

namespace src\utils;

class Response {

    private array $resposnseContent = [];

    public function setStatusCode(int $code) {
        http_response_code($code);
    }

    public function setResponseContent($resposnseContent) {
        $this->resposnseContent = $resposnseContent;
    } 

    public function getResponseContent() {
        return $this->resposnseContent;
    }

    public function addSomething($some = []) {
      foreach($some as $key => $value) {
        $this->resposnseContent[$key] = $value;
      }
    }

}