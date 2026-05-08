<?php

header("Content-Type: application/json");

$file = "tasks.json";
$tasks = json_decode(file_get_contents($file), true);

if (!$tasks) {
    $tasks = [];
}

$method = $_SERVER['REQUEST_METHOD'];
$request = explode('/', trim($_SERVER['PATH_INFO'] ?? '', '/'));

// id (якщо є)
$id = isset($request[1]) ? (int)$request[1] : null;


if ($method === "GET") {

    if ($id) {
        foreach ($tasks as $task) {
            if ($task['id'] === $id) {
                echo json_encode($task);
                exit;
            }
        }

        http_response_code(404);
        echo json_encode(["message" => "Task not found"]);
        exit;
    }

    echo json_encode($tasks);
}


if ($method === "POST") {

    $data = json_decode(file_get_contents("php://input"), true);

    $newTask = [
        "id" => count($tasks) + 1,
        "task" => $data["task"] ?? "",
        "completed" => false
    ];

    $tasks[] = $newTask;

    file_put_contents($file, json_encode($tasks, JSON_PRETTY_PRINT));

    echo json_encode($newTask);
}


if ($method === "PUT") {

    if (!$id) {
        http_response_code(400);
        echo json_encode(["message" => "ID is required"]);
        exit;
    }

    $data = json_decode(file_get_contents("php://input"), true);

    foreach ($tasks as &$task) {
        if ($task['id'] === $id) {

            if (isset($data["task"])) {
                $task["task"] = $data["task"];
            }

            if (isset($data["completed"])) {
                $task["completed"] = $data["completed"];
            }

            file_put_contents($file, json_encode($tasks, JSON_PRETTY_PRINT));

            echo json_encode($task);
            exit;
        }
    }

    http_response_code(404);
    echo json_encode(["message" => "Task not found"]);
}

if ($method === "DELETE") {

    if (!$id) {
        http_response_code(400);
        echo json_encode(["message" => "ID is required"]);
        exit;
    }

    foreach ($tasks as $index => $task) {
        if ($task['id'] === $id) {

            array_splice($tasks, $index, 1);

            file_put_contents($file, json_encode($tasks, JSON_PRETTY_PRINT));

            echo json_encode(["message" => "Task deleted"]);
            exit;
        }
    }

    http_response_code(404);
    echo json_encode(["message" => "Task not found"]);
}