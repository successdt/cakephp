<!DOCTYPE HTML>
<head>
	<meta http-equiv="content-type" content="text/html" />
	<meta name="author" content="duythanh" />

	<title><?php echo $title_for_layout ?></title>
    <?php
        echo $this->Html->charset('UTF-8'); 
        echo $this->Html->css('jquery.mobile-1.1.1');
        echo $this->Html->css('mobile');
        echo $this->Html->script('jquery');
        echo $this->Html->script('jquery.mobile-1.1.1');
     ?>
</head>

<body>
<div data-role="page" data-theme="d">
    <div data-role="header"  data-theme="d">
        <?php 
        echo $this->Html->link('Home',
            array(
                'controller'=>'blogs',
                'action'=>'index',),
            array(
                'data-role'=>'button',
                'data-icon'=>'home')
        )?>
        <h1>Mobile Cake</h1>   
    </div><!--/header -->
    <div  class="banner-bg" data-theme="d" role="banner">
        <?php echo $this->Html->image('background/banner.jpg') ?>
    </div>
    <div data-role="content">
        <?php echo $this->element('m_TopMenu') ?>
        <?php echo $this->fetch('content') ?>
    </div><!--/content-->
    <div data-role="footer" data-theme="d">
        <div data-role="controlgroup" data-type="horizontal">
        <?php echo $this->element('m_FooterMenu'); ?>
        </div> 
    </div><!-- /footer -->
</div> <!-- /page -->
</body>
</html>