# book_management_selenium
# Book Management Web Application

## Introduction
This web-based book management system provides user authentication and book management functionalities, including adding, viewing, and deleting books.

## System Structure
- Hosting: XAMPP for macOS (localhost)
- Database: MySQL/MariaDB (using 'book' database)
- Frontend: Bootstrap, CSS, and JavaScript
- Testing: Selenium IDE for recording test cases, Python script for running tests via terminal

## Features
Users can:
1. Log in and log out of the application
2. View a list of all books in the database
3. Add new books to the database
4. Delete books from the database

## Functional Requirements

### User Authentication
1. **Login**: Users can log in using a username and password. Credentials are validated against the database. Incorrect credentials display an error message.
2. **Logout**: Users can log out, terminating the session and redirecting to the login page.

### Book Management
1. **Display Books**: After login, users see a list of all books in the database.
2. **Add Book**: Authorized users can add new books using a form. Required fields:
   - Title
   - ISBN-10
   - ISBN-13
   - Copyright year
   - Subcategory ID
   - Imprint ID
   - Production status ID
   - Binding type ID
   - Trim size
   - Page counts editorial estimate
   - Description
   - Cover image
3. **Delete Book**: Users can delete books from the database. Success or error messages are displayed accordingly.

## Development Tools
- XAMPP
- PHP
- MySQL/MariaDB
- HTML
- Bootstrap
- CSS
- JavaScript

## Testing Tools
- Selenium IDE: For recording and running test scenarios
- Python pytest: For running the test suite via Terminal

## Testing Plans
Selenium IDE is used to record test cases and export the test suite for use with Python pytest. Tests cover:
1. Login Process
2. Book Management (add, delete)
3. Logout Process

For detailed testing information, please refer to the Test Planning Document.
