
function isInputNumber(evt){
  var ch = String.fromCharCode(evt.which);
  if(!(/[0-9]/.test(ch))){
      evt.preventDefault();
  }
}

function isNotChar(evt){
  var ch = String.fromCharCode(evt.which);
  if(ch=="'"){
      evt.preventDefault();
  }
}

function blockSpecialChar(e){
  var k;
  document.all ? k = e.keyCode : k = e.which;
  return ((k >= 64 && k < 91) || (k > 96 && k < 123) || k == 8 || k == 46|| k == 42|| k == 33 || k == 32 || (k >= 48 && k <= 57));
  }




  function checkmodalform(theform){
    var email = theform.acmail.value;
    var pw=theform.acpw.value;
    var cpw=theform.accpw.value;
  
    if (!validateEmail(email)) {
      alert("Invalid Email address");
      return false;
    } 
  
  if(pw!=cpw){
    alert("Passwords Do Not Match\n");
    itssubmitted=0;
    return false;
    }
  
  return true;
  }
  



function checkfullform(theform){
  var contact= theform.accontact.value/1000000000;
  var whatsapp= theform.acwhatsapp.value/1000000000;

  if(contact<1||contact>10){
  alert(" Please enter a valid contact number\n");
  itssubmitted=0;
  return false;
  }

if(whatsapp<1||whatsapp>10){
  alert(" Please enter a valid Whatsapp number\n");
  itssubmitted=0;
  return false;
  }

return true;
}


function validateEmail(email) {
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}




