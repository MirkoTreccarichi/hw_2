/* NEWSAPI   */

let url = NEWS_API_ROUTE;
console.log(url);
let req = new Request(encodeURI(url));

function onResponse(response) {
    console.log('Risposta ricevuta');
    return response.json();
}


function onJson(json) {



    const arts = json.articles;

    const section = document.querySelector("#apiNews")


    for (let i = 0; i < 6; i++) {

        const art = arts[i];
        //instantiation of the hmtl elements
        const contanier = document.createElement("div");
        const title = document.createElement("h2");
        const img = document.createElement("img");
        const description = document.createElement("p");
        const source = document.createElement("a");


        //initialization and class assignment
        title.textContent = art.title;
        img.src = art.urlToImage;
        description.textContent = art.description;
        source.href = art.url;
        source.textContent = "vai alla fonte";

        contanier.appendChild(title);
        contanier.appendChild(img);
        contanier.appendChild(description);
        contanier.appendChild(source);

        //append of the elementContainer
        section.appendChild(contanier);



    }

    console.log(json);
}


fetch(req).then(onResponse).then(onJson);




/* FINNHUB API */

//fetch

const symbols = ['JNJ', 'PG'];

url = COMP_API_ROUTE;

for (let symb of symbols) {

    const url2 = url + /*'symbol='*/ '='+ symb;
    const req = new Request(url2);
    fetch(req).then(onResponseFinhub).then(onJsonFH);
}


//Finance dets constructor

function FinHubObj(name_, logo_, url_) {
    this.name = name_;
    this.logo = logo_;
    this.url = url_;
}

//Response Management

function onResponseFinhub(resp) {
    return resp.json();
}


function onJsonFH(json) {
    const section = document.querySelector("#apiFinnhub");

    const js = Object.entries(json);
    const finhub = new FinHubObj(js[7][1], js[5][1], js[11][1]);

    const container = document.createElement("div");
    const name = document.createElement("h3");
    const logo = document.createElement("img");
    const weblink = document.createElement("a");

    name.textContent = finhub.name;
    logo.src = finhub.logo;

    weblink.href = finhub.url;
    weblink.target = "_blank";
    weblink.textContent = "Link";


    container.appendChild(logo);
    container.appendChild(name);
    container.appendChild(weblink);

    section.append(container);

    console.log(json);
}
