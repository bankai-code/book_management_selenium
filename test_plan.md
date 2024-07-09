# Selenium Testing Plan Document for Book Management System

## 1. Introduction
This document outlines the testing strategy and plan for the Book Management System. It covers objectives, approach, and resources for testing the login, book management, and logout features.

## 2. Objectives
- Ensure application compliance with functional requirements
- Identify and fix any defects or issues

## 3. Test Scope
Testing will cover login process, book management operations (addition, deletion), and logout functionalities.

## 4. Test Approach
Testing procedures use Selenium IDE for automated regression tests. Tests are exported as a Python script and run using pytest.

## 5. Test Environment
- Server: Localhost with Apache and MySQL
- Client: Google Chrome Browser, macOS Terminal
- Tools: Selenium IDE and pytest Python package

## 6. Test Scenarios and Test Cases

### Test 1: InvalidUserName
Checks behavior with incorrect login credentials.

### Test 2: AccessBooksWithoutLogin
Verifies response when attempting to access 'Books' link without logging in.

### Test 3: Valid Login
Confirms successful login with valid credentials.

### Test 4: AddBook
Tests ability to add a book after filling required fields.

### Test 5: Delete Book
Attempts to delete a book. Note: This test may fail due to database auto-increment issues.

### Test 6: DeleteBookWhenBookDoesNotExist
Checks error message when attempting to delete non-existent book.

### Test 7: Logout
Verifies redirect to login page after logout.

## Python pytest Results
All tests pass except Test 5 (Delete Book).

Note: Selenium and pytest packages must be installed along with a compatible version of Python 3.
