function PwdValid(pwd) {
    reg = /--|\/|'|\\/i;
    if (pwd.search(reg) < 0)
    {
        return true
    }
    else
    {
        return false;
    }
}

function ValidLength(pwd) {
    if (pwd.length < 6)
    {
        return false;
    }
    else
    {
        return true;
    }

}

function validFields(formName, FiledStrToken, AlertMessage) {

    var FiledStrTokenArray = FiledStrToken.split("--");
    var tempVar = "";
    var isValid = true;

    for (i = 0; i < FiledStrTokenArray.length; i++)
    {
        eval("tempVar=document." + formName + "." + FiledStrTokenArray[i] + ".value;");
        if (!PwdValid(tempVar) || !ValidLength(tempVar))
        {
            isValid = false;
            break;
        }
    }

    if (isValid)
    {
        eval("document." + formName + ".submit();");
    }
    else
    {
        alert(AlertMessage);
        return false;
    }
}


function validTxtFields(formName, FiledStrToken, AlertMessage) {

    var FiledStrTokenArray = FiledStrToken.split("--");
    var tempVar = "";
    var isValid = true;

    for (i = 0; i < FiledStrTokenArray.length; i++)
    {
        eval("tempVar=document." + formName + "." + FiledStrTokenArray[i] + ".value;");
        if (!PwdValid(tempVar))
        {
            isValid = false;
            break;
        }
    }

    if (isValid)
    {
        return true;
    }
    else
    {
        alert(AlertMessage);
        return false;
    }
}


function LoginValidPwd(pwd, AlertMessage) {
    if (!PwdValid(pwd))
    {
        alert(AlertMessage);
        return false;
    }
}


function chkFormValue(formName, FiledStrToken, AlertMessage) {

    var FiledStrTokenArray = FiledStrToken.split("--");
    var tempVar = "";
    var isValid = true;

    for (i = 0; i < FiledStrTokenArray.length; i++)
    {
        eval("tempVar=document." + formName + "." + FiledStrTokenArray[i] + ".value;");
        if (tempVar == "")
        {
            isValid = false;
            break;
        }
    }

    if (isValid)
    {
        eval("document." + formName + ".submit();")
    }
    else
    {
        alert(AlertMessage);
        return false;
    }
}

function chkTxtFormValue(formName, FiledStrToken, AlertMessage) {

    var FiledStrTokenArray = FiledStrToken.split("--");
    var tempVar = "";
    var isValid = true;

    for (i = 0; i < FiledStrTokenArray.length; i++)
    {
        eval("tempVar=document." + formName + "." + FiledStrTokenArray[i] + ".value;");
        if (tempVar == "")
        {
            isValid = false;
            break;
        }
    }

    if (isValid)
    {
        return true;
    }
    else
    {
        alert(AlertMessage);
        return false;
    }
}

/**
 * event  KeyboardEvent
 * isAllowLetter  �O�_���\�ϥΤj�p�g�r��
 * isAllowNumber  �O�_���\�ϥμƦr
 * allowOfCharacters  ���\�ϥΪ��r���A�i�u�ʼW�[
 **/
function checkTextInputKeyPress(event, isAllowLetter, isAllowNumber, allowOfCharacters) {
    var varKeyCode = event.keyCode > 0 ? event.keyCode : event.which;
    if(varKeyCode == 13 || varKeyCode == 8 || varKeyCode == 9) {
        //��J�䬰 CarriageReturn�BBackspace�BTab
        return true;
    }
    if(isAllowLetter && ( (varKeyCode >= 65 && varKeyCode <= 90) || (varKeyCode >= 97 && varKeyCode <= 122) ) ) {
        return true;
    }
    if(isAllowNumber && (varKeyCode >= 48 && varKeyCode <= 57) ) {
        return true;
    }
    if(arguments.length > 3) {
        for(var i = 3 ; i < arguments.length ; i++) {
            if(arguments[i].length == 1 && arguments[i].charCodeAt() == varKeyCode) {
                return true;
            }
        }
    }
    return false;
}