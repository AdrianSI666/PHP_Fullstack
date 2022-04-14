function checkForm() {
    var error = false; //to znaczy, że danych nie brakuje
    var contactEmail = document.getElementById("contactEmail");
    var contactPassw = document.getElementById("contactPassw");
    var contactName = document.getElementById("contactName");
    var contactSurName = document.getElementById("contactSurName");
    var contactBirth = document.getElementById("contactBirth");
    var contactPesel = document.getElementById("contactPesel");
    var contactCity = document.getElementById("contactCity");
    var contactAdress = document.getElementById("contactAdress");

    if (contactEmail.value == "") {
        document.getElementById('errorEmail').className = 'alert alertdanger';
        document.getElementById('errorFormaEmail').className = 'hide';
        contactEmail.className = 'form-control is-invalid';
        error = true;
    } else {
        document.getElementById('errorEmail').className = 'hide';
        var email = contactEmail.value;
        var regex = /^[a-zA-Z0-9._-]+@([a-zA-Z0-9.-]+\.)+[a-zA-Z0-9.-]{2,4}$/;
        if (regex.test(email) == false) {
            document.getElementById('errorFormaEmail').className = 'alert alertdanger';
            contactEmail.className = 'form-control is-invalid';
            error = true;
        } else {
            document.getElementById('errorFormaEmail').className = 'hide';
            contactEmail.className = 'form-control is-valid';

        }
    }

    if (contactPassw.value == "") {
        document.getElementById('errorPassw').className = 'alert alertdanger';
        document.getElementById('errorFormaPassw').className = 'hide';
        contactPassw.className = 'form-control is-invalid';
        error = true;

    } else {
        document.getElementById('errorPassw').className = 'hide';
        var password = contactPassw.value;
        var hasUpperCase = /[A-Z]/.test(password);
        var hasLowerCase = /[a-z]/.test(password);
        var hasNumbers = /\d/.test(password);
        var hasNonalphas = /\W/.test(password);
        if (hasUpperCase + hasLowerCase + hasNumbers + hasNonalphas == 4) {
            document.getElementById('errorFormaPassw').className = 'hide';
            contactPassw.className = 'form-control is-valid';

        } else {
            document.getElementById('errorFormaPassw').className = 'alert alertdanger';
            contactPassw.className = 'form-control is-invalid';
            error = true;

        }
    }

    if (contactName.value == "") {
        document.getElementById('errorName').className = 'alert alertdanger'; //Wkrywanie brakujących pól
        contactName.className = 'form-control is-invalid';
        error = true;
    } else {
        document.getElementById('errorName').className = 'hide'; //Ukrywanie po wpisaniu dobrze
        contactName.className = 'form-control is-valid';
    }

    if (contactSurName.value == "") {
        document.getElementById('errorSurName').className = 'alert alertdanger';
        contactSurName.className = 'form-control is-invalid';
        error = true;
    } else {
        document.getElementById('errorSurName').className = 'hide';
        contactSurName.className = 'form-control is-valid';
    }


    if (contactBirth.value == "") {
        document.getElementById('errorBirth').className = 'alert alertdanger';
        contactBirth.className = 'form-control is-invalid';
        error=true;
    } else {
        document.getElementById('errorBirth').className = 'hide';
        var today = new Date();
        var month = today.getMonth() + 1;
        var ok = today.getFullYear() + "-" + month + "-" + today.getDate();
        if (ok < contactBirth.value) {
            document.getElementById('errorBirthForm').className = 'alert alertdanger';
            contactBirth.className = 'form-control is-invalid';
            error=true;
        } else {
            document.getElementById('errorBirthForm').className = 'hide';
            contactBirth.className = 'form-control is-valid';
        }
    }



    if (contactPesel.value == ""){
        document.getElementById('errorPesel').className='alert alertdanger';
        document.getElementById('errorPesel2').className='hide';
        contactPesel.className='form-control is-invalid';
        error=true;
    }
    else
    {
        document.getElementById('errorPesel').className='hide';
        var regex = /^\d{11}$/;
        if(regex.test(contactPesel.value)==0){
            document.getElementById('errorPesel2').className='alert alertdanger';
            contactPesel.className='form-control is-invalid';
            error=true;
        }
        else
        {
            document.getElementById('errorPesel2').className='hide';
            contactPesel.className='form-control is-valid';
        }
    }



    if (contactCity.value == ""){
        document.getElementById('errorCity').className='alert alertdanger';
        contactCity.className='form-control is-invalid';
        error=true;
    }
    else
    {
        document.getElementById('errorCity').className='hide';
        contactCity.className='form-control is-valid';
    }


    if (contactAdress.value == ""){
        document.getElementById('errorAdress').className='alert alertdanger';
        contactAdress.className='form-control is-invalid';
        error=true;
    }
    else
    {
        document.getElementById('errorAdress').className='hide';
        contactAdress.className='form-control is-valid';
    }

    if (!error) {
        document.cookie = "profile_viewer_uid=0";
        return true;
    }
    else{
        document.cookie = "profile_viewer_uid=1";
        //alert ("Nie wypełniłeś następujących pól:\n" + errorText); 
        return false;
    } 
}

