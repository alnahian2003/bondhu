<?php
// Database Parameters
{
    define("DB_HOST", "localhost");
    define("DB_USERNAME", "root");
    define("DB_PASSWORD", "");
    define("DB_NAME", "bondhu");
}

// App Root
define("APP_ROOT", dirname(dirname(__FILE__)));

// URL Root
define("URL_ROOT", "http://localhost/bondhu");

// Site Name
define("SITE_NAME", "Bondhu");

// Brand Slogan/Motto
define("SLOGAN", "Where Friends Get Connected");

// Author
define("AUTHOR", "Al Nahian");

// Author URL
define("AUTHOR_URL", "https://alnahian2003.github.io");

// Version
define("VERSION", "1.0");

// Github Repo of This Project
define("GITHUB_REPO", "https://github.com/alnahian2003/bondhu");

// Set Default Timezone
date_default_timezone_set("Asia/Dhaka");

// File Sizes
define('KB', 1024);
define('MB', 1048576);
define('GB', 1073741824);
define('TB', 1099511627776);