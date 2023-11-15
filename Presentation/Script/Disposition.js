body = document.body;

let div_selection_table = document.createElement("div");
let h1_gestion_banque = document.createElement("h1");
let arrow = document.createElement("span");
arrow.innerHTML = "&#9660";
arrow.className = "arrow-down";

// Création des différentes catégories de la page
let div_Clients = document.createElement("div");
let div_Banques = document.createElement("div");
let div_ComptesClient = document.createElement("div");
let div_Transactions = document.createElement("div");

// Ajout des entete des sections
let Banques = document.createElement("div");
let Clients = document.createElement("div");
let ComptesClient = document.createElement("div");
let Transactions = document.createElement("div");

// Ajout de texte dans les différents éléments initiaux
h1_gestion_banque.appendChild(document.createTextNode("Gestion Banque"));
Banques.appendChild(document.createTextNode("Banques"));
Clients.appendChild(document.createTextNode("Clients"));
ComptesClient.appendChild(document.createTextNode("All accounts"));
Transactions.appendChild(document.createTextNode("All Transactions"));

// Ajout des flèches
Clients.appendChild(arrow);
Banques.appendChild(arrow.cloneNode(true));
ComptesClient.appendChild(arrow.cloneNode(true));
Transactions.appendChild(arrow.cloneNode(true));

// Ajout des différentes sections
div_Clients.appendChild(Clients);
div_Banques.appendChild(Banques)
div_ComptesClient.appendChild(ComptesClient)
div_Transactions.appendChild(Transactions)

// Définition des identifiants
div_selection_table.id = "div_selection";
div_Clients.id = "div-clients";
div_Banques.id = "div-banque";
div_ComptesClient.id = "div-compteclient";
div_Transactions.id = "div-transaction";

Clients.id = "clients";
Banques.id = "banque";
ComptesClient.id = "compteclient";
Transactions.id = "transaction";



if (body.firstChild) {
    body.insertBefore(div_selection_table, body.firstChild);
}

// let arrows = document.querySelectorAll(".arrow-down");
let config = {
    "div-clients": {
        "background-color": "white",
    },
    "div-banque": {
        "background-color": "skyblue",
    },
    "div-compteclient": {
        "background-color": "yellow",
    },
    "div-transaction": {
        "background-color": "cyan",
    },
    "general": {
        backgroundColorDefault: "white",
        div_sectionDefault: "gray",
        div_sectionDefaultClassName: "sous_group_div_selection",
        sectionDefaultClassName: "group_div_selection",
    },
};

// Définition des classes
div_Clients.className = config["general"]["div_sectionDefaultClassName"];
div_Banques.className = config["general"]["div_sectionDefaultClassName"];
div_ComptesClient.className = config["general"]["div_sectionDefaultClassName"];
div_Transactions.className = config["general"]["div_sectionDefaultClassName"];

Clients.className = config["general"]["sectionDefaultClassName"];
Banques.className = config["general"]["sectionDefaultClassName"];
ComptesClient.className = config["general"]["sectionDefaultClassName"];
Transactions.className = config["general"]["sectionDefaultClassName"];

// // Initialisation de la couleur de fond
div_selection_table.style.backgroundColor = config["general"]["backgroundColorDefault"];
div_Clients.style.backgroundColor = config["general"]["div_sectionDefault"];
div_Banques.style.backgroundColor = config["general"]["div_sectionDefault"];
div_ComptesClient.style.backgroundColor = config["general"]["div_sectionDefault"];
div_Transactions.style.backgroundColor = config["general"]["div_sectionDefault"];

div_selection_table.appendChild(h1_gestion_banque);
div_selection_table.appendChild(div_Clients);
div_selection_table.appendChild(div_Banques);
div_selection_table.appendChild(div_ComptesClient);
div_selection_table.appendChild(div_Transactions);

// // Liste des différentes sections de la gestion des banques
let div_section = Array.from(
    document.getElementsByClassName(
        config["general"]["sectionDefaultClassName"]
    )
);

// Case à cocher pour desactiver la fonctionnalité de cacher les éléments
let input_div = document.createElement("div");
let input_checkbox = document.createElement("input");
input_checkbox.type = "checkbox";
input_checkbox.name = 'input-checkbox';
input_checkbox.id = 'input-checkbox';
input_checkbox.classList.add('input-check')

let input_checkbox_label = document.createElement('label')
input_checkbox_label.setAttribute('for', input_checkbox.id);
input_checkbox_label.textContent = "Désactivation de hide_section";

input_div.appendChild(input_checkbox)
input_div.appendChild(input_checkbox_label)
body.insertBefore(input_div, div_selection_table.nextSibling);



div_section.forEach((element) => {
    element.addEventListener("click", function (event) {
        if (
            element.parentNode.style.backgroundColor == config["general"]["div_sectionDefault"]
        ) {

            hide_section(div_section, element.id)
            element.style.borderBottom = `2px solid aquamarine`;
            element.parentNode.style.backgroundColor = config[element.parentNode.id]["background-color"];
            element.style.fontWeight = "900";
            element.firstChild.nextSibling.style.transform = 'rotate(0deg)';

            let table_container = element.parentNode.querySelector(".table-container");
            table_container.style.display = "block"


        } else {

            element.style.borderBottom = "none";
            element.parentNode.style.backgroundColor =
                config["general"]["div_sectionDefault"];
            element.style.fontWeight = 'normal';

            element.firstChild.nextSibling.style.transform = "rotate(180deg)";
            let table_container = element.parentNode.querySelector(".table-container");
            table_container.style.display = "none"
        }
    });
});


document.addEventListener("DOMContentLoaded", function(){
    // Cacher les informations des clients et les afficher au clic
let nom_clients = Array.from(document.getElementsByClassName('client-name'));
    console.log(nom_clients)
})