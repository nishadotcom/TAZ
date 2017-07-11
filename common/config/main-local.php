<?php
$linux_user = exec('who');
if(strpos($linux_user, 'nisha') || strpos($linux_user, 'nisha') == 0){
	$dbName 	= 'TAZALO';
	$dbUser		= 'root';
	$dbPassword	= 'root';
}else{
	$dbName 	= 'taz_old';
	$dbUser		= 'root';
	$dbPassword	= '';	
}
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname='.$dbName,
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
            'useFileTransport' => true,
        ],
    ],
];
