let xhr_transaction = new XMLHttpRequest();
xhr_transaction.onreadystatechange = function () {
    if (xhr_transaction.readyState === 4 && xhr_transaction.status === 200) {
        let res = xhr_transaction.responseText;
        table_display_request(res, div_Transactions, "transaction");
    }
}
url = "../php/Transactions.php";
xhr_transaction.open('GET', url, true);
xhr_transaction.send();

