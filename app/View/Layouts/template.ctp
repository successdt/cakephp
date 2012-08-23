<!DOCTYPE HTML>
<head>
	<meta http-equiv="content-type" content="text/html" />
	<meta name="author" content="duythanh" />

	<title><?php echo $title_for_layout ?></title>
<?php
echo $this->Html->charset('UTF-8');
echo $this->Html->css('templates.css');
echo $this->Html->script('jquery.js');
echo $this->Html->script('DropMenu.js');
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
                            <div id='header-bg'>
                                <div id='search-box'>
                                </div>
                                
                                <div id='header-menu'>
                                    <table id='top_menu_table'>
                                        <tr>
                                        <?php $topmenu=$this->Common->topmenu() ;
                                        echo $topmenu['space'];
                                        echo $topmenu['SanPham'];
                                        echo $topmenu['space'];
                                        echo $topmenu['LienHe'];
                                        echo $topmenu['space'];
                                        echo $topmenu['TinTuc'];
                                        echo $topmenu['space'];
                                        echo $topmenu['KhuyenMai'];
                                        echo $topmenu['space'];
                                        echo $topmenu['ThuVienAnh'];?>
                                        </tr>
                                    </table>
                                </div>
                                <div id='slide-menu'>
                                <?php echo $this->element('SlideMenu') ?>
                                </div>
                            </div>
                            <div id='status-box'>
                            </div>
                        </div>
                    </div>  
                </div>
                <div id='baseDiv'>
                    <div id='baseDiv-inner'>
                        <div id='page'>
                            <div id='page-head'>
                                <div id='top-banner'>
                                </div>
                                <div id='page-head-inner'>
                                </div>       
                            </div>
                            <div id='page-inner'>
                                <div id="content">
                                    <?php echo $this->fetch('content') ?>
                                </div>
                            </div>
                            <div id='page-foot'>
                            </div>
                        </div>
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