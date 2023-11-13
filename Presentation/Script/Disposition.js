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

div_selection_table = document.createElement('div');
h1_gestion_banque = document.createElement('h1');
arrow = document.createElement('span');
arrow.innerHTML = "&#9660"
arrow.className = 'arrow-down';

// Création des différentes categorie de la page
div_Clients = document.createElement('div');
div_Banques = document.createElement('div');
div_ComptesClient = document.createElement('div');
div_Transactions = document.createElement('div');

// Ajout de texte dans les différents elements initial
h1_gestion_banque.appendChild(document.createTextNode("Gestion Banque"));
div_Banques.appendChild(document.createTextNode("Banques"));
div_Clients.appendChild(document.createTextNode("Clients"));
div_ComptesClient.appendChild(document.createTextNode("All accounts"))
div_Transactions.appendChild(document.createTextNode("All Transactions"))

// Ajout des arrow 
div_Clients.appendChild(arrow);
div_Banques.appendChild(arrow.cloneNode(true));
div_ComptesClient.appendChild(arrow.cloneNode(true));
div_Transactions.appendChild(arrow.cloneNode(true));

// Background color 
div_selection_table.style.backgroundColor = 'red'
div_Clients.style.backgroundColor = 'green';
div_Banques.style.backgroundColor = 'blue';
div_ComptesClient.style.backgroundColor = 'yellow';
div_Transactions.style.backgroundColor = 'cyan';

// Definition des identifiants
div_selection_table.id = 'div_selection'
div_Clients.id = 'clients'
div_Banques.id = 'banque'
div_ComptesClient.id = 'compteclient'
div_Transactions.id = 'transaction'

div_Clients.className = 'sous_group_div_selection'
div_Banques.className = 'sous_group_div_selection'
div_ComptesClient.className = 'sous_group_div_selection'
div_Transactions.className = 'sous_group_div_selection'


div_selection_table.appendChild(h1_gestion_banque);
div_selection_table.appendChild(div_Clients);
div_selection_table.appendChild(div_Banques);
div_selection_table.appendChild(div_ComptesClient);
div_selection_table.appendChild(div_Transactions);

if (body.firstChild) {
    body.insertBefore(div_selection_table, body.firstChild)
}

let arrows = document.querySelectorAll('.arrow-down');

// Ajout des evenements au differentes div   
div_Clients.addEventListener("click", (e) => {
    if (div_Clients.style.backgroundColor == 'red') {
        div_Clients.style.backgroundColor = 'green';
        div_Clients.style.fontWeight = 'normal';
        arrows[0].style.transform = '';
    }
    else {
        div_Clients.style.backgroundColor = 'red';
        div_Clients.style.fontWeight = '900';
        arrows[0].style.transform = 'rotate(180deg)';

    }

})

div_Banques.addEventListener("click", (e) => {
    if (div_Banques.style.backgroundColor == 'red') {
        div_Banques.style.backgroundColor = 'blue';
        div_Banques.style.fontWeight = 'normal';
        arrows[1].style.transform = '';
    }
    else {

        div_Banques.style.backgroundColor = 'red';
        div_Banques.style.fontWeight = '900';
        arrows[1].style.transform = 'rotate(180deg)';
    }
})

div_ComptesClient.addEventListener("click", () => {
    if (div_ComptesClient.style.backgroundColor == 'red') {
        div_ComptesClient.style.backgroundColor = 'yellow';
        div_ComptesClient.style.fontWeight = 'normal';
        arrows[2].style.transform = '';
    }
    else {
        div_ComptesClient.style.backgroundColor = 'red';
        div_ComptesClient.style.fontWeight = '900';
        div_ComptesClient.style.fontWeight = '900';
        arrows[2].style.transform = 'rotate(180deg)';
    }

})

div_Transactions.addEventListener("click", () => {
    if (div_Transactions.style.backgroundColor == 'red') {
        div_Transactions.style.backgroundColor = 'cyan';
        div_Transactions.style.fontWeight = 'normal';
        arrows[3].style.transform = 'none';
    }
    else {

        div_Transactions.style.backgroundColor = 'red';
        div_Transactions.style.fontWeight = '900';
        arrows[3].style.transform = 'rotate(180deg)';
    }

})