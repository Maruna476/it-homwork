let a = prompt("Введіть перше число:");
let b = prompt("Введіть друге число:");
let c = prompt("Введіть третє число:");

a = Number(a);
b = Number(b);
c = Number(c);

let average = (a + b + c) / 3;
alert("Середнє арифметичне: " + average);

let absA = Math.abs(a); 
let ceilB = Math.ceil(b); 
let floorC = Math.floor(c); 
let power = Math.pow(a, 2); 

alert("Модуль першого числа: " + absA);
alert("Округлення другого вверх: " + ceilB);
alert("Округлення третього вниз: " + floorC);
alert("Перше число в квадраті: " + power);

if (average % 5 === 0) {
    alert("Середнє ділиться на 5 без остачі");
} else {
    alert("Середнє НЕ ділиться на 5");
}

if (average % 7 === 0) {
    alert("Середнє ділиться на 7 без остачі");
} else {
    alert("Середнє НЕ ділиться на 7");
}

if (a + b > c && a + c > b && b + c > a) {
    alert("Такий трикутник може існувати");
} else {
    alert("Такий трикутник НЕ може існувати");
}