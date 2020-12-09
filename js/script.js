const titleEl = document.querySelector('input[name="title"]');
const categoryEl = document.querySelector('select[name="category"]');
const fileEl = document.querySelector('input[name="fileUpload"]');
const priceEl = document.querySelector('input[name="price"]');
const fileBtn = document.querySelector(".btn.upload");
const fileWrapper = document.querySelector(".upload-file-wrapper");
// Error message containers
const errorTitle = document.querySelector(".error-title");
const errorPrice = document.querySelector(".error-price");
const errorCategory = document.querySelector(".error-category");

titleEl.addEventListener("change", titleVal);
categoryEl.addEventListener("change", categoryVal);
fileEl.addEventListener("change", fileVal);
priceEl.addEventListener("change", priceVal);

function priceVal(){
    let value = priceEl.value;

    value = value.replace(",", ".");
    if(value.charAt(0) === "£"){
        value = value.substring(1);
    }

    if(value <= 0 || isNaN(value)){
        value = 0;
    }

    if(value === "" || value < 5){
        priceEl.classList.add("error-border-bottom");
        errorPrice.textContent = "Please provide a minimum fee";
    }else{
        priceEl.classList.remove("error-border-bottom");
        errorPrice.textContent = "";
    }

    value = Math.round(value * 100) / 100;
    priceEl.value = "£"+value.toFixed(2);
}

function titleVal(){
    if((titleEl.value.length < 5) || (titleEl.value.length > 50)){
        titleEl.classList.add("error-border-bottom");
        errorTitle.textContent = "Please provide a name for your quiz";
    }else{
        titleEl.classList.remove("error-border-bottom");
        errorTitle.textContent = "";
    }
}

function categoryVal(){
    if(categoryEl.value === ""){
        categoryEl.classList.add("error-border-bottom");
        errorCategory.textContent = "Please select a category";
    }else{
        categoryEl.classList.remove("error-border-bottom");
        errorCategory.textContent = "";
    }
}

function fileVal(){
    if(fileEl.length < 0){
        fileWrapper.classList.add("error-border");
    }else{
        fileWrapper.classList.remove("error-border");
        fileBtn.textContent = "File choosed!";
    }
}