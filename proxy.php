<?php

$full = $_REQUEST['full'];
$object = (object) [
  "1" => "foo",
  "foo" => "bar"
];
if ($full !== "undefined") {
  echo json_encode($object);
} else {
  echo json_encode((object) null);
}
