<?php

interface iImage {
  public function getSrc();
  public function getSize();
}

class ProxyImage implements iImage {

  private $image;

  public function getSrc () {

  }

  public function getSize () {
    echo $this -> image;
  }
}

class FullImage implements iImage {
  public function getSrc () {

  }

  public function getSize () {

  }
}

$full = $_REQUEST['full'];
$object = (object) [
  "1" => "foo",
  "foo" => "bar"
];

$proxyImage = new ProxyImage();
if ($full !== "undefined") {
  echo json_encode($object);
} else {
  echo json_encode((object) $proxyImage -> getSize());
}
