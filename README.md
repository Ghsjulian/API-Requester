<center>
<h1>Javascript API Requester</h1>
<h2 style="color:red">Developer -<span style="color:rgb(30,255,239)"> Ghs Julian</span></h2>
</center>

---

---

<p>

**Hello, This file has created how you can send client request to the server without installing axios or other packages, it will work same like axios . It has created using javascript fetch API.**

---

</p>
<br>
<h2>Read Documention : </h2>
<p>

---

**Read this documents before working with this file. This example has created for vanilla javascript. You can also use it in your react application. It will work same as axios. It's simple to use let's see how you can use this file in your project to handle your client request between the server.**

</p><br><br>

<h3>Note : </h3>
<p>

---

**If you use or import this file in your another file like , if you have an example.js file. Then see this example .**

**File Name : example.js**

```javascript
import __api__ from "./Requester.js";

/*  Your Code Goes Hhere...    */
```

<br>

**Use this script in your html file**

**File Name : index.html**

```html
<script type="module" src="./example.js"></script>
```

</p>

<h3>POST Request : </h3>
<p>

---

**To use POST Request or if you want to send data to the server you can follow this step.**

</p>

```javascript
import __api__ from "./Requester.js";

let url = "http://localhost:8080/post-request";
const obj = {
    user_name: "Ghs Julian",
    user_email: "ghsjulian@gmail.com"
};
__api__.postData(url, obj, res) => {
    console.log(res);
});
```

<br>

<h3>GET Request : </h3>
<p>

---

**Get data from the server you need to use this code in your project. Just copy this code and paste it in your working file where you want to use this action.**

</p>

```javascript
import __api__ from "./Requester.js";

let url = "http://localhost:8080/get-request/product_id=${id}";
__api__.getData(url, res) => {
console.log(res);
});

```

<br>

<h3>GET Image Data : </h3>
<p>

---

**You can get base64 string from an image source easily, to use this feature you have to follow this code. It will return a base64 string.**

</p>

```javascript
import __api__ from "./Requester.js";

const img = document.getElementById("face-img");
const imgSrc = img.src;
__api__.getImgData((imgSrc, imgData) => {
    console.log(imgData);
});
```

<br>

<h3>Preview Image : </h3>
<p>

---

**If you want to preview image in your html like supposed you have a project and you want to add an image uploading system there. Now you want that when the user select an image from their system it will display first in the HTML document. So let's see how you can do it...**

</p>

```javascript
import __api__ from "./Requester.js";

const uploads = document.getElementById("img-input-field");
const preview = document.getElementById("face-img");
uploads.onchange = e => {
    const file = e.target;
    __api__.previewImage(file, preview);
};
```

<h3>Send Image To Server : </h3>
<p>

---

**If you want to send image and some data to the server. You can follow this code. So let's see how you can do it...**

</p>

```javascript
import __api__ from "./Requester.js";

const uploads = document.getElementById("img-input-field");
const preview = document.getElementById("face-img");
const imgSrc = preview.src;

uploads.onchange = e => {
    const file = e.target;
    __api__.previewImage(file, preview);
    __api__.getImgData((imgSrc, imgData) => {
        const url = "/add-data.php";
        const obj = {
            user_name: "Ghs Julian",
            user_email: "ghsjulian@gmail.com",
            image: imgData
        };
        __api__.postData((url, obj, res) => {
            console.log(res.status);
        });
    });
};
```

<br>
<h2>Save This Image : </h2>
<p>

---

**You can save or accept this image using PHP in the backend server or you can use this code, let's see...**

```php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
header("Access-Control-Allow-Headers: Content-Type,
Access-Control-Allow-Headers, Authorization, X-Requested-With");

$data = json_decode(file_get_contents("php://input"), true);
$image = $data["image"];
$img_name = "something_name.jpg";

function save_image($image, $img_name){
  $imageData = base64_decode(preg_replace("#^data:image/\w+;base64,#i", "", $image));
  $path = "../images/";
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

if(save_image($image, $img_name)){
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

```

---

---

</p>
<center>
 <h2>Thank You ❤️🙏</h2>
</center>
