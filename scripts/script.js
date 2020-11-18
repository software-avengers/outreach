/**
 * @Authors: Ruslan Bessarab, Patrick Dang, Shawn Potter, Thanh Tran
 * TODO: 1. Complete Event Listener for Place of Residence needs to remove address fieldset
 *       2. Create a function that requires Email OR phone number (either or both)
 */

// Is currently forcing the navbar-collapse div to close on click because Bootstrap refuses to fully cooperate
// collapse animation is playing on the links themselves instead of just the menu div
$('.navbar-nav>li>a').on('click', function(){
    $('.navbar-collapse').collapse('hide');
});

//set onclick for the Zipcode Check button
let zip = document.getElementById("checkZip");
zip.onclick = check;

//set onsubmit for contact Form
let form = document.getElementById("contactForm");
form.onsubmit = validate;

//disable form via javascript for the front-end
//time const
const TIME = new Date;

let formDiv = document.getElementById("formDiv");
let hoursNotice= document.getElementById("outsideHours");

// Only comment out the if statement if you need to see the form
/*
if( !(TIME.getHours() < 13 && TIME.getHours() > 16 && TIME.getDay() == 1) ||
    !(TIME.getHours() < 13 && TIME.getHours() > 16 && TIME.getDay() == 3) ||
    !(TIME.getHours() < 9 && TIME.getHours() > 12 && TIME.getDay() == 2)
    ){
    //add d-none class to the form to make it disappear.
    formDiv.classList.add("d-none");
    hoursNotice.classList.remove("d-none");
}
*/


let show = document.getElementById("hidden");
function choose() {
    let  zip = document.getElementById("zipcode");
    let address = document.getElementById("address info");
    //let hidden = document.getElementById("hidden")
    if (document.getElementById("residence-yes").checked) {
        show.classList.add("d-none");
        zip.classList.remove("d-none");
        address.classList.remove("d-none");
    }
    else {
        if(document.getElementById("residence-no").checked) {
            show.classList.remove("d-none");
            zip.classList.add("d-none");
            address.classList.add("d-none");
        }
    }
}

//Needs warning toggles
//Currently using basic jQuery toggle until a better method can be figured out. */
//utilities
/*$("#needs-utilities").click(function(){
    $("#utilities-warning").toggle(this.checked);
});

//gas
$("#needs-gas").click(function(){
    $("#gas-warning").toggle(this.checked);
});

//rent
$("#needs-rent").click(function(){
    $("#rent-warning").toggle(this.checked);
}); */




$("#needs-utilities").click(function(){
    $("#utilities-warning").toggle(this.checked);
});

//gas
$("#needs-gas").click(function(){
    $("#gas-warning").toggle(this.checked);
});

//rent
$("#needs-rent").click(function(){
    $("#rent-warning").toggle(this.checked);
});

//thrift
$("#needs-thrift").click(function(){
    $("#thrift-warning").toggle(this.checked);
});

//food
$("#needs-food").click(function(){
    $("#food-warning").toggle(this.checked);
});

//other
$("#others").click(function(){
    $("#other-warning").toggle(this.checked);
});






//set isValid for true for validation
let isValid = true;

//Make all error messages invisible
function clearErrors() {
    let errors = document.getElementsByClassName("text-danger");
    for(let i = 0; i < errors.length; i++) {
        errors[i].classList.add("d-none");
    }
}


//validate the form
function validate() {
    let radioYes = document.getElementById("residence-yes");
    clearErrors();

    if(radioYes.checked){
        isValid = true;

        //
        needHelps();
        console.log(isValid);
        //Validate first name
        validateFirstName();
        //debug
        console.log(isValid);

        //validate last name
        validateLastName();
        //debug
        console.log(isValid);

        //Validate address
        validateAddress();
        //debug
        console.log(isValid);

        //Validate city
        validateCity();
        //debug
        console.log(isValid);

        //validate State
        validateState();
        //debug
        console.log(isValid);

        checkEmailOrPhone();

        console.log(isValid);
        return isValid;
    } else {
        isValid = true;
        //Validate first name
        validateFirstName();
        //debug
        console.log(isValid);

        //validate last name
        validateLastName();
        //debug
        console.log(isValid);

        //validate for either phone or email
        checkEmailOrPhone();
        //debug
        console.log(isValid);

        needHelps();
        console.log(isValid);

        //otherNeed();
        //console.log(isValid);

        return isValid;

    }

}

//check box for need helps
function  needHelps() {
    let needHelps = document.getElementsByName("needs[]");
    let errNeeds = document.getElementById("err-needHelps");
    let count = 0;
    for (let i =0; i <needHelps.length; i++) {
        if(needHelps[i].checked) {
            count++;
            errNeeds.classList.add("d-none");
        }
    }
    if(count === 0) {
        //let errNeeds = document.getElementById("err-needHelps");
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
    if(first == "") {
        let errFName = document.getElementById("err-fname");
        errFName.classList.remove("d-none");
        isValid = false;
    }
    return isValid;
}

//validate last name
function validateLastName(){
    let last = document.getElementById("lname").value;
    if(last == "") {
        let errLName = document.getElementById("err-lname");
        errLName.classList.remove("d-none");
        isValid = false;
    }
    return isValid;
}

//Validate address
function validateAddress(){
    let address = document.getElementById("address").value;
    if(address == "") {
        let errAddress = document.getElementById("err-address");
        errAddress.classList.remove("d-none");
        isValid = false;
    }
    return isValid;
}

//Validate city
function validateCity(){
    let city = document.getElementById("city").value;
    if(city == "") {
        let errCity = document.getElementById("err-city");
        errCity.classList.remove("d-none");
        isValid = false;
    }
    return isValid;
}

//Validate State
function validateState(){
    let state = document.getElementById("state").value;
    if(state==""){
        let errState = document.getElementById("err-state");
        errState.classList.remove("d-none");
        isValid=false;
    }
    return isValid;
}
function checkEmailOrPhone(){
    let phone = document.getElementById("phone").value;
    let email = document.getElementById("email").value;

    if(phone == "" && email==""){
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
    let zip = document.getElementById("inputZip").value;
    let zipFormat = new RegExp(/^\d{5}$/);
    //let show = document.getElementById("hidden");
    let errZip = document.getElementById("err-zip");
    let zipList = ["98030","98031","98032","98042","98058"];

    //test for not 5 digit zipcode
    if ( !zip.match(zipFormat)) {

        if (zip === "") {
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
            if ( zip === zipList[i]) {
                clearErrors();
                show.classList.remove("d-none");
                if(zip === zipList[i]){
                    isValid = true;
                    break;
                }
            } else {
                clearErrors();
                errZip.innerText = "Sorry! Look like you are outside our service area";
                errZip.classList.remove("d-none");
                isValid = false;
            }
        }
    }

    return isValid;

}
