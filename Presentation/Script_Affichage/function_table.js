
function table_display_request(responseText, div) {
    let tableContainer = document.createElement('div');
    let JSON_res = JSON.parse(xhr.responseText);

    // Commencement de la table
    let table = document.createElement('table');
    table.classList.add('table', 'table-client');

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