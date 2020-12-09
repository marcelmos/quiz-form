const titleEl = document.querySelector('input[name="title"]');
const categoryEl = document.querySelector('select[name="category"]');
const fileEl = document.querySelector('input[name="fileUpload"]');
const priceEl = document.querySelector('input[name="price"]');
const fileBtn = document.querySelector(".btn.upload");
// Error message containers
const errorTitle = document.querySelector(".error-title");
const errorPrice = document.querySelector(".error-price");
const errorCategory = document.querySelector(".error-category");

// Add Listeners to inputs
titleEl.addEventListener("change", titleVal);
categoryEl.addEventListener("change", categoryVal);
fileEl.addEventListener("change", fileVal);
priceEl.addEventListener("change", priceVal);

// Price Validation
function priceVal(){
    let value = priceEl.value;

    // Replace/Cut string character
    value = value.replace(",", ".");
    if(value.charAt(0) === "£"){
        value = value.substring(1);
    }

    // Convert string or negative number
    if(value <= 0 || isNaN(value)){
        value = 0;
    }

    if(value === "" || value < 5){
        priceEl.style.borderBottomColor = "#FA4043";
        errorPrice.textContent = "Please provide a minimum fee";
    }else{
        priceEl.style.borderBottomColor = "#CECFEE";
        errorPrice.textContent = "";
    }

    value = Math.round(value * 100) / 100;
    priceEl.value = "£"+value.toFixed(2);
    console.log(value);
}

// Title Validation
function titleVal(){
    if((titleEl.value.length < 5) || (titleEl.value.length > 50)){
        titleEl.style.borderBottomColor = "#FA4043";
        errorTitle.textContent = "Please provide a name for your quiz";
    }else{
        titleEl.style.borderBottomColor = "#CECFEE";
        errorTitle.textContent = "";
    }
}

// Category Validation
function categoryVal(){
    if(categoryEl.value === ""){
        categoryEl.style.borderBottomColor = "#FA4043";
        errorCategory.textContent = "Please select a category";
    }else{
        categoryEl.style.borderBottomColor = "#CECFEE";
        errorCategory.textContent = "";
    }
}

// File Upload Validation
function fileVal(){
    if(fileEl.length < 0){
        document.querySelector(".upload-file-wrapper").style.border = "solid 2px #FA4043";
    }else{
        document.querySelector(".upload-file-wrapper").style.border = "none";
        fileBtn.textContent = "File choosed!";
    }
}