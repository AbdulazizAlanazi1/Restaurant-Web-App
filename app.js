var cartTotal=0;
function incrementCart() {
  document.querySelector('#amountToAdd').innerHTML= +document.querySelector('#amountToAdd').innerHTML+1;
}

function decrementCart() {
  if(document.querySelector('#amountToAdd').innerHTML == '1')
    document.querySelector('#amountToAdd').innerHTML='1';
  else{
    document.querySelector('#amountToAdd').innerHTML= +document.querySelector('#amountToAdd').innerHTML-1;}
}

function addToCart(pageId){
  document.getElementById("numOfItems").innerHTML = +document.getElementById("numOfItems").innerHTML +  +document.querySelector('#amountToAdd').innerHTML;

  for(var i=0; i<+document.getElementById("amountToAdd").innerHTML ; i++){

  var textToAdd = document.createElement("p");
  var priceToAdd = document.createElement("p");

  textToAdd.innerHTML = "Best Sancwich";
  priceToAdd.innerHTML = 23.9;

  document.getElementsByClassName("cartLeft")[0].insertBefore(textToAdd , document.getElementsByClassName("totalText")[0]);
  document.getElementsByClassName("cartRight")[0].insertBefore(priceToAdd, document.getElementById("TotalPrice"));

  cartTotal+=23.9;
  }
  document.getElementById('TotalPrice').innerHTML = cartTotal.toFixed(2);
  document.querySelector('#amountToAdd').innerHTML='1';
}

function addReview(){
  document.getElementsByClassName("ReviewVis")[0].style.display = "block";
  document.getElementsByClassName("ReviewVis")[0].classList.add("activateTransition");
}

function addOneToCart(){
  document.getElementById("numOfItems").innerHTML = +document.getElementById("numOfItems").innerHTML + 1;
}

function counter(){
  
var textarea = document.getElementById('revbar');
var span = document.getElementById('span');
var text = parseInt(span.textContent);
textarea.onkeyup = function(){
  if(document.getElementById('emptyErrorMessage').style.display == "block")
    document.getElementById('emptyErrorMessage').style.display = "none";
  span.textContent = text + textarea.value.length;
  }
}

function counter(){
  
  var textarea = document.getElementById('revbar');
  var span = document.getElementById('span');
  var text = parseInt(span.textContent);
  textarea.onkeyup = function(){
    if(document.getElementById('emptyErrorMessage').style.display == "block")
      document.getElementById('emptyErrorMessage').style.display = "none";
    span.textContent = text + textarea.value.length;
    }
  }
  

 function submitButton(){
  if(document.getElementById('revbar').value.length==0){
    document.getElementById('emptyErrorMessage').style.display = "block";
    }
  else{
    if(document.getElementById('name').value.length == 0)
      document.getElementById('name').value = "Customer";
    document.getElementById('reviewForm').submit();
    }
  }

setTimeout(function() {})

function orderItem(itemID){
  addOneToCart();
  var elementName;
  var elementPrice;
  if(itemID == "meal1"){
    cartTotal+=23.9;
    elementName = "Best Sancwich";
    elementPrice= 23.9;
  }
  else if(itemID == "meal2"){
    cartTotal+=25.9;
    elementName = "Burger";
    elementPrice= 25.9;
  }
  else if(itemID == "meal3"){
    cartTotal+=27.5;
    elementName = "Burger Meal";
    elementPrice= 27.5;
  }
  else if(itemID == "meal4"){
    cartTotal+=32.9;
    elementName = "Best Deal Meal";
    elementPrice= 32.9;
  }
  else if(itemID == "meal5"){
    cartTotal+=19.4;
    elementName = "Chicken Burger";
    elementPrice= 19.4;
  }
  else{
    cartTotal+=28.5;
    elementName = "Pizza";
    elementPrice= 28.5;
  }
  var textToAdd = document.createElement("p");
  var priceToAdd = document.createElement("p");

  textToAdd.innerHTML = elementName;
  priceToAdd.innerHTML = elementPrice;
  document.getElementById('TotalPrice').innerHTML = cartTotal.toFixed(2);

  document.getElementsByClassName("cartLeft")[0].insertBefore(textToAdd , document.getElementsByClassName("totalText")[0]);
  document.getElementsByClassName("cartRight")[0].insertBefore(priceToAdd, document.getElementById("TotalPrice"));
}

function OrderButton(){
  document.getElementsByClassName("cartLeft")[0].innerHTML = "";
  document.getElementsByClassName("cartRight")[0].innerHTML = "";
  document.getElementById("numOfItems").innerHTML = "0";
  cartTotal = 0;

  var p1 = document.createElement("p");
  var p2 = document.createElement("p");
  var p3 = document.createElement("p");
  var p4 = document.createElement("p");

  p1.innerHTML = "Item";
  p2.innerHTML = "Price";
  p3.innerHTML = "Total";
  p4.innerHTML = "0";
  p3.classList.add("totalText");
  p4.id = "TotalPrice";
  document.getElementsByClassName("cartLeft")[0].appendChild(p1);
  document.getElementsByClassName("cartLeft")[0].appendChild(p3);
  document.getElementsByClassName("cartRight")[0].appendChild(p2);
  document.getElementsByClassName("cartRight")[0].appendChild(p4);

}

function hid_fact(mealId){
  var factbutt = document.querySelector('#fact');
  var countanirr = document.querySelectorAll('.containerr');
  var facts = document.querySelector('#facts');
  var review = document.querySelector('#review');
  facts.style.display= 'none';
  review.style.display= 'block'; 
  document.getElementById('fact').style.backgroundColor = "transparent";
  document.getElementById('rev').style.backgroundColor = "#FFAA00";
  
  //DB
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("reviewsCont").innerHTML = this.responseText;
  }
};
xmlhttp.open("GET","review.php?id="+mealId,true);
xmlhttp.send();

}

function hid_review(){

  var factbutt = document.querySelector('#fact');
var countanirr = document.querySelectorAll('.containerr');
var facts = document.querySelector('#facts');
var review = document.querySelector('#review');

  facts.style.display= 'block';
  review.style.display= 'none'; 

  document.getElementById('fact').style.backgroundColor = "#FFAA00";
  document.getElementById('rev').style.backgroundColor = "transparent";
}
