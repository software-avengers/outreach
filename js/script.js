/**
 * @Authors: Ruslan Bessarab, Patrick Dang, Shawn Potter, Thanh Tran
 */

//set onclick for the Zipcode Check button
let checkZip = document.getElementById("checkZip");
checkZip.onclick = check;

//set onsubmit for contact Form
let form = document.getElementById("contactForm");
form.onsubmit = validate;

//assign hidden class items, address-info items, and the zipcode to variables
let show = document.getElementsByClassName("hidden");
let address = document.getElementsByClassName("address-info");
let zip = document.getElementById("zipcode")

//function for the residence radio buttons
function choose() {
    if (document.getElementById("residence-yes").checked) {
        for(var i = 0; i < show.length; i++){
            show[i].classList.add("d-none");
        }
        zip.classList.remove("d-none");
    }
    else {
        if(document.getElementById("residence-no").checked) {
            for(var i = 0; i < show.length; i++){
                show[i].classList.remove("d-none");
            }
            zip.classList.add("d-none");
            for(var i = 0; i < address.length; i++){
                address[i].classList.add("d-none");
            }
        }
    }
}

//set isValid for true for validation
let isValid = true;

//validate the form
function validate() {
    let radioYes = document.getElementById("residence-yes");
    clearErrors();

    if(radioYes.checked){
        isValid = true;
        //validate
        needsHelp();

        //Validate first name
        validateFirstName();

        //validate last name
        validateLastName();

        //validate email
        checkEmail();

        //Validate address
        validateAddress();

        //Validate city
        validateCity();

        //validate State
        validateState();

        checkEmailOrPhone();

        return isValid;
    } else {
        isValid = true;
        //Validate first name
        validateFirstName();

        //validate last name
        validateLastName();

        //validate email
        checkEmail();

        //validate for either phone or email
        checkEmailOrPhone();

        //checkboxes error message
        needsHelp();

        return isValid;
    }
}

//Make all error messages invisible
function clearErrors() {
    let errors = document.getElementsByClassName("text-danger");
    for(let i = 0; i < errors.length; i++) {
        errors[i].classList.add("d-none");
    }
}

//check box for need helps
function  needsHelp() {
    let needsHelp = document.getElementsByName("needs[]");
    let errNeeds = document.getElementById("err-needsHelp");
    let count = 0;
    for (let i =0; i < needsHelp.length; i++) {
        if(needsHelp[i].checked) {
            count++;
            errNeeds.classList.add("d-none");
        }
    }
    if(count === 0) {
        errNeeds.classList.remove("d-none");
        isValid = false;
    }
}
function otherNeed() {
    let otherNeeds = document.getElementById("otherNeeds");
    if(document.getElementById("others").checked) {
        otherNeeds.classList.remove("d-none");
        isValid = false;
    }
    else {
        otherNeeds.classList.add("d-none");
    }
}

//document.getElementById("reason").addEventListener("click",otherReason);
//Validate first name
function validateFirstName(){
    let first = document.getElementById("fname").value;
    if(first === "") {
        let errFName = document.getElementById("err-fname");
        errFName.classList.remove("d-none");
        isValid = false;
    }
    return isValid;
}

//validate last name
function validateLastName(){
    let last = document.getElementById("lname").value;
    if(last === "") {
        let errLName = document.getElementById("err-lname");
        errLName.classList.remove("d-none");
        isValid = false;
    }
    return isValid;
}

function checkEmail(){
    let email = document.getElementById("email").value
    let pattern = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if( email !== ""){
        if (!(email.toLowerCase().match(pattern))) {
            document.getElementById("err-invalidemail").classList.remove("d-none");
            isValid =  false;
        }
    }
    return isValid;


}

//Validate address
function validateAddress(){
    let address = document.getElementById("address").value;
    if(address === "") {
        let errAddress = document.getElementById("err-address");
        errAddress.classList.remove("d-none");
        isValid = false;
    }
    return isValid;
}

//Validate city
function validateCity(){
    let city = document.getElementById("city").value;
    if(city === "") {
        let errCity = document.getElementById("err-city");
        errCity.classList.remove("d-none");
        isValid = false;
    }
    return isValid;
}

//Validate State
function validateState(){
    let state = document.getElementById("state").value;
    if(state === ""){
        let errState = document.getElementById("err-state");
        errState.classList.remove("d-none");
        isValid=false;
    }
    return isValid;
}
function checkEmailOrPhone(){
    let phone = document.getElementById("phone").value;
    let email = document.getElementById("email").value;

    if(phone === "" && email === ""){
        let errPhone = document.getElementById("err-phone");
        let errEmail = document.getElementById("err-email");
        errPhone.classList.remove("d-none");
        errEmail.classList.remove("d-none");
        isValid=false;
    }
    return isValid;
}

//validating zipcode
function check(){
    clearErrors();
    let isValid = true;
    let zipFormat = new RegExp(/^\d{5}$/);
    let zipInput = document.getElementById("inputZip").value;
    let errZip = document.getElementById("err-zip");
    let zipList = ["98030","98031","98032","98042","98058"];
    let show = document.getElementsByClassName("hidden");

    //test for not 5 digit zipcode
    if ( !zipInput.match(zipFormat)) {

        if (zipInput === "") {
            errZip.innerText = "Enter a zip code";
        }
        else {
            errZip.innerText = "Please enter a valid zip code!";
        }
        errZip.classList.remove("d-none");
        isValid = false;
    }
    //zip code had 5 digit
    else {
        for( let i = 0; i < zipList.length; i++ ) {
            if ( zipInput === zipList[i]) {
                clearErrors();
                for(var x = 0; x < show.length; x++){
                    show[x].classList.remove("d-none");
                }
                for(var x = 0; x < address.length; x++){
                    address[x].classList.remove("d-none");
                }
                if(zipInput === zipList[i]){
                    isValid = true;
                    break;
                }
            } else {
                clearErrors();
                errZip.innerText = "Sorry! Looks like you are outside our service area";
                errZip.classList.remove("d-none");
                isValid = false;
            }
        }
    }
    return isValid;
}
