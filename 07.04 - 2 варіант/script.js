let visits = JSON.parse(localStorage.getItem("visits")) || [];

let now = new Date();
visits.push(now.toLocaleString());

localStorage.setItem("visits", JSON.stringify(visits));

document.getElementById("count").textContent = visits.length;

function renderTable() {
    let table = document.getElementById("historyTable");
    table.innerHTML = "";

    for (let i = 0; i < visits.length; i++) {
        let row = `<tr>
            <td>${i + 1}</td>
            <td>${visits[i]}</td>
        </tr>`;
        table.innerHTML += row;
    }
}

renderTable();

document.getElementById("resetBtn").addEventListener("click", function () {
    localStorage.removeItem("visits");
    visits = [];
    document.getElementById("count").textContent = 0;
    renderTable();
});