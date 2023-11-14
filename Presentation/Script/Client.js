let xhr = new XMLHttpRequest();

xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
        let res = xhr.responseText;
        table_display_request(res, div_Clients);
    }
}
url = "../php/Client.php";
xhr.open('GET', url, true);
xhr.send();

