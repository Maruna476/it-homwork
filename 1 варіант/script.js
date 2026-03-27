let input = document.getElementById("inputValue");
let addBtn = document.getElementById("addBtn");
let sortBtn = document.getElementById("sortBtn");
let list = document.getElementById("list");

addBtn.addEventListener("click", function() {
    let value = input.value.trim();

    if (value === "") {
        alert("яблуко");
        return;
    }

    let li = document.createElement("li");
    li.textContent = value;

    li.addEventListener("click", function() {
        list.removeChild(li);
    });

    list.appendChild(li);
    input.value = "";
});

sortBtn.addEventListener("click", function() {
    let items = Array.from(list.getElementsByTagName("li"));

    items.sort(function(a, b) {
        return a.textContent.localeCompare(b.textContent);
    });

    list.innerHTML = "";

    items.forEach(function(item) {
        list.appendChild(item);
    });
});

input.addEventListener("keydown", function(event) {
    if (event.key === "Enter") {
        addBtn.click();
    }
});