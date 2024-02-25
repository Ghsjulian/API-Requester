import __api__ from "./Requester.js";

const uploads = document.getElementById("image_uploads");
const img = document.getElementById("face-img");
const imgSrc = img.src;

__api__.getImgData(imgSrc, imgData => {
    const url = "http://localhost:8003/save-img.php";
    const data = {
        name: "Ghs Julian",
        email: "ghsjulian@gmail.com",
        image: imgData
    };
    __api__.postData(url, data, res => {
        console.log(res);
    });
});
