$(document).ready(() => {
    let leftButton = document.createElement("span");
    leftButton.id = "left";
    leftButton.innerHTML = "<";

    let rightButton = document.createElement("span");
    rightButton.id = "right";
    rightButton.innerHTML = ">";

    let imgCount = 0;
    let imgs = [
        "https://cdn.pixabay.com/photo/2012/10/10/05/04/train-60539_960_720.jpg",
        "https://cdn.pixabay.com/photo/2017/10/27/10/27/subway-2893846_960_720.jpg",
        "https://cdn.pixabay.com/photo/2012/10/25/23/18/train-62849_960_720.jpg"
    ];
    let img = document.createElement("img");
    img.id = "img";
    img.src = imgs[imgCount];
    let pCounter = $("#imgCount");
    console.log(pCounter);
    pCounter.innerHTML = `${imgCount + 1}/${imgs.length}`;

    $('#header').append(leftButton);
    $('#header').append(rightButton);
    $('#header').append(img);

    $('#left').click(() => {
        // show prev image
        imgCount--;
        if(imgCount < 0) {
            imgCount = imgs.length - 1;
        }
        img.src = imgs[imgCount];
        console.log("clicked:", imgCount);
        pCounter.innerHTML = `${imgCount + 1}/${imgs.length}`;
    })

    $('#right').click(() => {
        // show next image
        imgCount++;
        if(imgCount === imgs.length) {
            imgCount = 0;
        }
        img.src = imgs[imgCount];
        console.log("clicked:", imgCount);
        pCounter.innerHTML = `${imgCount + 1}/${imgs.length}`;
    })
    document.getElementById('header_text').innerHTML = "Welcome to MultiNational Railway";
    
})