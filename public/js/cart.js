"use strict";
const cr = document.querySelector("[card]")
const cd = document.querySelector(".card")
const ct = document.querySelector("[data-plase]")
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
function clear_cart(){
    localStorage.clear();
    location.reload();
}
function addProduct(id){
    let productadd = localStorage.getItem(id)
    productadd = parseInt(productadd ) + 1
    localStorage.setItem(id, productadd)
    location.reload();
}
function removeProduct(id){
    let productremove = localStorage.getItem(id)
    productremove = parseInt(productremove ) - 1
    if(productremove===0){
        localStorage.removeItem(id)
    }else{ localStorage.setItem(id, productremove)}

    location.reload();
}
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
cartConut()
function productcart(){
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

         fetchProducts().then((products) => {

            products.forEach((product) => {

                if(parseInt(key)===parseInt(product.id)){
                const todo = cr.content.cloneNode(true);
                const count = localStorage.getItem(key)
                todo.querySelector("[count]").textContent = count;
                todo.querySelector("[price]").textContent = "$" + product.price;
                todo.querySelector("[productName]").textContent = product.title;
                todo.querySelector("[image]").src = product.image;
                todo.querySelector("[button_cart_add]").id= product.id;
                todo.querySelector("[button_cart_remove]").id = product.id;
                ct.append(todo);
                }
            });
        });
        var productCount =  productCount + parseInt(localStorage.getItem(key))
        const cartelm = document.querySelector(".rounded-pill")
        cartelm.textContent = productCount
    }


}
productcart()
