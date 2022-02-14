"use strict";
const ct = document.querySelector("[data-products-row]");
const cr = document.querySelector("[todo-card-template]")
const cd = document.querySelector(".card");
async function fetchProducts() {
    let products = localStorage.getItem("products");

    if (products === null) {
        const response = await fetch("https://fakestoreapi.com/products");
        const result = await response.json();
        const products = result.map((product) => {
            return {
                id: product.id,
                title: product.title,
                image: product.image,
                price: product.price,
                stars: Math.round(product.rating.rate),
            };
        });


        localStorage.setItem("products", JSON.stringify(products));
    } else {
        products = JSON.parse(products);
    }

    return products;
}

function addToCart(id) {
    const localcart = localStorage.getItem(id);
    if (localcart === null){
        localStorage.setItem(id , 1)
    }else{
        cartConut()
        localStorage.setItem(id , parseInt(localcart )+ 1)
    }

}
function cartConut(){
    var productCount = 0;
    for (let key in localStorage) {
        if(key === "products"){
            continue;
        }
        if(key === "setItem"){
            continue;
        }
        if(key === "removeItem"){
            continue;
        }
        if(key === "key"){
            continue;
        }
        if(key === "getItem"){
            continue;
        }
        if(key === "clear"){
            continue;
        }
        if(key === "length"){
            continue;
        }
        var productCount =  productCount + parseInt(localStorage.getItem(key))
        const cartelm = document.querySelector(".rounded-pill")
        cartelm.textContent = productCount
    }
}
cartConut()


fetchProducts().then((products) => {

    products.forEach((product) => {
        const todo = cr.content.cloneNode(true).children[0];
        todo.querySelector(".add-to-cart").id = product.id;
        todo.querySelector(".card-img-top").src = product.image;
        todo.querySelector(".fw-bolder").textContent = product.title;
        todo.querySelector(".price").textContent = product.price + "$";
        // todo.querySelector(".bi-star-fill") = todo.querySelector(".bi-star-fill") * 3;
        ct.append(todo);
    });
});



