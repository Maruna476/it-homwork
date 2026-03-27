let items = [];

function add() {
    let value = document.getElementById("inputItem").value.trim();
    if (value === "") {
        alert("Введіть текст");
        return;
    }

    // зберігаємо текст і дату
    items.push({text: value, date: new Date()});
    document.getElementById("inputItem").value = "";

    renderList();
}

function renderList() {
    let list = document.getElementById("list");
    list.innerHTML = "";

    let searchText = document.getElementById("search").value.toLowerCase();
    let filtered = items.filter(item => item.text.toLowerCase().includes(searchText));

    if (filtered.length === 0) {
        document.getElementById("message").innerText = "Нічого не знайдено";
    } else {
        document.getElementById("message").innerText = "";
    }

    filtered.forEach(function(item) {
        let li = document.createElement("li");
        li.innerHTML = item.text;

        li.onclick = function() {
            items = items.filter(i => i !== item);
            renderList();
        };

        list.appendChild(li);
    });
}

function filterList() {
    renderList();
}

function sortList() {
    let type = document.getElementById("sortType").value;
    if (type === "alpha") {
        items.sort((a, b) => a.text.localeCompare(b.text));
    } else if (type === "date") {
        items.sort((a, b) => a.date - b.date);
    }
    renderList();
}