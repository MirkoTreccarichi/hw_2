function initialize(json, chs) {

    //initialize contents
    const gridContainer = document.querySelector(".choices .grid")

    const products = Object.entries(json);
    let choices
    if (chs !== null)
        choices = Object.entries(chs);

    console.log(chs);
    for (let product of products) {
        //instantiation of the elements
        product = product[1];
        const container = document.createElement("div");
        const title = document.createElement("div");
        const img = document.createElement("img");
        const name = document.createElement("h3");
        const button_ = document.createElement("img");
        const price = document.createElement("p");
        const input = document.createElement("input");
        const label = document.createElement("label");

        //initialization and class assignment
        img.src = product.src;
        price.textContent = product.price + "€";
        name.textContent = product.producer + " " + product.name;
        button_.src = "img/prodotti/outline_shopping_cart_empty_48dp.png";
        input.type = "number";
        input.id = "quantity " + name.textContent;
        input.max = "100";
        input.min = "1";
        input.value = 1;
        container.setAttribute("data-code", product.code);
        label.for = "quantity " + name.textContent;
        label.textContent = "Quantità "

        container.classList.add("productContainer");
        title.classList.add("titleproductContainer");
        button_.classList.add("button");

        //construction of the elements container

        title.appendChild(name);
        title.appendChild(button_);
        container.appendChild(title);
        container.appendChild(img);
        container.appendChild(price);
        container.appendChild(label);
        container.appendChild(input);


        //assignment of EventListeners to the elements
        button_.addEventListener("click", onClickChoosed);

        gridContainer.appendChild(container);
        //console.log(container);

        if (choices)
            choices.forEach(function(item, index, array) {
                if (item[1] === container.dataset.code)
                    isChoosed(container);
            })

    }

}

function onClickNotChoosed(event) {
    //remove element from choosen
    const favorite = event.currentTarget.parentElement.parentElement;
    const imgButton = favorite.querySelector("img.button");

    //changing the button and the listener before the shifting
    imgButton.src = "img/prodotti/outline_shopping_cart_empty_48dp.png";
    imgButton.removeEventListener("click", onClickNotChoosed);
    imgButton.addEventListener("click", onClickChoosed);

    removeFromChoosed(favorite);
}

function onClickChoosed(event) {
    //add element into choosen
    const favorite = event.currentTarget.parentElement.parentElement;
    const imgButton = favorite.querySelector("img.button");

    //changing the button and the listener before the shifting
    imgButton.src = "img/prodotti/outline_shopping_cart_full_48dp.png";
    imgButton.removeEventListener("click", onClickChoosed);
    imgButton.addEventListener("click", onClickNotChoosed);

    addChoosed(favorite);

}

function addChoosed(favorite) {
    //the function change the position of the element selected, from the choices
    //  to the chosen
    const divFav = document.querySelector("div.choosen");

    if (productInList === 0)
        divFav.classList.remove("hidden");

    divFav.querySelector(".choosen .grid").appendChild(favorite);
    //change the Favorite-counter value
    productInList += 1;
    fetchChoices("update");
}

function removeFromChoosed(favorite) {
    //the function change the position of the element selected, from the chosen
    //  to the choices
    const divFav = document.querySelector("div.choosen");
    const divChoices = document.querySelector("div.choices .grid");


    divChoices.appendChild(favorite);
    //change the Favorite-counter value
    productInList -= 1;

    //control the amount of the chosen
    if (productInList === 0)
        divFav.classList.add("hidden");
    fetchChoices("update");
}


function search(event) {
    //search in to the database the product name typed
    const key = event.currentTarget.value.toLowerCase();

    const elements = document.querySelectorAll(".productContainer");


    const params = new URLSearchParams();
    params.append("query", key);

    if (key)
    //search into the database
        fetch("cerca_prodotti?" + params.toString())
        .then(promise => promise.json())
        .then(json => {
            for (const elem of elements) {
                if (!json.length)
                    elem.classList.add("hidden");
                else
                    for (const res of json) {
                        if (elem.dataset.code !== res['code'])
                            elem.classList.add("hidden");
                        else
                        if (elem.classList.contains("hidden")) {
                            elem.classList.remove("hidden");
                            break;
                        }
                        else
                            break;

                    }

            }
        })
    else
        for (const elem of elements) {
            if (elem.classList.contains("hidden"))
                elem.classList.remove("hidden");
        }

}


function deleteList(event){
    const elements = document.querySelectorAll('ul');
    for (const element of elements) {
        element.remove();
    }

    fetch('elimina_lista');

    document.querySelector('div.list').classList.add('hidden');
}

//assignment of the event listener to the HTML-input element
document.querySelector(".choices input").addEventListener("change", search);

//chosen-counter variable
let productInList = 0;

//initialization of the poster section


function fetchChoices(option) {
    const productInList = document.querySelectorAll(".choosen .productContainer");

    const params = new URLSearchParams();

    //get the chosen products
    if (option === "update") {
        let i = 0;
        if (productInList.length !== 0)
            for (const element of productInList)
                params.append("prodotto" + i++, element.dataset.code);
        else
            params.append("prodotto" + i++, null);


    }

    //retrieve chosen products
    fetch("lista_prodotti?" + params.toString())
        .then(response => response.json()).then(json => {
            //console.log(json);
            const prods = json;
            if (!option)
            //fetch products info from db
                fetch("carica_prodotti").then(response => response.json()).then(json => {
                console.log(json);
                initialize(json, prods);
            });
        });

}

function isChoosed(favorite) {
    const imgButton = favorite.querySelector("img.button");

    //changing the button and the listener before the shifting
    imgButton.src = "img/prodotti/outline_shopping_cart_full_48dp.png";
    imgButton.removeEventListener("click", onClickChoosed);
    imgButton.addEventListener("click", onClickNotChoosed);

    addChoosed(favorite);
}

//fetch products and cookie
fetchChoices();

//assignment of the event listener to the HTML-input element
document.querySelector("input").addEventListener("click", save);
document.querySelector("img.trashcan").addEventListener("click", deleteList);

//save the user list
function save(event) {

    const productInList = document.querySelectorAll(".choosen .productContainer");

    const params = new URLSearchParams();

    for (const element of productInList) {
        params.append("codice_prodotto", element.dataset.code);
        params.append("quantita", element.querySelector("input").value);

        fetch("salva_lista?" + params.toString())
            .then(response => response.json())
            .then(json => {
                if (!json)
                    console.log("errore");
                else
                    location.reload()
            });

    }

    //porting a laravel
    fetch("lista_prodotti");


}
