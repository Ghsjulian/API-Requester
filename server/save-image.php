<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
header("Access-Control-Allow-Headers: Content-Type,
Access-Control-Allow-Headers, Authorization, X-Requested-With");

$data = json_decode(file_get_contents("php://input"), true);
$image = $data["image"];
$img_name = "something_name.jpg";

function save_image($image, $img_name)
{
  $imageData = base64_decode(
    preg_replace("#^data:image/\w+;base64,#i", "", $image)
  );
  $path = "./images/";
  try {
    if (file_put_contents($path . $img_name, $imageData)) {
      return true;
    } else {
      return false;
    }
  } catch (Exception $e) {
    return $e;
  }
}

if (save_image($image, $img_name)) {
  echo json_encode([
    "status" => "success",
    "message" => "Image Uploaded Successfully",
  ]);
} else {
  echo json_encode([
    "status" => "Failed",
    "message" => "Image Uploaded Failed",
  ]);
}

?>