function onbluremail()
{
    var contactEmail = document.getElementById("contactEmail");
    if (contactEmail.value == ""){
        document.getElementById('errorEmail').className='alert alertdanger';
        document.getElementById('errorFormaEmail').className='hide';
        contactEmail.className='form-control is-invalid';


        document.cookie = "profile_viewer_uid=1";
    }
    else {
        document.getElementById('errorEmail').className='hide';
        var email = contactEmail.value;
        var regex = /^[a-zA-Z0-9._-]+@([a-zA-Z0-9.-]+\.)+[a-zA-Z0-9.-]{2,4}$/;
        if(regex.test(email)==false)
        {
            document.getElementById('errorFormaEmail').className='alert alertdanger';
            contactEmail.className='form-control is-invalid';
            document.cookie = "profile_viewer_uid=1";
        }
        else
        {
            document.getElementById('errorFormaEmail').className='hide';
            contactEmail.className='form-control is-valid';
        }
    }
}



function onblurpassw()
{
    var contactPassw = document.getElementById("contactPassw");
    if (contactPassw.value == ""){
        document.getElementById('errorPassw').className='alert alertdanger';
        document.getElementById('errorFormaPassw').className='hide';
        contactPassw.className='form-control is-invalid';
        document.cookie = "profile_viewer_uid=1";
    }
    else {
        document.getElementById('errorPassw').className='hide';
        var password = contactPassw.value;
        var hasUpperCase = /[A-Z]/.test(password);
        var hasLowerCase = /[a-z]/.test(password);
        var hasNumbers = /\d/.test(password);
        var hasNonalphas = /\W/.test(password);
        if (hasUpperCase + hasLowerCase + hasNumbers + hasNonalphas == 4)
        {
            document.getElementById('errorFormaPassw').className='hide';
            contactPassw.className='form-control is-valid';

        }
        else
        {
            document.getElementById('errorFormaPassw').className='alert alertdanger';
            contactPassw.className='form-control is-invalid';
            document.cookie = "profile_viewer_uid=1";
        }
    }
}



function onblurimie()
{
    var contactName = document.getElementById("contactName");
    if (contactName.value == ""){
        document.getElementById('errorName').className='alert alertdanger';
        contactName.className='form-control is-invalid';
        document.cookie = "profile_viewer_uid=1";
    }
    else
    {
        document.getElementById('errorName').className='hide';
        contactName.className='form-control is-valid';
    }
}



function onblurnazwisko()
{
    var contactSurName = document.getElementById("contactSurName");
    if (contactSurName.value == ""){
        document.getElementById('errorSurName').className='alert alertdanger';
        contactSurName.className='form-control is-invalid';
        document.cookie = "profile_viewer_uid=1";
    }
    else
    {
        document.getElementById('errorSurName').className='hide';
        contactSurName.className='form-control is-valid';
    }
}


function onblurBirth()
{
    var contactBirth = document.getElementById("contactBirth");
    if (contactBirth.value == ""){
        document.getElementById('errorBirth').className='alert alertdanger';
        document.getElementById('errorBirthForm').className='hide';
        contactBirth.className='form-control is-invalid';
        document.cookie = "profile_viewer_uid=1";
    }
    else
    {
        document.getElementById('errorBirth').className='hide';
        var today = new Date();
        var month=today.getMonth()+1;
        var ok=today.getFullYear()+"-"+month+"-"+today.getDate();
        if(ok<contactBirth.value){
            document.getElementById('errorBirthForm').className='alert alertdanger';
            contactBirth.className='form-control is-invalid';
            document.cookie = "profile_viewer_uid=1";
        }
        else
        {
            document.getElementById('errorBirthForm').className='hide';
            contactBirth.className='form-control is-valid';
        }
    }
}


function onblurPesel()
{
    var contactPesel = document.getElementById("contactPesel");
    if (contactPesel.value == ""){
        document.getElementById('errorPesel').className='alert alertdanger';
        document.getElementById('errorPesel2').className='hide';
        contactPesel.className='form-control is-invalid';
        document.cookie = "profile_viewer_uid=1";
    }
    else
    {
        document.getElementById('errorPesel').className='hide';
        var regex = /^\d{11}$/;
        if(regex.test(contactPesel.value)==0){
            document.getElementById('errorPesel2').className='alert alertdanger';
            contactPesel.className='form-control is-invalid';
            document.cookie = "profile_viewer_uid=1";
        }
        else
        {
            document.getElementById('errorPesel2').className='hide';
            contactPesel.className='form-control is-valid';
        }
    }
}

function onblurCity(){
    var contactCity = document.getElementById("contactCity");
    if (contactCity.value == ""){
        document.getElementById('errorCity').className='alert alertdanger';
        contactCity.className='form-control is-invalid';
        document.cookie = "profile_viewer_uid=1";
    }
    else
    {
        document.getElementById('errorCity').className='hide';
        contactCity.className='form-control is-valid';
    }
}

function onblurAdress(){
    var contactAdress = document.getElementById("contactAdress");
    if (contactAdress.value == ""){
        document.getElementById('errorAdress').className='alert alertdanger';
        contactAdress.className='form-control is-invalid';
        document.cookie = "profile_viewer_uid=1";
    }
    else
    {
        document.getElementById('errorAdress').className='hide';
        contactAdress.className='form-control is-valid';
    }
}