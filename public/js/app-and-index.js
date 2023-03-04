var createBtn = document.querySelector('.create');
var creationBox = document.querySelector('.creation');
var cancel = document.querySelector('.creation .cancel');

var chooseImage = document.querySelector('.creation .chooseImage');
var cropBox = document.querySelector('.creation .crop');
var editBox = document.querySelector('.creation .edit');
var shareBox = document.querySelector('.creation .share');


createBtn.onmousehover = function(){creationBox.style.display = "block";}

createBtn.onclick = function(){
    creationBox.style.display = "flex";
    chooseImage.style.display = "block";
    shareBox.style.display="none";
}

cancel.onclick = function(){
    creationBox.style.display = "none";
}

// ___________________ upload img_post
let img = document.querySelector('#img_Post');

var $modal = cropBox;
var cropImg = document.getElementById('imgCrop');
var editImg = document.getElementById('editImg');
var shareImg = document.getElementById('shareImg');
var cropper;

let fileUpload = function(event){
    let url = URL.createObjectURL(event.target.files[0]);
//     cropImg.src = url;
//     editImg.src = url;
//     shareImg.src = url;

console.log(url)
    chooseImage.style.display="none";
//     // cropBox.style.display="block";
    shareBox.style.display="block";

    let imgContainer = document.querySelector('.img-prev');
    let fileInput = document.querySelector('#img_post');
    imgContainer.innerHTML = "";
    let noOfFiles = `${fileInput.files.length} File Uploaded`;
    for(i of fileInput.files){
        let reader = new FileReader();
        let imgSlide = document.createElement("div");
        imgSlide.className = "img-slide";
        reader.onload = ()=>{
            let imgChoosen = document.createElement("img");
            imgChoosen.setAttribute("src",reader.result);
            imgSlide.appendChild(imgChoosen);
        }
        imgContainer.appendChild(imgSlide);
        reader.readAsDataURL(i);
    }

    let AllimagSlide = document.querySelectorAll(".img-slide");
    AllimagSlide.forEach(ele=>{
        ele.classList.remove('active');
        let firstImg = document.querySelector('.choosen-img');
        ele.onclick = (e)=>{
            console.log(e.target)
            firstImg.style.display = "block";
            firstImg.src = e.target.src
            ele.classList.add('activeImg');
        }
    })

//     cropper = new Cropper(cropImg,{
//         aspectRatio:0,
//         viewMode:3,
//         // preview:'.preview',
//     });

//     document.getElementById('cropBtn').onclick = function(){
//         let cropped = cropper.getCroppedCanvas().toDataURL('/instagram-Images/cropped');
//         // cropImg.src = cropped;
//         document.querySelector('.cropped').value = cropped;
//         // console.log(cropped);
//         // document.getElementById('output').src = cropped;
//         shareImg.src = cropped;
//         editImg.src = cropped;
//     }
}

// document.querySelector('.cropBack').addEventListener('click',function(){
//     chooseImage.style.display="block";
//     cropBox.style.display="none";
// });

// document.querySelector('.cropNext').onclick=function(){
//     editBox.style.display="block";
//     cropBox.style.display="none";
// };

// document.querySelector('.editBack').onclick=function(){
//     editBox.style.display="none";
//     cropBox.style.display="block";
// };

// document.querySelector('.editNext').onclick=function(){
//     editBox.style.display="none";
//     shareBox.style.display="block";
// };

document.querySelector('.shareBack').onclick=function(){
    // editBox.style.display="block";
    shareBox.style.display="none";
    chooseImage.style.display="block";
};


//  ================= textarea
let contentText = document.querySelector('#contentText');
let lettersCounter = document.querySelector('#counter');
let reviewLimit = 200;

lettersCounter.textContent = 0 + "/" + reviewLimit;

contentText.addEventListener('input',()=>{
    let reviewLength = contentText.value.length;
    lettersCounter.textContent = reviewLength + '/' + reviewLimit;

    if(reviewLength == reviewLimit){
        lettersCounter.style.color = "#E09145";
    }
});
