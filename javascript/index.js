var fname = lname = email = pwd = pwdcheck = pno = address = dob = verify = hash = "";
var fnameErr = lnameErr = emailErr = pwdErr = pwdcheckErr = pnoErr = addressErr = dobErr = "";
var regName = new RegExp("^[a-zA-Z]+$");
var regEmail = new RegExp("\\S+@\\S+\\.\\S+");
var regPno = new RegExp("^[0-9]{10}$");
var counter = 0;
function testInput(data){
    var string3 = data;
    var string = string3.trim();
    var string1 = string.replace(/\//g, "");
    var string2 = string1.replace(/[&\/\\#,+()$~%.'":*?<>{}]/g, "");
    return string2;
}

function validateForm() {
    fname = testInput(document.forms["myForm"]["fname"].value);
    lname = testInput(document.forms["myForm"]["lname"].value);
    email = document.forms["myForm"]["email"].value;
    pwd = testInput(document.forms["myForm"]["pwd"].value);
    pwdcheck = testInput(document.forms["myForm"]["pwdcheck"].value);
    dob = testInput(document.forms["myForm"]["dob"].value);
    pno = testInput(document.forms["myForm"]["pno"].value);
    address = testInput(document.forms["myForm"]["address"].value);
    if (regName.test(fname) === true) {
        counter += 1;
    } else {
        fnameErr = "Name must have only letters!";
        window.alert(fnameErr);
        return false;
    }
    if (regName.test(lname)) {
        counter += 1;
    } else {
        lnameErr = "Name must have only letters!";
        window.alert(lnameErr);
        return false;
    }
    if (regEmail.test(email)){
        counter += 1;
    } else {
        emailErr = "Email not in correct format!";
        window.alert(emailErr);
        return false;
    }
    if ( pwd === pwdcheck){
        counter += 1;
    } else{
        pwdcheckErr = "Passwords do not match!";
        window.alert(pwdcheckErr);
        return false;
    }
    if (regPno.test(pno)){
        counter += 1;
    }else{
        pnoErr = "Must be numbers!";
        window.alert(pnoErr);
        return false;
    }
    if (counter === 5) {
        return true;
    }
    return false;
}        