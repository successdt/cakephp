<!DOCTYPE HTML>
<head>
	<meta http-equiv="content-type" content="text/html" />
	<meta name="author" content="duythanh" />

	<title><?php echo $title_for_layout ?></title>
<?php
echo $this->Html->charset('UTF-8');
echo $this->Html->css('blogtemplates.css');
echo $this->Html->script('jquery.js');
?>
</head>

<body>
<?php $general = $this->Common->general() ?>
<div id='wrapper'>
            <div id='wrapper-inner'>
                <div id='header'>
                    <div id='header-inner'>
                        <div id='user-box'>
                        </div>
                        <div id='header-content'>
                            <div id='logo'>
                            </div>                                
                            <div id='search-box'>
                            </div>
                            <div id='header-bg'>
                                <div id='header-menu'>
                                    <?php echo $this->element('TopMenu') ?>
                                </div>
                            </div>
                            <div id='status-box'>
                            </div>
                        </div>
                    </div>  
                </div>
                <div id='baseDiv'>
                    <div id='baseDiv-inner'>
                        <div id='page-head'>
                            <div id='page-head-inner'>
                                  <?php echo $this->element('PageHead'); ?>                              
                            </div>       
                        </div>
                        <div id='page'>

                            <div id='page-inner'>
                                <div id="content">
                                    <?php echo $this->fetch('content') ?>
                                </div>
                            </div>
                        </div>
                        <div id="sidebar"></div>
                    </div>
                 </div>
                 <div id='footer'>
                    <div id='footer-inner'>
                        <div id='copyright'>
                        <?php echo $general["footer"] ?>
                        </div>
                        <div id='footer-menu'>
                        </div>
                        <div id='share-sprites'>
                        </div>
                    </div>

                 </div>
            </div>
            <div id='support'>
            </div>
        </div>
        <div id='lightbox'>
        </div>

</body>
</html>