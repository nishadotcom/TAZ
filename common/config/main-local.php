<?php
$linux_user = exec('who');
if(strpos($linux_user, 'pradeep') || strpos($linux_user, 'nisha') == 0){
	/*$host 		= 'sql12.freemysqlhosting.net';
	$dbName 	= 'sql12184890';
	$dbUser		= 'sql12184890	';
	$dbPassword	= '4rxQPFQ2lV';	*/
	$host 		= 'localhost';
	$dbName 	= 'ecom';
	$dbUser		= 'root';
	$dbPassword	= 'root';
}else{
	$host 		= 'localhost';
	$dbName 	= 'taz_old';
	$dbUser		= 'root';
	$dbPassword	= '';

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
            'useFileTransport' => true,
        ],
    ],
];
