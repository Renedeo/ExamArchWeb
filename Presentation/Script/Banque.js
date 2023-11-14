let xhr_banque = new XMLHttpRequest();
xhr_banque.onreadystatechange = function () {
    if (xhr_banque.readyState === 4 && xhr_banque.status === 200) {
        let res = xhr_banque.responseText;
        table_display_request(res, div_Banques, "Banque");
    }
}
url = "../php/Banque.php";
xhr_banque.open('GET', url, true);
xhr_banque.send();

