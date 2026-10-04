




// ===== Recherche =====

const searchInput = document.querySelector("header input");

searchInput.addEventListener("keyup", ()=>{

let value = searchInput.value.toLowerCase();

let products = document.querySelectorAll(".product");

products.forEach(product=>{

let title = product.querySelector("h3").textContent.toLowerCase();

if(title.includes(value)){

product.style.display="block";

}
else{

product.style.display="none";

}

})

});








let index=0;

const hero = document.querySelector(".hero");

setInterval(()=>{

index++;

if(index>=images.length){

index=0;

}

hero.style.background=

`url(${images[index]}) center/cover`;

},4000);
let cart=[];

const cartCount =
document.getElementById("cart-count");

const cartItems =
document.getElementById("cart-items");

const totalPrice =
document.getElementById("total-price");


const addButtons=
document.querySelectorAll(".add-cart");


addButtons.forEach(button=>{

button.addEventListener("click",()=>{

const product=
button.parentElement;

const name=
product.querySelector("h3").innerText;

const price=
parseInt(
product.querySelector(".price").innerText
);

cart.push({

name:name,

price:price

});

updateCart();

});

});



function updateCart(){

cartItems.innerHTML="";

let total=0;

cartCount.innerText=cart.length;


cart.forEach((item,index)=>{

total += item.price;

cartItems.innerHTML += `

<div class="item">

${item.name}

-

${item.price} €

<button onclick="removeItem(${index})">

X

</button>

</div>

`;

});

totalPrice.innerText=total;

}



function removeItem(index){

cart.splice(index,1);

updateCart();

}



document
.getElementById("clear-cart")

.addEventListener("click",()=>{

cart=[];

updateCart();

});
function ajouterPanier(nom, prix){

    let panier = JSON.parse(localStorage.getItem("panier")) || [];

    panier.push({
        nom: nom,
        prix: prix
    });

    localStorage.setItem("panier", JSON.stringify(panier));

    alert("Produit ajouté au panier !");
}