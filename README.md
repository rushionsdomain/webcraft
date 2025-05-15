# WebCraft Project

**Course**: ICTWEB514 - Design and Build Dynamic Websites  
**Date**: May 17, 2025

## Overview
WebCraft is a collection of three dynamic websites developed to demonstrate web development skills for the ICTWEB514 assessment. The sites use PHP, MySQL, HTML, CSS, JavaScript, and the MVC framework, hosted on XAMPP with Bootstrap for responsive design.

- **LoginLink**: User registration and login system.
- **BookEasy**: Registration and login with a datepicker for appointment scheduling.
- **ShareSpace**: Registration and login with a comments field, displayed on the home page.

## Technologies
- XAMPP (Apache, MySQL)
- PHP 8.2.12
- MySQL
- HTML5, CSS3, Bootstrap 5.3.3 (CDN)
- JavaScript, jQuery, Bootstrap Datepicker 1.9.0 (BookEasy)
- VS Code, Postman

## Folder Structure
```
WebCraft/
├── LoginLink/
│   ├── config/
│   ├── controllers/
│   ├── models/
│   ├── views/
│   ├── assets/
│   └── index.php
├── BookEasy/
├── ShareSpace/
├── Screenshots/
└── Documentation/
```

## Setup Instructions
1. **Install XAMPP**: Download from `https://www.apachefriends.org` and install.
2. **Copy Project**: Place the `WebCraft` folder in `C:\xampp\htdocs`.
3. **Start XAMPP**: Run Apache and MySQL in the XAMPP Control Panel.
4. **Create Databases**:
   - Open `http://localhost/phpmyadmin`.
   - Create `loginlink_db`, `bookeasy_db`, `sharespace_db`.
   - Run the SQL scripts in each site’s documentation to create `users` tables.
5. **Access Sites**:
   - LoginLink: `http://localhost/WebCraft/LoginLink`
   - BookEasy: `http://localhost/WebCraft/BookEasy`
   - ShareSpace: `http://localhost/WebCraft/ShareSpace`
6. **Test**:
   - Register and log in to each site.
   - Use Postman to test form submissions (see documentation).
   - Validate HTML/CSS at `http://validator.w3.org` and `http://jigsaw.w3.org/css-validator`.

## Usage
- **Registration**: Enter first name, email, username, password (and appointment date for BookEasy, comment for ShareSpace).
- **Login**: Use registered username and password.
- **Features**:
  - BookEasy: Select an appointment date using the datepicker.
  - ShareSpace: View all user comments on the home page.

## Testing
- **Form Validation**: Ensures valid email, password length, and required fields.
- **Browser Compatibility**: Tested in Chrome, Firefox, Edge.
- **Accessibility**: `aria-labels` for screen readers.
- **Security**: Passwords hashed.
- See `Documentation/test_plan.md` for details.

## Screenshots
39 screenshots in `Screenshots/` show setup, functionality, and testing results.

## Notes
- Ensure all files are in the correct folders to avoid 404 errors.
- Check database connections if errors occur.
- Contact Venus Chumba for further assistance.

**Thank you for reviewing WebCraft!**
