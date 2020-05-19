//VALIDATE FOR SUM NUMBERS------------
let nameArea = document.querySelector('#form_name'); //
let emailArea = document.querySelector('#form_email'); //
let textArea = document.querySelector('#form_message'); //

let sendEmailBtn = document.querySelector('#sendBtn'); //
let formAction = document.querySelector('#contact-form'); //
let message_box = document.querySelector('.message_box'); //
nameArea.addEventListener('focusout',coloringBgr);
emailArea.addEventListener('focusout',coloringBgr);
textArea.addEventListener('focusout',coloringBgr);
sendEmailBtn.addEventListener('click', validateInputs);


let error = [];

function validateInputs(e) {
	e.preventDefault();

  let nameVerification = validateName(nameArea.value);//true or false
  let emailVerification = validateEmail(emailArea.value);//true or false

  if (!nameVerification) {
    nameArea.style.background = 'ffe6e6';
    nameArea.style.background = 'linear-gradient(to right, #ffe6e6, #FFF)';
    error.push('x');
    nameArea.value = ``;
    nameArea.setAttribute('placeholder','Obavezno Ime i Prezime!');
    nameArea.addEventListener("focus", clearError);
  }
  if (!emailVerification) {
    emailArea.style.background = 'ffe6e6';
    emailArea.style.background = 'linear-gradient(to right, #ffe6e6, #FFF)';
    error.push('x');
    emailArea.value = ``;
    emailArea.setAttribute('placeholder','primer@domen.com');
    emailArea.addEventListener("focus", clearError);
  }
  if (textArea.value == '') {
    textArea.style.background = 'ffe6e6';
    textArea.style.background = 'linear-gradient(to right, #ffe6e6, #FFF)';
    error.push('x');
    textArea.value = '';
    textArea.setAttribute('placeholder','Obavezno polje!');
    textArea.addEventListener("focus", clearError);
  }
  if (error.length == 0) {
    let namee = nameArea.value;
    let emaill = emailArea.value;
    let messagee = textArea.value;
    sendMail(namee,emaill,messagee);
  }
}

//full validation for name
function validateName(nameValidation) 
{
  let rn = /^[A-Za-z ]+$/;

  return rn.test(nameValidation);
}

//full validation for email
function validateEmail(emailValidation) 
{
  let re = /^(?:[a-z0-9!#$%&amp;'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&amp;'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])$/;

  return re.test(emailValidation);
}
//--------------------------

function clearInputsAfterSendMail() {
  nameArea.style.background = '#FFF';
  emailArea.style.background = '#FFF';
  textArea.style.background = '#FFF';
  $('.message_box').empty();
}


function clearError() {
	this.style.background = '#FFF';
	this.style.color = '#000';
  nameArea.setAttribute('placeholder','Ime i Prezime');
  emailArea.setAttribute('placeholder','Vaša E-mail adresa');
  textArea.setAttribute('placeholder','Tekst poruke...');
	error.splice(0);
}

function coloringBgr() {
  if (nameArea.value != '') {
    nameArea.style.background = '#e8f0fe';
  }
  if (emailArea.value != '') {
    emailArea.style.background = '#e8f0fe';
  }
  if (textArea.value != '') {
    textArea.style.background = '#e8f0fe';
  }
}


//SEND EMAIL WITH AJAX to PHP***************************
function sendMail(name,email,message) {
  
  let dataString = 'name=' + name + '&email=' + email + '&message=' + message;
  let delay = 2000;
  
    $.ajax({
    type: 'POST',
    url: "contact.php",
    data:dataString,
    cache:false,
    beforeSend: function() {
       $('.message_box').html(
       '<img src="img/Loader.gif" style="border-radius:50%;" width="30" height="30"/>'
       );
    }, 
    success: function(data){
      setTimeout(function() {
      $('.message_box').html('<div class="alert alert-success">Poruka je poslata. Odgovorićemo u najkraćem mogućem roku. Hvala Vam na kontaktu.</div>');
      formAction.reset();
      setTimeout(clearInputsAfterSendMail,5000);
      }, delay);
    }
  });

}
//**************************************************
