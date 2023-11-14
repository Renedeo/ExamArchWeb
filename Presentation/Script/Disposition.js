// let url = "../php/Client.php";

// let xhr = new XMLHttpRequest();
// xhr.onreadystatechange = function () {
//   if (xhr.readyState === 4 && xhr.status === 200) {
//     // console.log(xhr.responseText);
//     console.log(JSON.parse(xhr.responseText));
//   } else {
//     console.log(xhr.readyState);
//   }
// };

// xhr.open("GET", url);
// // xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
// xhr.send();

body = document.body;

div_selection_table = document.createElement("div");
h1_gestion_banque = document.createElement("h1");
arrow = document.createElement("span");
arrow.innerHTML = "&#9660";
arrow.className = "arrow-down";

// Création des différentes categorie de la page
div_Clients = document.createElement("div");
div_Banques = document.createElement("div");
div_ComptesClient = document.createElement("div");
div_Transactions = document.createElement("div");

// Ajout de texte dans les différents elements initial
h1_gestion_banque.appendChild(document.createTextNode("Gestion Banque"));
div_Banques.appendChild(document.createTextNode("Banques"));
div_Clients.appendChild(document.createTextNode("Clients"));
div_ComptesClient.appendChild(document.createTextNode("All accounts"));
div_Transactions.appendChild(document.createTextNode("All Transactions"));

// Ajout des arrow
div_Clients.appendChild(arrow);
div_Banques.appendChild(arrow.cloneNode(true));
div_ComptesClient.appendChild(arrow.cloneNode(true));
div_Transactions.appendChild(arrow.cloneNode(true));

// Definition des identifiants
div_selection_table.id = "div_selection";
div_Clients.id = "clients";
div_Banques.id = "banque";
div_ComptesClient.id = "compteclient";
div_Transactions.id = "transaction";

div_selection_table.appendChild(h1_gestion_banque);
div_selection_table.appendChild(div_Clients);
div_selection_table.appendChild(div_Banques);
div_selection_table.appendChild(div_ComptesClient);
div_selection_table.appendChild(div_Transactions);

if (body.firstChild) {
    body.insertBefore(div_selection_table, body.firstChild);
}

let arrows = document.querySelectorAll(".arrow-down");
let config = {
    clients: {
        "background-color": "green",
    },
    banque: {
        "background-color": "blue",
    },
    compteclient: {
        "background-color": "yellow",
    },
    transaction: {
        "background-color": "cyan",
    },
    general: {
        backgroundColorDefault: "white",
        div_sectionDefault: "gray",
        div_sectionDefaultClassName: "sous_group_div_selection",
    },
};

// Definition des classes
div_Clients.className = config["general"]["div_sectionDefaultClassName"];
div_Banques.className = config["general"]["div_sectionDefaultClassName"];
div_ComptesClient.className = config["general"]["div_sectionDefaultClassName"];
div_Transactions.className = config["general"]["div_sectionDefaultClassName"];

// Initialisation Background color
div_selection_table.style.backgroundColor =
    config["general"]["backgroundColorDefault"];
div_Clients.style.backgroundColor = config["general"]["div_sectionDefault"];
div_Banques.style.backgroundColor = config["general"]["div_sectionDefault"];
div_ComptesClient.style.backgroundColor =
    config["general"]["div_sectionDefault"];
div_Transactions.style.backgroundColor =
    config["general"]["div_sectionDefault"];

// Liste des différentes sections de la gestion des banque
div_section = Array.from(
    document.getElementsByClassName(
        config["general"]["div_sectionDefaultClassName"]
    )
);

function hide_section(section, id) {
    div_section = Array.from(
        document.getElementsByClassName(
            config["general"]["div_sectionDefaultClassName"]
        )
    );
    div_section.forEach(element => {
        if (element.id != id) {
            element.style.backgroundColor =
                config["general"]["div_sectionDefault"];
            element.style.fontWeight = 'normal';

            element.firstChild.nextSibling.style.transform = "rotate(180deg)";

            table_container = element.querySelector(".table-container");
            table_container.style.display = "none"
        }

    });
}




div_section.forEach((element) => {
    element.addEventListener("click", function (event) {
        if (
            element.style.backgroundColor == config["general"]["div_sectionDefault"]
        ) {
            hide_section(div_section, element.id)
            element.style.backgroundColor = config[element.id]["background-color"];
            element.style.fontWeight = "900";
            element.firstChild.nextSibling.style.transform = 'rotate(0deg)';

            table_container = element.querySelector(".table-container");
            table_container.style.display = "block"


        } else {

            element.style.backgroundColor =
                config["general"]["div_sectionDefault"];
            element.style.fontWeight = 'normal';

            element.firstChild.nextSibling.style.transform = "rotate(180deg)";
            table_container = element.querySelector(".table-container");
            table_container.style.display = "none"
        }
    });
});
