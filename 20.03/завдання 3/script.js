let a = prompt("Введіть перше число:");
let b = prompt("Введіть друге число:");
let c = prompt("Введіть третє число:");

a = Number(a);
b = Number(b);
c = Number(c);

let max = a;
let min = a;

if (b > max) {
    max = b;
}
if (c > max) {
    max = c;
}

if (b < min) {
    min = b;
}
if (c < min) {
    min = c;
}

alert("Найбільше число: " + max);
alert("Найменше число: " + min);

if (a % 2 === 0 || b % 2 === 0 || c % 2 === 0) {
    alert("Є хоча б одне парне число");
} else {
    alert("Парних чисел немає");
}

if (a > b && b < c) {
    alert("true");
} else {
    alert("false");
}

let isPrime = true;

if (a <= 1) {
    isPrime = false;
} else {
    for (let i = 2; i < a; i++) {
        if (a % i === 0) {
            isPrime = false;
        }
    }
}

if (isPrime) {
    alert("Перше число є простим");
} else {
    alert("Перше число НЕ є простим");
}