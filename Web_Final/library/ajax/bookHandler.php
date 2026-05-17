<?php

header("Content-Type: application/json");

require_once "../controllers/BookController.php";

$action = $_POST['action'] ?? "";

if ($action == "addBook") {
    echo json_encode(addBookController());
}

else if ($action == "getBooks") {
    echo json_encode(getBooksController());
}

else if ($action == "getBook") {
    echo json_encode(getSingleBookController());
}

else if ($action == "updateBook") {
    echo json_encode(updateBookController());
}

else if ($action == "deleteBook") {
    echo json_encode(deleteBookController());
}

else {
    echo json_encode([
        "status" => "error",
        "message" => "Invalid request"
    ]);
}

?>