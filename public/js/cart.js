"use strict";
const cr = document.querySelector("[card]")
const cd = document.querySelector(".card")
const ct = document.querySelector("[data-plase]")
const todo = cr.content.cloneNode(true).children[0];
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
        const count = localStorage.getItem(key)
         todo.querySelector("#productId").textContent = key;
         todo.querySelector("[productCount]").textContent = count;
         todo.querySelector("[price]").textContent = "$";
        ct.append(todo);
        var productCount =  productCount + parseInt(localStorage.getItem(key))
        const cartelm = document.querySelector(".rounded-pill")
        cartelm.textContent = productCount
    }

}
productcart()
