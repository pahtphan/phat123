<?php
define('ABSPATH', __DIR__ . '/'); //__DIR__ là thư mục chứa file đang chạy
define('ABSPATH_SITE', ABSPATH . 'site/');

define('APP_NAME','Godashop');


define('SERVERNAME','localhost');
define('USERNAME','root');
define('PASSWORD','');
define('DBNAME','godashop_k82');
define('ITEM_PER_PAGE',4);

// SMTP (send mail)
define("SMTP_USERNAME", "phanthanhphat5797@gmail.com");
define("SMTP_SECRET", "dirjffacvmotkdjz");
define("SMTP_HOST", "smtp.gmail.com");
define("SHOP_OWNER", "phanthanhphat5797@gmail.com");

define("GOOGLE_RECAPTCHA_SITE", "6LfpIpEkAAAAAEDM5nOiJ_OEYFty6z1jnIAFoFOf");
define("GOOGLE_RECAPTCHA_SECRET", "6LfpIpEkAAAAABoosX4SZXlzd3v_K6lnr-u4gb0Y");

define('JWT_KEY', 'con gà');

define("GOOGLE_CLIENT_ID", "704341150288-6shgui1hard7ta1v94ahr9kndo0fvahr.apps.googleusercontent.com");
define("GOOGLE_CLIENT_SECRET", "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");

// Của bản thân
define("FACEBOOK_CLIENT_ID", "985196412754864");
define("FACEBOOK_CLIENT_SECRET", "8bb3c9579fc406b7f876bd99636a3327");

// Của thầy
// define("FACEBOOK_CLIENT_ID", "886552205696362");
// define("FACEBOOK_CLIENT_SECRET", "1dc795423fea194a08bd469d4adc190d");
?>