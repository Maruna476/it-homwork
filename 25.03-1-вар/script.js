let numbers = [12, 5, 8, 20, 3, 15, 7];

let sum = 0;
for (let i = 0; i < numbers.length; i++) {
    sum += numbers[i];
}

let average = sum / numbers.length;

let max = numbers[0];
let min = numbers[0];

for (let i = 1; i < numbers.length; i++) {
    if (numbers[i] > max) max = numbers[i];
    if (numbers[i] < min) min = numbers[i];
}

numbers.sort((a, b) => a - b);

console.log("Масив:", numbers);
console.log("Середнє значення:", average);
console.log("Максимальне:", max);
console.log("Мінімальне:", min);