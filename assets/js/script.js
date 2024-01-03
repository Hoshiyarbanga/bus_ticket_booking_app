// for ragistraion page 

function validationOnRegistration(){
    let name = document.getElementById('name').value;
    let phone = document.getElementById('phone').value;
    let email = document.getElementById('email').value;
    let password = document.getElementById('password').value;
    let pattren = /^[^\s].*/ ;
    let onlychar = /[^a-zA-Z \-\/]/;
    let number = /[^0-9\-\/]/;


    // validations for name field
    if(name===""){
     errorName.innerHTML="Please enter a name";
     return false;
    }else if(!pattren.test(name)){
      errorName.innerHTML="No space in first name";
      return false;
    }else if (onlychar.test(name)){
      errorName.innerHTML="Only charaters allowed in first name";
      return false;
    }else{
      errorName.innerHTML="";
    }
    // validations for phone field
    if(phone===""){
      errorPhone.innerHTML="Please enter phone";
      return false;
    }else if(number.test(phone)){
      errorPhone.innerHTML="Please enter a valid phone";
      return false;
    }else if(phone.length != 10){
      errorPhone.innerHTML="Please enter 10 digits number";
      return false;
    }else{
      errorPhone.innerHTML="";
    }

    if(email===""){
      errorEmail.innerHTML="Please enter a email";
      return false;
    }else{
      errorEmail.innerHTML="";
    }

    if(password===""){
      errorPassword.innerHTML="Please enter a password";
      return false;
    }else{
      alert("You have successfully ragistered");
    }
  }

  // for select route

  //validation for select route
  
  
  function abc() {
    var startLocation = document.getElementById('startLocation');
    var endLocation = document.getElementById('endLocation');
    var date = document.getElementById('date');

    var errorRoute = document.getElementById('errorRoute');
    var validationResult = document.getElementById('validationResult');

    // Reset error messages
    errorRoute.textContent = '';
    validationResult.textContent = '';
    if (startLocation.value === '') {
      validationResult.textContent = 'Please fill start location.';
      return false;
    }

    if (endLocation.value === '') {
      validationResult.textContent = 'Please fill end location.';
      return false;
    }

    if (startLocation.value === endLocation.value) {
      validationResult.textContent = 'Please enter a valid route.';
      return false;
    }
    if (date.value === '') {
      validationResult.textContent = 'Please fill date.';
      return false;
    }


    return true; // Allow form submission
  }
  // for date
  const dateInput = document.getElementById('date');

  // Get today's date
  const today = new Date();
  const yyyy = today.getFullYear();
  let mm = today.getMonth() + 1; // Adding 1 because getMonth() returns zero-based month
  let dd = today.getDate();

  // For single-digit days/months, prepend 0
  if (dd < 10) {
    dd = `0${dd}`;
  }

  if (mm < 10) {
    mm = `0${mm}`;
  }

  const minDate = `${yyyy}-${mm}-${dd}`;

  // Set the minimum date for the input field
  dateInput.setAttribute('min', minDate);