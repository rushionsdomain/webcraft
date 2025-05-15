# WebCraft Project Documentation

**Author**: Venus Chumba  
**Course**: ICTWEB514 - Design and Build Dynamic Websites  
**Date**: May 17, 2025

## 1. Project Overview
The **WebCraft** project consists of three dynamic websites—**LoginLink**, **BookEasy**, and **ShareSpace**—developed to demonstrate proficiency in building interactive web applications. Each site features user registration and login functionality, implemented using the MVC (Model-View-Controller) framework, PHP, MySQL, HTML, CSS, and JavaScript, hosted locally on XAMPP. The sites incorporate Bootstrap for responsive design and accessibility features like `aria-labels`.

- **LoginLink**: Basic registration and login system.
- **BookEasy**: Registration and login with a datepicker for scheduling appointments.
- **ShareSpace**: Registration and login with a comments field, displayed on the home page.

## 2. Purpose
The project fulfills the ICTWEB514 requirements by:
- Creating dynamic websites with user interaction (registration/login).
- Implementing MVC for organized, maintainable code.
- Using MySQL for data storage and PHP for server-side logic.
- Ensuring responsiveness, accessibility, and browser compatibility.
- Testing and validating functionality using Postman and W3C validators.

## 3. Technologies Used
- **XAMPP**: Local server environment (Apache, MySQL).
- **PHP 8.2.12**: Server-side scripting for form processing and database interaction.
- **MySQL**: Database management for storing user data.
- **HTML5/CSS3**: Structure and styling of web pages.
- **Bootstrap 5.3.3**: Responsive design via CDN.
- **JavaScript/jQuery**: Client-side validation and datepicker (BookEasy).
- **Bootstrap Datepicker 1.9.0**: Appointment scheduling (BookEasy).
- **VS Code**: Code editor with PHP and web development extensions.
- **Postman**: API testing for form submissions.
- **Browsers**: Chrome, Firefox, Edge for compatibility testing.

## 4. Folder Structure
The project is organized in `C:\xampp\htdocs\WebCraft` with three subfolders:
```
WebCraft/
├── LoginLink/
│   ├── config/
│   │   └── config.php
│   ├── controllers/
│   │   └── UserController.php
│   ├── models/
│   │   └── database.php
│   ├── views/
│   │   ├── register.php
│   │   ├── login.php
│   │   ├── home.php
│   │   └── logout.php
│   ├── assets/
│   │   ├── css/
│   │   │   └── style.css
│   │   └── js/
│   │       └── script.js
│   └── index.php
├── BookEasy/
│   └── [Same structure]
├── ShareSpace/
│   └── [Same structure]
├── Screenshots/
│   └── [39 screenshots]
└── Documentation/
    └── WebCraft_Documentation.md
```

## 5. Setup Instructions
1. **Install XAMPP**: Download and install XAMPP from `https://www.apachefriends.org`.
2. **Start XAMPP**: Run Apache and MySQL modules in the XAMPP Control Panel.
3. **Create Project Folder**: Place the `WebCraft` folder in `C:\xampp\htdocs`.
4. **Set Up Databases**:
   - Access `http://localhost/phpmyadmin`.
   - Create databases: `loginlink_db`, `bookeasy_db`, `sharespace_db`.
   - Run the provided SQL scripts to create `users` tables (see source code).
5. **Access Sites**:
   - LoginLink: `http://localhost/WebCraft/LoginLink`
   - BookEasy: `http://localhost/WebCraft/BookEasy`
   - ShareSpace: `http://localhost/WebCraft/ShareSpace`
6. **Test with Postman**: Send POST requests to `register.php` endpoints.
7. **Validate Code**: Use W3C validators for HTML (`http://validator.w3.org`) and CSS (`http://jigsaw.w3.org/css-validator`).

## 6. Database Structure
Each site uses a MySQL database with a `users` table:
- **LoginLink (`loginlink_db`)**: `id`, `first_name`, `email` (unique), `username` (unique), `password` (hashed), `created_at`.
- **BookEasy (`bookeasy_db`)**: Adds `appointment_date` (DATE).
- **ShareSpace (`sharespace_db`)**: Adds `comment` (TEXT).

## 7. Testing and Validation
Testing was conducted per the test plan (see `test_plan.md`):
- **Form Validation**: Ensured required fields, email format, and password length are validated.
- **Functionality**: Registration redirects to login; login redirects to home page.
- **Browser Compatibility**: Tested in Chrome, Firefox, Edge.
- **Accessibility**: Included `aria-labels` for screen reader support.
- **Security**: Passwords hashed with `password_hash()`.
- **Postman**: Tested form submissions.
- **W3C Validation**: HTML and CSS validated with minor warnings resolved.

## 8. Challenges and Solutions
- **Challenge**: 404 error in LoginLink due to incorrect file path.
- **Solution**: Verified folder structure and file names, ensuring `views/register.php` exists.
- **Challenge**: Datepicker setup in BookEasy required jQuery.
- **Solution**: Included jQuery and Bootstrap Datepicker CDNs.

## 9. Screenshots
39 screenshots are included in the `Screenshots` folder, covering:
- XAMPP setup
- Folder structures
- Database structures and data
- Registration/login forms, errors, and home pages
- Browser compatibility
- W3C validation and Postman tests

## 10. Conclusion
The WebCraft project demonstrates my ability to design and build dynamic, user-friendly websites using modern web technologies. The MVC structure, database integration, and thorough testing ensure the sites are robust, accessible, and meet ICTWEB514 requirements.

**Signed**,  
Venus Chumba