# BambooInvoice
That's is my personal fork from the [Derek Allard's BambooInvoice](https://github.com/derekallard/BambooInvoice), that it not under maintenance. So that I maintain my fork for usage.

BambooInvoice is free Open Source invoicing software intended for small businesses and independent contractors. Built on CodeIgniter, its priorities are ease of use and user-interface.

## Installation, Documentation
See the PDF file inside the directory `documentation` for details.

## Notes

### Example email.php for gmail

    $config['smtp_user'] = 'you@gmail.com';
    $config['smtp_pass'] = 'yourpassword';
    $config['smtp_host'] = 'ssl://smtp.gmail.com';
    $config['protocol'] = 'smtp';
    $config['smtp_port'] = '465';
    $config['newline'] = "\r\n"; // This is what makes it     work with GMAIL