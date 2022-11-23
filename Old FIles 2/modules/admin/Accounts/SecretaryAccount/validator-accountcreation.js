function checkUserVerification() {

    var flag = true;

    //--------- FOR GENERAL CLASSS FIELD ------------------
    //--------- FOR USER FIELD ------------------

    var fnm = document.getElementById("fnm").value;


    if (fnm == "") { //check empty name field
        document.getElementById("fnmmsg").innerHTML = "*Name Field is Empty!";
        flag = false;
    } else if (/\d/.test(fnm)) { //check if name has numbers
        document.getElementById("fnmmsg").innerHTML = "*Names Should Not Contain Numbers and Special Characters";
        flag = false;
    }

    var lnm = document.getElementById("lnm").value;


    if (lnm == "") { //check empty name field
        document.getElementById("lnmmsg").innerHTML = "*Name Field is Empty!";
        flag = false;
    } else if (/\d/.test(lnm)) { //check if name has numbers
        document.getElementById("lnmmsg").innerHTML = "*Names Should Not Contain Numbers and Special Characters";
        flag = false;
    }



    //--------- FOR PASSWORD FIELD ------------------

    var pw = document.getElementById("pswd").value;

    if (pw == "") { //check empty password field  
        document.getElementById("pwdmsg").innerHTML = "*Password Field is Empty!";
        flag = false;
    } else if (pw.length < 8) { //minimum password length validation  
        document.getElementById("pwdmsg").innerHTML = "*Password length must be atleast 8 characters";
        flag = false;
    } else if (pw.length > 15) { //maximum length of password validation  
        document.getElementById("pwdmsg").innerHTML = "*Password length must not exceed 15 characters";
        flag = false;
    }

    //--------- FOR EMAIL ADDRESS FIELD ------------------

    var em = document.getElementById("em").value;


    if (em == "") { //check empty password field  
        document.getElementById("emmsg").innerHTML = "*Email Address Field is Empty!";
        flag = false;
    } else if (!em.includes("@")) { //check if email add contains @
        document.getElementById("emmsg").innerHTML = "*Email Not Valid!";
        flag = false;
    } else if (!em.includes(".")) { //check if email add contains .
        document.getElementById("emmsg").innerHTML = "*Email Not Valid!";
        flag = false;
    }

    //--------- FOR USERNAME FIELD ------------------

    var un = document.getElementById("un").value;

    if (un.includes(" ")) { //check empty password field  
        document.getElementById("unmsg").innerHTML = "*Username shouldn't have spaces!";
        flag = false;
    }

    //--------- FOR PHONE NUMBER FIELD ------------------

    var pn = document.getElementById("pn").value;

    if (!/\d/.test(pn)) { //check empty password field  
        document.getElementById("pnmsg").innerHTML = "*Phone Number should only have numbers!";
        flag = false;
    } else if (length(pn) !== 10) { //check empty password field  
        document.getElementById("pnmsg").innerHTML = "*Phone Number should only have 11 digits!";
        flag = false;
    }

    return flag;
}