# XYZ PHP project
XYZ is file downloader project
![payment page](https://github.com/AbdorrahmanRamadan/XYZOS-PHP-Project/blob/main/diagrams/index.jpeg?raw=true)


## Description

This is a web application that allows its users to download a file (XYZOS.zip) after confirming their payment data they are allowed to download the file 7 times via a generated download link that expires after one time usage

## Plannig and design phase

### UI/UX

[UI](https://drive.google.com/drive/folders/12Y-rVNrF691RTukezGHPksoBqjT4_qNt?usp=sharing) /
[UX](https://drive.google.com/drive/folders/103ga-25DLs3drc3RjQANh44M4yreHs3r)

### Requirement analysis 
#### ERD 
![erd](https://github.com/AbdorrahmanRamadan/XYZOS-PHP-Project/blob/main/diagrams/erd_diagram.png?raw=true)
#### Activity Diagram 
![Activity diagram](https://github.com/AbdorrahmanRamadan/XYZOS-PHP-Project/blob/main/diagrams/activity_diagram.png?raw=true)
#### Use Case Diagram
![Use case diagram](https://github.com/AbdorrahmanRamadan/XYZOS-PHP-Project/blob/main/diagrams/use_case.png?raw=true)

## Getting Started

### Dependencies

* composer
* PHP 7.4 or higher
* Apache2 service
* MySQL

### Installing

* Clone the project's repository
* Import xyzos42.sql file
* Edit config.php file, in (_username_,_password_) put your MySQL credentials
* Run (composer install) command on the local repository directory
* You might need to use (composer dump-autoload) command
* Make sure Apache and MySQl services are running (e.g. using xampp)
* Run the application from your browser by typing localhost/XYZOS-PHP-Project/

## Features
* Users enter their payment info. and it gets validated
* Registered users can login using their email and password 
* Users can preserve their loging credentials by checking the remember me option
* After authentication users can download the product up to 7 times
* Random download links are generated and updated after each download.
* Each download link can be used only once
* Users can edit their profile credentials (Email or password) in their profile page 
* Users can logout at any time

## Technologies used
* PHP
* Eloquent ORM (illuminate DB)
* MySQL
* HTML/CSS/JS

## Authors

Contributors

* Abdorrahman Ramdan
* Fatma Abdelhameed
* Passant Hamdy
* Ramaj Alaa
* Youssef Ibrahim



