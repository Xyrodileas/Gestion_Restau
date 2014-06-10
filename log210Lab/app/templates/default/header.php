<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	
	<title><?php echo $data['title'].' - '.SITETITLE; //SITETITLE defined in index.php?></title>
    <meta name="description" content="">
    <meta name="author" content="Gr-11">

    <!-- Le styles -->
    <link href="<?= url::get_template_path() ?>css/gs_special.css" rel="stylesheet">
    
    <link href="<?= url::get_template_path() ?>css/bootstrap.css" rel="stylesheet">
    <link href="<?= url::get_template_path() ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= url::get_template_path() ?>css/bootstrap-responsive.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= url::get_template_path() ?>css/style2.css" media="screen" />
    <link rel="icon" type="image/png" href="<?= url::get_template_path() ?>css/favicon.ico" />
    
    <link href="<?= url::get_template_path() ?>css/tab.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
    </style>

    <link href="<?= url::get_template_path() ?>css/bootstrap-responsive.css" rel="stylesheet">
	
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="<?= url::get_template_path() ?>ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?= url::get_template_path() ?>ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?= url::get_template_path() ?>ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?= url::get_template_path() ?>ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?= url::get_template_path() ?>ico/apple-touch-icon-57-precomposed.png">
	
</head>
<body>

<div class='container'>