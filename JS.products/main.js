// Cart 
let cartIcon = document.querySelector("#cart-icon");
let cart = document.querySelector(".cart");
let closeCart = document.querySelector("#close-cart");
// Open Cart
cartIcon.onclick = () =>{
    cart.classList.add("active");
};
// Close Cart
closeCart.onclick = () =>{
    cart.classList.remove("active");
};
// Cart Working JS
if (document.readyState == "loading"){
    document.addEventListener("DOMContentLoaded", ready);
}else{
    ready();
}
// Making Function
function ready(){
    // Remove Items from Cart
    var RemoveCartButtons = document.getElementsByClassName("cart-remove");
    console.log(RemoveCartButtons)
    for (var i = 0; i < RemoveCartButtons.length; i++){
        var button = RemoveCartButtons[i];
        button.addEventListener("click", RemoveCartItem);
    }
    //Quantity Changes
    var quantityInputs = document.getElementsByClassName("cart-quantity")
    for (var i = 0; i < quantityInputs.length; i++){
        var input = quantityInputs[i];
        input.addEventListener("change",quantityChanged);
    }
    // Add to Cart
    var addCart = document.getElementsByClassName("add-cart")
    for (var i = 0; i < addCart.length; i++){
        var button = addCart[i];
        button.addEventListener("click",addCartClicked);
    }
}

    // Remove Items From Cart
function RemoveCartItem(event){
    var buttonClicked = event.target;
    buttonClicked.parentElement.remove();
    updatetotal();
}
// Quantity Changes
function quantityChanged(event){
    var input = event.target
if (NaN(input.value) || input.value <= 0) {
    input.value = 1;
}
updatetotal();
}
// Add to Cart
function addCartClicked(event){
    var button = event.target
    var shopProducts = button.parentElement
    var title = shopProducts.getElementsByClassName("product-title")[0].innerText
    var price = shopProducts.getElementsByClassName("price")[0].innerText
    var productImg = shopProducts.getElementsByClassName("product-img")[0].src;
    addProductToCart(title,price,productImg);
    updatetotal()
}
function addProductToCart(title,price,productImg){
    var cartShopBox = document.createElement("div");
  //  cartShopBox.classList.add("cart-box")
    var cartItems = document.getElementsByClassName("cart-content")[0]
    var cartItemsNames = cartItems.getElementsByClassName("cart-product-title");
    for (var i = 0; i < cartItemsNames.length; i++){
        alert("You have already add this item to cart");
    }
}

// Update Total
function updatetotal() {
    var cartContent = document.getElementsByClassName("cart-content")[0];
    var cartBoxes = cartContent.getElementsByClassName("cart-box");
    var total = 0;
    for (var i = 0; i < cartBoxes.length; i++){
        var cartbox = cartBoxes[i];
        var priceElement = cartbox.getElementsByClassName("cart-price")[0];
        var price = parseFloat(priceElement.innerText.replace("₱",""));
        var quantityElement = cartbox.getElementsByClassName("cart-quantity")[0];
        var quantity = quantityElement.value;
        total= total + price * quantity;
    // If price Contain some Cents Value
    total = Math.round(total * 100) / 100;
   document.getElementsByClassName("total-price")[0].innerText = "₱" + total;

}
}