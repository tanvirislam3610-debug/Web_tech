<?php

require_once "../config/db.php";
require_once "../models/BookModel.php";

function addBookController() {
    global $conn;

    $title = trim($_POST['title']);
    $author = trim($_POST['author']);
    $category = trim($_POST['category']);
    $status = trim($_POST['status']);

    if ($title == "" || $author == "" || $category == "" || $status == "") {
        return [
            "status" => "error",
            "message" => "All fields are required"
        ];
    }

    $result = insertBook($conn, $title, $author, $category, $status);

    if ($result) {
        return [
            "status" => "success",
            "message" => "Book added successfully"
        ];
    } else {
        return [
            "status" => "error",
            "message" => "Failed to add book"
        ];
    }
}

function getBooksController() {
    global $conn;

    $books = getAllBooks($conn);

    return [
        "status" => "success",
        "data" => $books
    ];
}

function getSingleBookController() {
    global $conn;

    $id = $_POST['id'];

    $book = getBookById($conn, $id);

    if ($book) {
        return [
            "status" => "success",
            "data" => $book
        ];
    } else {
        return [
            "status" => "error",
            "message" => "Book not found"
        ];
    }
}

function updateBookController() {
    global $conn;

    $id = $_POST['id'];
    $title = trim($_POST['title']);
    $author = trim($_POST['author']);
    $category = trim($_POST['category']);
    $status = trim($_POST['status']);

    if ($title == "" || $author == "" || $category == "" || $status == "") {
        return [
            "status" => "error",
            "message" => "All fields are required"
        ];
    }

    $result = updateBook($conn, $id, $title, $author, $category, $status);

    if ($result) {
        return [
            "status" => "success",
            "message" => "Book updated successfully"
        ];
    } else {
        return [
            "status" => "error",
            "message" => "Failed to update book"
        ];
    }
}

function deleteBookController() {
    global $conn;

    $id = $_POST['id'];

    $result = deleteBook($conn, $id);

    if ($result) {
        return [
            "status" => "success",
            "message" => "Book deleted successfully"
        ];
    } else {
        return [
            "status" => "error",
            "message" => "Failed to delete book"
        ];
    }
}

?>