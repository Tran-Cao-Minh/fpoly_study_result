// CHUC NANG SLIDE SHOW CHO TRANG DAU - .HEADING-PAGE
let headingIndex = 1; // khoi tao index de xac dinh vi tri anh
let headingImgArr = []; // lay mang hinh anh
if (window.matchMedia('(max-width: 1024px)').matches) {
    headingImgArr[1] = './images/slide_heading_page/mobile (1).png'; // MOBILE
    document.querySelector('.heading-page img')
            .setAttribute('src', './images/slide_heading_page/mobile (1).png');
} else {
    headingImgArr[1] = './images/slide_heading_page/pc (1).png'; // PC
    document.querySelector('.heading-page img')
            .setAttribute('src', './images/slide_heading_page/pc (1).png');
}
for (let i = 2; i <= 3; i++) {
    headingImgArr[i] = './images/slide_heading_page/common (' + i + ').png';
}
// neu do rong thiet bi co thay doi thi cung thay doi mang
window.addEventListener('resize', function () {
    if (window.matchMedia('(max-width: 1024px)').matches) {
        headingImgArr[1] = './images/slide_heading_page/mobile (1).png'; // MOBILE
        document.querySelector('.heading-page img')
                .setAttribute('src', './images/slide_heading_page/mobile (1).png');
    } else {
        headingImgArr[1] = './images/slide_heading_page/pc (1).png'; // PC
        document.querySelector('.heading-page img')
                .setAttribute('src', './images/slide_heading_page/pc (1).png');
    }
})

// tao ham thay doi hinh anh
function changeHeadingImg() {
    // doi hinh anh
    document.querySelector('.heading-page img').setAttribute('src', headingImgArr[headingIndex]);
    document.querySelector('.heading-page img').classList.add('change-img');
    // tranh nguoi dung co tinh nhan lien tuc
    document.querySelector('.heading-page .prev').disabled = true;
    document.querySelector('.heading-page .next').disabled = true;
    // thay doi vi tri dau cham
    for (let i = 0; i < headingIndexDotArr.length; i++) {
        headingIndexDotArr[i].classList.remove('choosen');
    }
    headingIndexDotArr[(headingIndex - 1)].classList.add('choosen');
    // sau 1s se co hieu ung tiep
    setTimeout(function () {
        document.querySelector('.heading-page img').classList.remove('change-img');
        document.querySelector('.heading-page .prev').disabled = false;
        document.querySelector('.heading-page .next').disabled = false;
    }, 1000);
}

// them su kien cho nut next
document.querySelector('.heading-page .next').addEventListener('click', function () {
    headingIndex++;
    if (headingIndex > 3) {
        headingIndex = 1;
    }
    changeHeadingImg();
});

// them su kien cho nut prev
document.querySelector('.heading-page .prev').addEventListener('click', function () {
    headingIndex--;
    if (headingIndex < 1) {
        headingIndex = 3;
    }
    changeHeadingImg();
});

// them su kien cho cac dau cham
let headingIndexDotArr = document.querySelectorAll('.heading-page .index-dot');
for (let i = 0; i < headingIndexDotArr.length; i++) {
    headingIndexDotArr[i].addEventListener('click', function () {
        headingIndex = (i + 1);
        changeHeadingImg();
    })
}

// tu dong chuyen slide 
var autoSwitchHeading = setInterval(function () {
    document.querySelector('.heading-page .next').click();
}, 7000);
// END CHUC NANG SLIDE SHOW CHO TRANG DAU - .HEADING-PAGE



// CHUC NANG SLIDE SHOW CHO TOP-COMMENT
let commentIndex = 1; // xac dinh comment hien tai
// lay phan tu xac dinh vi tri comment vao mang
let commentDotIndex = document.querySelectorAll('.top-comment .index-dot'); // lay mang cac dau cham index
let commentArr = document.querySelectorAll('.top-comment .comment-slide'); // lay comment vao mang

