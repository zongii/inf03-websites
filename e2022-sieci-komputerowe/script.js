let columns = document.getElementsByClassName("productCount");
let products = document.getElementsByClassName("productName");

let idZamowienia = 0;

updateTable()


function updateHandle(id) {
    let value = prompt("Podaj nową ilość");
    columns[id].innerText = value
    updateTable()
}

function orderHandle(id) {
    idZamowienia++;
    alert(`
        Zamówienie nr: ${idZamowienia}
        Produkt: ${products[id].innerText}
    `)
}


function updateTable() {
    for(let i = 0; i < columns.length; i++) {
        let value = columns[i].innerText

        if (value == 0) {
            columns[i].style.backgroundColor = "red";
            continue
        }

        if (value >= 1 && value <= 5) {
            columns[i].style.backgroundColor = "yellow";
            continue
        }

        columns[i].style.backgroundColor = "honeydew";
    }
}