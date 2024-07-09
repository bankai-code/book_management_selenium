<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['message'] = 'Please login for Access!!';
    header('Location: login.php');
    exit;
}
require_once 'book.php';

$book = new Book();

// Handle book addition
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['title'], $_POST['isbn10'], $_POST['isbn13'], $_POST['copyrightYear'], $_POST['subcategoryID'], $_POST['imprintID'], $_POST['productionStatusID'], $_POST['bindingTypeID'], $_POST['trimSize'], $_POST['pageCountsEditorialEst'], $_POST['coverImage'], $_POST['description'])) {
    $bookAdded = $book->addBook($_POST['title'], $_POST['isbn10'], $_POST['isbn13'], $_POST['copyrightYear'], $_POST['subcategoryID'], $_POST['imprintID'], $_POST['productionStatusID'], $_POST['bindingTypeID'], $_POST['trimSize'], $_POST['pageCountsEditorialEst'], $_POST['description'], $_POST['coverImage']);
    if ($bookAdded) {
        $_SESSION['message'] = 'Book added successfully!';
    } else {
        $_SESSION['message'] = 'Failed to add book!';
    }
}


// Handle book deletion
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_id'])) {
    $bookExists = $book->getBookById($_POST['delete_id']);

    if ($bookExists) {
        $bookDeleted = $book->deleteBook($_POST['delete_id']);
        if ($bookDeleted) {
            $_SESSION['message'] = 'Book deleted successfully!';
        } else {
            $_SESSION['message'] = 'Failed to delete book!';
        }
        $_SESSION['message'] = 'Book deleted successfully!';
    } else {
        $_SESSION['message'] = 'Book does not exist!';
    }
}


$books = $book->getBooks();
?>

<?php include 'header.php'; ?>

<div class="container">
    <?php if (isset($_SESSION['message'])): ?>
            <div class="alert alert-info">
                <?= $_SESSION['message'] ?>
            </div>
            <?php unset($_SESSION['message']); ?>
    <?php endif; ?>

    <div class="card">
        <div class="card-body">
            <h2 class="card-title text-center">Add Book</h2>
            <div id="alert" class="alert alert-danger" style="display: none;">
                Fields should not be empty
            </div>
            <form id="addBookForm" action="book-list.php" method="post" class="mb-4">
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" id="title" name="title" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="isbn10">ISBN-10:</label>
                    <input type="text" id="isbn10" name="isbn10" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="isbn13">ISBN-13:</label>
                    <input type="text" id="isbn13" name="isbn13" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="copyrightYear">Copyright Year:</label>
                    <input type="text" id="copyrightYear" name="copyrightYear" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="subcategoryID">Subcategory ID:</label>
                    <input type="text" id="subcategoryID" name="subcategoryID" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="imprintID">Imprint ID:</label>
                    <input type="text" id="imprintID" name="imprintID" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="productionStatusID">Production Status ID:</label>
                    <input type="text" id="productionStatusID" name="productionStatusID" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="bindingTypeID">Binding Type ID:</label>
                    <input type="text" id="bindingTypeID" name="bindingTypeID" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="trimSize">Trim Size:</label>
                    <input type="text" id="trimSize" name="trimSize" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="pageCountsEditorialEst">Page Counts Editorial Est:</label>
                    <input type="text" id="pageCountsEditorialEst" name="pageCountsEditorialEst" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <input type="text" id="description" name="description" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="coverImage">Cover Image:</label>
                    <input type="text" id="coverImage" name="coverImage" class="form-control" required>
                </div>



                <!-- Repeat the above div for each of your form fields -->
                <button type="submit" class="btn btn-primary btn-block">Add Book</button>
            </form>

            <script>
            document.getElementById('addBookForm').addEventListener('submit', function(event) {
                var title = document.getElementById('title').value;
                var isbn10 = document.getElementById('isbn10').value;
                var isbn13 = document.getElementById('isbn13').value;
                var copyrightYear = document.getElementById('copyrightYear').value;
                var subcategoryID = document.getElementById('subcategoryID').value;
                var imprintID = document.getElementById('imprintID').value;
                var productionStatusID = document.getElementById('productionStatusID').value;
                var bindingTypeID = document.getElementById('bindingTypeID').value;
                var trimSize = document.getElementById('trimSize').value;
                var pageCountsEditorialEst = document.getElementById('pageCountsEditorialEst').value;
                var description = document.getElementById('description').value;
                var coverImage = document.getElementById('coverImage').value;

                // Repeat the above line for each of your form fields

                if (title === '' || isbn10 === '' || isbn13 === '' || copyrightYear === '' || subcategoryID === '' || imprintID === '' || productionStatusID === '' || bindingTypeID === '' || trimSize === '' || pageCountsEditorialEst === '' || description === '' || coverImage === '') {
                    event.preventDefault();
                    document.getElementById('alert').style.display = 'block';
                }
            });
            </script>

            <h2 class="card-title text-center">Delete Book</h2>
            <form action="book-list.php" method="post" class="mb-4">
                <div class="form-group">
                    <label for="delete_id">Book ID:</label>
                    <input type="text" id="delete_id" name="delete_id" class="form-control">
                </div>
                <button type="submit" class="btn btn-danger btn-block">Delete Book</button>
            </form>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-body">
            <h2 class="card-title text-center">Available Books</h2>
            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <th style="word-wrap: break-word;">Book ID</th>
                        <th style="word-wrap: break-word;">Title</th>
                        <th style="word-wrap: break-word;">ISBN-10</th>
                        <th style="word-wrap: break-word;">ISBN-13</th>
                        <th style="word-wrap: break-word;">Copyright Year</th>
                        <th style="word-wrap: break-word;">Subcategory ID</th>
                        <th style="word-wrap: break-word;">Imprint ID</th>
                        <th style="word-wrap: break-word;">Production Status ID</th>
                        <th style="word-wrap: break-word;">Binding Type ID</th>
                        <th style="word-wrap: break-word;">Trim Size</th>
                        <th style="word-wrap: break-word;">Page Counts Editorial Est</th>
                        <th style="word-wrap: break-word;">Cover Image</th>
                    </tr>
                    <?php foreach($books as $book): ?>
                        <tr>
                            <td><?= $book["BookID"] ?></td>
                            <td><?= htmlspecialchars($book["Title"]) ?></td>
                            <td><?= $book["ISBN10"] ?></td>
                            <td><?= $book["ISBN13"] ?></td>
                            <td><?= $book["CopyrightYear"] ?></td>
                            <td><?= $book["SubcategoryID"] ?></td>
                            <td><?= $book["ImprintID"] ?></td>
                            <td><?= $book["ProductionStatusID"] ?></td>
                            <td><?= $book["BindingTypeID"] ?></td>
                            <td><?= $book["TrimSize"] ?></td>
                            <td><?= $book["PageCountsEditorialEst"] ?></td>
                            <td><?= $book["CoverImage"] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>

<?php include 'footer.php'; ?>