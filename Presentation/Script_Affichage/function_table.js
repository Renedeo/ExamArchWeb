
/**
 * Céer une division contenant une table dans la page html
 * en lui assignant la classe passer en argument avec le format à la 'table-'+classe_arg
 * 
 * @param {object} responseText Reponse xhr
 * @param {object} div Element d'insertion de la table 
 * @param {string} table_class classe à attribuer à la table
 */
function table_display_request(responseText, div, table_class="") {
    let tableContainer = document.createElement('div');
    tableContainer.classList.add('table-container');
    let JSON_res = JSON.parse(responseText);

    // Commencement de la table
    let table = document.createElement('table');
    table.classList.add('table', 'table-' + table_class);

    // Definition de la ligne d'en-tête
    let thead = document.createElement('thead');
    let headerRow = document.createElement('tr');

    for (const key in JSON_res[0]) {
        let th = document.createElement('th');
        th.textContent = key;
        headerRow.appendChild(th);
    }

    thead.appendChild(headerRow);
    table.appendChild(thead);

    // Definition du corps de la table
    let tbody = document.createElement('tbody');

    for (let index = 0; index < JSON_res.length; index++) {
        const client = JSON_res[index];

        // Definition des différentes lignes 
        let row = document.createElement('tr');
        for (const key in client) {
            let td = document.createElement('td');
            td.textContent = client[key];
            row.appendChild(td);
        }
        tbody.appendChild(row);
    }

    table.appendChild(tbody);

    tableContainer.appendChild(table);
    div.appendChild(tableContainer);
}