// cho slide dau tien hien thi
document.querySelector(`.top-comment .comment-slide.s1`)
    .style.left = 0;
// an cac slide con lai
for(let i = 2; i <= commentArr.length; i++){
    document.querySelector(`.top-comment .comment-slide.s${i}`)
        .style.left = '100%';
}

// ham hien thi vi tri anh qua index-dot
function commentIndexChange(){
    for(let i = 0; i < commentDotIndex.length; i++){
        if(i == (commentIndex - 1)){
            commentDotIndex[i].classList.add('choosen');
        } else {
            commentDotIndex[i].classList.remove('choosen');
        }
    }
}

// them, xu ly su kien chuyen toi slide tiep theo
document.querySelector('.top-comment .next').addEventListener('click', function () {
        // xu ly nextIndex theo do dai mang commentArr
        let nextCommentIndex = commentIndex + 1;
        if (nextCommentIndex > commentArr.length) {
            nextCommentIndex = 1;
        }
        // * nth:child chay bat dau tu 1 
        // xu ly hieu ung khi chuyen slide
        let nextSlide = document.querySelector(`.top-comment .comment-slide.s${nextCommentIndex}`);
        nextSlide.style.cssText = `
            left: 100%;
            z-index: 0;
            animation: moveSlideIn 2s forwards;
        `; 
        let curSlide = document.querySelector(`.top-comment .comment-slide.s${commentIndex}`);
        curSlide.style.cssText = `
            left: 0%;
            z-index: 0;
            animation: moveSlideOutLeft 2s forwards;
        `;  
        commentIndex = nextCommentIndex;
        // hien thi vi tri slide
        commentIndexChange();
});

// them, xu ly su kien quay lai slide phia truoc
document.querySelector('.top-comment .prev').addEventListener('click', function () {
        // xu ly prevIndex theo do dai mang commentArr
        let prevCommentIndex = commentIndex - 1;
        if (prevCommentIndex < 1) {
            prevCommentIndex = commentArr.length;
        }
        // * nth:child chay bat dau tu 1 
        // xu ly hieu ung khi chuyen slide
        let prevSlide = document.querySelector(`.top-comment .comment-slide.s${prevCommentIndex}`);
        prevSlide.style.cssText = `
            left: -100%;
            animation: moveSlideIn 2s forwards;
        `; 
        let curSlide = document.querySelector(`.top-comment .comment-slide.s${commentIndex}`);
        curSlide.style.cssText = `
            left: 0%;
            animation: moveSlideOutRight 2s forwards;
        `;  
        commentIndex = prevCommentIndex;
        // hien thi vi tri slide
        commentIndexChange();
});

// them su kien khi nhan vao index-dot se chuyen toi slide tuong ung
for(let i = 0; i < commentDotIndex.length; i++){
    commentDotIndex[i].addEventListener('click', function(){
        while (commentIndex != (i + 1)) {
            if (commentIndex < (i + 1)) {
                document.querySelector(".top-comment .next").click();
            } else if (commentIndex > (i + 1)){
                document.querySelector(".top-comment .prev").click();
            }
        }
        // neu i+1 = commentIndex thi khong chuyen anh
    })
}
// END CHUC NANG SLIDE SHOW CHO TOP-COMMENT

// CHUC NANG SCROLL LEN DAU TRANG QUA BTN
window.addEventListener("scroll", function () {
    if (this.scrollY >= this.innerHeight) {
        document.querySelector("#to-top").style.display = "block";
    } else {
        document.querySelector("#to-top").style.display = "none";
    }
});
document.getElementById("to-top").addEventListener("click", function () {
    window.scrollTo({
        top: 0,
        left: 0,
        behavior: "smooth"
    });
    document.getElementById("ad").style.display = "block";
});
document.getElementById("ad").addEventListener("click", function () {
    this.style.display = "none";
});
// END CHUC NANG SCROLL LEN DAU TRANG QUA BTN