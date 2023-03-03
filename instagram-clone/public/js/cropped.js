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
    cropImg.src = url;
    editImg.src = url;
    shareImg.src = url;

    chooseImage.style.display="none";
    cropBox.style.display="block";

    cropper = new Cropper(cropImg,{
        aspectRatio:0,
        viewMode:3,
        // preview:'.preview',
    });

    document.getElementById('cropBtn').onclick = function(){
        let cropped = cropper.getCroppedCanvas().toDataURL('/instagram-Images/cropped');
        // cropImg.src = cropped;
        document.querySelector('.cropped').value = cropped;
        // console.log(cropped);
        // document.getElementById('output').src = cropped;
        shareImg.src = cropped;
        editImg.src = cropped;
    }
}

document.querySelector('.cropBack').addEventListener('click',function(){
    chooseImage.style.display="block";
    cropBox.style.display="none";
});

document.querySelector('.cropNext').onclick=function(){
    editBox.style.display="block";
    cropBox.style.display="none";
};

document.querySelector('.editBack').onclick=function(){
    editBox.style.display="none";
    cropBox.style.display="block";
};

document.querySelector('.editNext').onclick=function(){
    editBox.style.display="none";
    shareBox.style.display="block";
};

document.querySelector('.shareBack').onclick=function(){
    editBox.style.display="block";
    shareBox.style.display="none";
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


// =========================
function changeImgBox(){
    console.log(this.src)
}
