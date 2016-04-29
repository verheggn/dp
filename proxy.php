<?php

interface iImage {
  public function getSrc();
  public function getSize();
}

class FullImage implements iImage {
  private $src = array("src" => "http://ecx.images-amazon.com/images/I/81gtKoapHFL.jpg");
  private $size = array("size" => ["x" => 1352, "y" => 1701] );

  public function getSrc () {
    return $this -> src;
  }

  public function getSize () {
    return $this -> size;
  }
}

class ProxyImage implements iImage {

  private $image;

  public function getSrc () {
    if (!$this -> image) {
      $this -> image = new FullImage ();
    }
    return $this -> image -> getSrc();
  }

  public function getSize () {
    if (!$this -> image) {
      $this -> image = new FullImage ();
    }
    return $this -> image -> getSize();
  }
}

$full = $_REQUEST['full'];

$proxyImage = new ProxyImage();
if ($full && $full !== "undefined") {
  echo json_encode((object) $proxyImage -> getSrc());
} else {
  echo json_encode((object) $proxyImage -> getSize());
}
