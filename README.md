<br />
<p>
  <a href="https://github.com/sumeetmathpati/mail-comics">
    <img src="./logo.png" alt="Logo" width="80" height="80" style="border-radius: 10px:">
  </a>

  <h3>MailComics</h3>
</p>

It's a website written in PHP on which if you signed up, you will recieve a comic email every 5 minutes. The comics are fetched from [xkcd](https://xkcd.com/).

# Live Server

You can visit the live website **[here](http://sumeet.ddns.net/index.php).** 

# Configuration

- Use the `env.php` file to set environment variables.
- Sample `env.php` file is:

```php
<?php
    define('DB_SERVER', 'YOUR_DB_HOSTNAME');
    define('DB_USER', 'YOUR_DB_USERNAME');
    define('DB_PASS', 'YOUR_DB_PASSWORD');
    define('DB_NAME', 'YOUR_DB_NAME');
    define('HOST', 'YOUR_SERVER_HOSTNAME');
?>
```