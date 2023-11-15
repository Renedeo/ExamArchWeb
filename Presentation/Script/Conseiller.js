let xhr_conseiller = new XMLHttpRequest();
xhr_conseiller.onreadystatechange = function () {
    if (xhr_conseiller.readyState === 4 && xhr_conseiller.status === 200) {
        let res = xhr_conseiller.responseText;
        table_display_request(res, div_Conseiller, "conseiller");
    }
}
url = "../php/Conseiller.php";
xhr_conseiller.open('GET', url, true);
xhr_conseiller.send();

