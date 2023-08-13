
# PHP Form Handling 

This repository contains code examples and instructions for handling form submissions using PHP and configuring the `mail()` function for sending emails. The provided code is a simple example of form validation and submission, along with sending an email notification to the site owner.

## Introduction

This repository aims to help developers understand how to:
- Validate form input using PHP.
- Insert form data into a database.
- Configure the `mail()` function to send email notifications.

## Getting Started

1. Clone this repository to your local machine using:

   ```
   git clone https://github.com/your-username/php-form-email.git
   ```

2. Make sure you have XAMPP or a similar PHP development environment installed on your machine.

## Form Validation

The provided PHP code (`form_contact.php`) demonstrates form validation for user input. It ensures that mandatory fields are filled, email formats are valid, and other constraints are met. Form validation helps ensure accurate and safe data submission.

## Sending Email

The `mail()` function in PHP can be used to send emails directly from your server. In this example, the code sends an email notification to the site owner when a new user registers.

## SMTP Configuration

To configure the `mail()` function to send emails using an SMTP server (e.g., Gmail), follow these steps:

1. Open the `php.ini` configuration file in your PHP installation folder.
2. Locate the `[mail function]` section.
3. Modify the `SMTP`, `smtp_port`, `auth_username`, and `auth_password` settings to match your SMTP server's configuration.

**Note:** Using your email and password directly in the `php.ini` file is not recommended for production due to security concerns.

## Usage

1. Edit the code in `form_contact.php` to fit your specific project's requirements.
2. Set up a MySQL database to store form submissions. Update the database connection settings in the code.
3. Replace email addresses and passwords in the code with appropriate values.
4. Test the form submission and email sending functionality on your local server.



---

