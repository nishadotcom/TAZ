<?php
$linux_user = exec('who'); 
$serverName = $_SERVER['SERVER_NAME'];

//if($linux_user && (strpos($linux_user, 'nisha') || (strpos($linux_user, 'nisha') == 0))){ 
if($serverName=='dev.talozo.local'){
	/*$host 		= 'sql12.freemysqlhosting.net';
	$dbName 	= 'sql12184890';
	$dbUser		= 'sql12184890	';
	$dbPassword	= '4rxQPFQ2lV';	*/
	$host 		= 'localhost';
	$dbName 	= 'taz_db';
	$dbUser		= 'root';
	$dbPassword	= '';
	/*$host 		= '50.62.177.83';
	$dbName 	= 'dev_talozo';
	$dbUser		= 'dev_talozo';
	$dbPassword	= 'dev@talozo17';*/
}elseif($serverName=='talozo.com'){ 
	$host 		= 'localhost';
	$dbName 	= 'dev_talozo';
	$dbUser		= 'dev_talozo';
	$dbPassword	= 'dev@talozo17';

}else{
    $host       = 'localhost';
    $dbName     = 'taz_db';
    $dbUser     = 'root';
    $dbPassword = '';
}

return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host='.$host.';dbname='.$dbName,
            'username' => $dbUser,
            'password' => $dbPassword,
            'charset' => 'utf8',
            'tablePrefix' => 'taz_',
        ],
        'Common' => [
            'class' => 'common\components\Common',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'localhost',
                /*'username' => 'test-user',
                'password' => 'test-user-password',
                'port' => '465',
                'encryption' => 'ssl',*/
            ],
        ],
    ],
];
