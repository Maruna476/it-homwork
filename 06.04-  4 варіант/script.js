function fetchUser(userId) {
    return new Promise((resolve, reject) => {
        setTimeout(() => {
            if (!userId) {
                reject("Користувача не знайдено");
            } else {
                const user = {
                    id: userId,
                    name: "Іван"
                };
                console.log("Користувач отриманий:", user);
                resolve(user);
            }
        }, 2000);
    });
}

function fetchOrders(userId) {
    return new Promise((resolve, reject) => {
        fetchUser(userId)
            .then(user => {
                setTimeout(() => {
                    const orders = ["Замовлення 1", "Замовлення 2"];
                    console.log("Замовлення отримані:", orders);
                    resolve(orders);
                }, 3000);
            })
            .catch(error => {
                reject(error);
            });
    });
}

async function getUserWithOrders(userId) {
    try {
        const user = await fetchUser(userId);
        const orders = await fetchOrders(userId);

        console.log("Результат:");
        console.log("Користувач:", user);
        console.log("Замовлення:", orders);

    } catch (error) {
        console.log("Помилка:", error);
    }
}