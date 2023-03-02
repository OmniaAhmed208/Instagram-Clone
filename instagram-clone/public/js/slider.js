let arrImg = document.querySelectorAll('.slider-container img');
let sliderNum = document.querySelector('.slider-num');
let prevBtn = document.querySelector('.prev');
let nextBtn = document.querySelector('.next');

let imgCount = arrImg.length;

let currentSlide = 1;

nextBtn.onclick = nextFun;
prevBtn.onclick = prevFun;

let ul = document.createElement('ul');
ul.className = 'ul';
let ulElement = document.querySelector('.ul');

for(let i=1 ; i<= imgCount; i++){

    let li = document.createElement('li');
    li.setAttribute('data-index', i);
    li.appendChild(document.createTextNode(i))

    ul.appendChild(li);
}

document.querySelector('.indicator').appendChild(ul);

let arrLi = Array.from(document.querySelectorAll('.ul li'));

for(let i=0; i<arrLi.length; i++){

    arrLi[i].onclick = function(){

        currentSlide = arrLi[i].getAttribute('data-index');

        checker();
    }
}

checker();

function checker(){
    sliderNum.textContent = `${currentSlide} / ${imgCount}`;

    removeActive();

    arrImg[currentSlide-1].classList.add('active');

    arrLi[currentSlide-1].classList.add('active');
    // ulElement.childNodes[currentSlide-1].classList.add('active');

    if(currentSlide == 1){
        prevBtn.classList.add('disabled');
    } else{
        prevBtn.classList.remove('disabled')
    }

    if(currentSlide == imgCount){
        nextBtn.classList.add('disabled');
    } else{
        nextBtn.classList.remove('disabled')
    }

}

function removeActive(){
    arrImg.forEach((ele)=>{
        ele.classList.remove('active');
    });

    arrLi.forEach((ele)=>{
        ele.classList.remove('active');
    })
}

function nextFun(){
    if(nextBtn.classList.contains('disabled')){
        return false
    } else{
        currentSlide++;

        checker();
    }
}

function prevFun(){
    if(prevBtn.classList.contains('disabled')){
        return false
    } else{
        currentSlide--;

        checker();
    }
}
