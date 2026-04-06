function getRandomNumber() {
    return new Promise((resolve, reject) => {
        setTimeout(() => {
            let num = Math.floor(Math.random() * 100) + 1;
            console.log("Згенероване число:", num);
            resolve(num);
        }, 1000);
    });
}

async function processNumber() {
    try {
        let number = await getRandomNumber();

        if (number < 50) {
            return Promise.resolve(number + 20);
        } else {
            return Promise.reject("Занадто велике число!");
        }

    } catch (error) {
        console.log("Помилка:", error);
        return "Оброблено помилку";
    }
}

processNumber().then(result => {
    console.log("Результат:", result);
});