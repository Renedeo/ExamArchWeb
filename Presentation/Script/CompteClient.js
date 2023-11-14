let xhr_compte = new XMLHttpRequest();
xhr_compte.onreadystatechange = function () {
    if (xhr_compte.readyState === 4 && xhr_compte.status === 200) {
        let res = xhr_compte.responseText;
        table_display_request(res, div_ComptesClient, "comptes");
    }
}
url = "../php/CompteClient.php";
xhr_compte.open('GET', url, true);
xhr_compte.send();

