<!DOCTYPE HTML>
<head>
	<meta http-equiv="content-type" content="text/html" />
	<meta name="author" content="duythanh" />

	<title><?php echo $title_for_layout ?></title>
<?php
echo $this->Html->charset('UTF-8');
echo $this->Html->script('jquery.js');
echo $this->Html->css('instagram','stylesheet');
?>
</head>

<body>
<div id="wrapper">
    <div id="sidebar"></div><!-- /sidebar -->
    <div id="top-nav"></div><!-- /top-nav -->
    <div id="content"><?php echo $this->fetch('content') ?></div><!-- /content -->
</div><!-- /wrapper -->
</body>
</html>