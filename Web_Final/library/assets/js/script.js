document.addEventListener("DOMContentLoaded", function () {
    loadBooks();

    document.getElementById("bookForm").addEventListener("submit", function (e) {
        e.preventDefault();

        let bookId = document.getElementById("book_id").value;
        let formData = new FormData(this);

        if (bookId === "") {
            formData.append("action", "addBook");
        } else {
            formData.append("action", "updateBook");
        }

        fetch("../ajax/bookHandler.php", {
            method: "POST",
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            showMessage(data.message, data.status);

            if (data.status === "success") {
                resetForm();
                loadBooks();
            }
        });
    });

    document.getElementById("resetBtn").addEventListener("click", function () {
        resetForm();
    });
});

function loadBooks() {
    let formData = new FormData();
    formData.append("action", "getBooks");

    fetch("../ajax/bookHandler.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        let tableBody = document.getElementById("bookTableBody");
        tableBody.innerHTML = "";

        if (data.status === "success") {
            data.data.forEach(function (book) {
                tableBody.innerHTML += `
                    <tr>
                        <td>${book.id}</td>
                        <td>${escapeHtml(book.title)}</td>
                        <td>${escapeHtml(book.author)}</td>
                        <td>${escapeHtml(book.category)}</td>
                        <td>${escapeHtml(book.status)}</td>
                        <td>
                            <button class="edit-btn" onclick="editBook(${book.id})">Edit</button>
                            <button class="delete-btn" onclick="deleteBook(${book.id})">Delete</button>
                        </td>
                    </tr>
                `;
            });
        }
    });
}

function editBook(id) {
    let formData = new FormData();
    formData.append("action", "getBook");
    formData.append("id", id);

    fetch("../ajax/bookHandler.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === "success") {
            document.getElementById("book_id").value = data.data.id;
            document.getElementById("title").value = data.data.title;
            document.getElementById("author").value = data.data.author;
            document.getElementById("category").value = data.data.category;
            document.getElementById("status").value = data.data.status;

            document.getElementById("submitBtn").innerText = "Update Book";
        }
    });
}

function deleteBook(id) {
    let confirmDelete = confirm("Are you sure you want to delete this book?");

    if (!confirmDelete) {
        return;
    }

    let formData = new FormData();
    formData.append("action", "deleteBook");
    formData.append("id", id);

    fetch("../ajax/bookHandler.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        showMessage(data.message, data.status);

        if (data.status === "success") {
            loadBooks();
        }
    });
}

function resetForm() {
    document.getElementById("bookForm").reset();
    document.getElementById("book_id").value = "";
    document.getElementById("submitBtn").innerText = "Add Book";
}

function showMessage(message, status) {
    let messageBox = document.getElementById("message");
    messageBox.innerText = message;

    if (status === "success") {
        messageBox.style.color = "green";
    } else {
        messageBox.style.color = "red";
    }
}

function escapeHtml(text) {
    let div = document.createElement("div");
    div.innerText = text;
    return div.innerHTML;
}