$(document).ready(function(){

});

//takes care of form validation
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        else {
          event.preventDefault();
        }
        form.classList.add('was-validated');
      }, true);
    });
  }, false);
})();

//pushes data in form to database
function pushToDb() {
  var form = document.getElementById("purchase-form")
  if (form.checkValidity() === false){
    return false;
  }

  var xhr = new XMLHttpRequest();
  var formData = new FormData(document.getElementById("purchase-form"))
  xhr.onreadystatechange = function() {
    if (xhr.readyState == 4 && xhr.status == 200){
      var result = xhr.responseText;
      document.getElementsByClassName("product-detail-container")[0].innerHTML = "";
      document.getElementById("order-div").innerHTML = result;
    }
  }
  xhr.open("POST", "../html/postToDb.php", true);
  xhr.send(formData);
}

//grabs the state based on input zip
function getState(input){
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200){
      var result = xhr.responseText;
      if(input.id == "inputZip"){
        document.getElementById("inputState").value = result;
      }
      else {
        document.getElementById("inputBillingState").value = result;
      }
    }
  }
  xhr.open("GET","../html/getState.php?zip=" + input.value, true);
  xhr.send();
}

//dynamically grabs price of rock and displays price at bottom of form
function dynamicPrice(){
  var rockNumInput = document.getElementById("inputItem");
  var quantityInput = document.getElementById("inputNumberOfOrders");
  if (rockNumInput.checkValidity() && quantityInput.checkValidity()){
    //grab rock price
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
      if (xhr.readyState == 4 && xhr.status == 200){
        var result = xhr.responseText;
        document.getElementById("price-display").innerHTML = "$" + (result * quantityInput.value).toFixed(2);
      }
    }
    xhr.open("GET","../html/getRockPrice.php?id=" + rockNumInput.value, true);
    xhr.send();
  }
}