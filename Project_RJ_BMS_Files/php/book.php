<?php
require_once 'db.php';

class Book {
    private $db;

    public function __construct() {
        $this->db = new DB();
    }


    public function getBookById($id) {
        $conn = $this->db->getConnection();
        $stmt = $conn->prepare("SELECT * FROM books WHERE BookID = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }



    public function addBook($title, $isbn10, $isbn13, $copyrightYear, $subcategoryID, $imprintID, $productionStatusID, $bindingTypeID, $trimSize, $pageCount, $description, $coverImage) {
        $conn = $this->db->getConnection();
        $sql = "INSERT INTO books (Title, ISBN10, ISBN13, CopyrightYear, SubcategoryID, ImprintID, ProductionStatusID, BindingTypeID, TrimSize, PageCountsEditorialEst, Description, CoverImage) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssiisisssss", $title, $isbn10, $isbn13, $copyrightYear, $subcategoryID, $imprintID, $productionStatusID, $bindingTypeID, $trimSize, $pageCount, $description, $coverImage);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }


    public function deleteBook($id) {
        $conn = $this->db->getConnection();
        $sql = "DELETE FROM books WHERE BookID = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    public function getBooks() {
        $conn = $this->db->getConnection();
        $stmt = $conn->prepare("SELECT * FROM books");
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }
}