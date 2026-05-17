<!DOCTYPE html>
<html>
<head>
    <title>University Library Management System</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

    <div class="container">
        <h2>University Library Management System</h2>

        <form id="bookForm">
            <input type="hidden" id="book_id" name="id">

            <div class="form-group">
                <label>Book Title</label>
                <input type="text" id="title" name="title" placeholder="Enter book title">
            </div>

            <div class="form-group">
                <label>Author Name</label>
                <input type="text" id="author" name="author" placeholder="Enter author name">
            </div>

            <div class="form-group">
                <label>Category</label>
                <input type="text" id="category" name="category" placeholder="Enter category">
            </div>

            <div class="form-group">
                <label>Availability Status</label>
                <select id="status" name="status">
                    <option value="Available">Available</option>
                    <option value="Borrowed">Borrowed</option>
                </select>
            </div>

            <button type="submit" id="submitBtn">Add Book</button>
            <button type="button" id="resetBtn">Reset</button>
        </form>

        <p id="message"></p>

        <h3>Book Records</h3>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Book Title</th>
                    <th>Author</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody id="bookTableBody">
                
            </tbody>
        </table>
    </div>

    <script src="../assets/js/script.js"></script>

</body>
</html>