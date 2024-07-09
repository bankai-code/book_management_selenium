# book_management_selenium
Learning Web Development and UI testing using Selenium
Book Management Web Application Requirements for Selenium Testing
Introduction
This document outlines the functional requirements for a web-based book management system. The application provides user authentication and book management functionalities, including adding, viewing, and deleting books.
General Requirements and Scope of Work
System Structure:
1. XAMPPforMacOsisusedforhostingonlocalhost
2. MySQL/MariaDBdatabaseusingXamppwith‘book’databasefromweekly
activity is used.
3. BootstrapisusedfordesignalongwithCSSandJSforscripting.
4. SeleniumIDEisusedforrecordingtestcasesandrunningthem.Ihavealso
exported the tests from the IDE to a python script and run them from the terminal.
The system enables users to:
1. Loginandlogoutoftheapplication.
2. Viewalistofallbooksinthedatabase. 3. Addnewbookstothedatabase.
4. Deletebooksfromthedatabase.
Functional Requirements
User Authentication:
1. Login:Usersshouldbeabletologinusingausernameandpassword.The system validates the credentials against the database. If the credentials are incorrect, an error message is displayed.
2. Logout:Usersshouldbeabletologoutfromthesystem.Uponloggingout,the user session is terminated, and the user is redirected to the login page.
Book Management
1. DisplayBooks:Afterloggingin,theuseristakentothebooklistpage,which displays all the current books in the database.
Name: Rohan Jayachandran NETID: RXJ220025 CS6314 – Web Programming Languages – S24
Week 14 - LAB-01 - Selenium Testing
DUE: 04/26/2024
2. AddBook:Authorizedusersshouldbeabletoaddnewbookstothedatabase using the given form. All fields must include title, ISBN-10, ISBN-13, copyright year, subcategory ID, imprint ID, production status ID, binding type ID, trim size, page counts editorial estimate, description, and cover image. On successful adding a book, a message is displayed to the user.
3. DeleteBook:Userscandeleteabookfromthedatabase.Ifthebookdoesnot exist, an error message is displayed, and on successful deletion, a success message is also displayed
Development and Testing Tools
Development Tools: XAMPP, PHP, MySQL/MariaDB, HTML, Bootstrap, CSS, JavaScript.
Testing Tools: Selenium IDE for recording and running test scenarios & python pytest for running the test suite via the Terminal.
Testing Plans:
Use Selenium IDE to record test cases and also export the test suite to use with python pytest package. The tests are meant to test the following features and are described in detail in the Test Planning Document.
1. LoginProcess.
2. BookManagement(add,delete). 3. LogoutProcess.
