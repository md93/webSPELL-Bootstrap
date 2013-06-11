<?php
/*
##########################################################################
#                                                                        #
#           Version 4       /                        /   /               #
#          -----------__---/__---__------__----__---/---/-               #
#           | /| /  /___) /   ) (_ `   /   ) /___) /   /                 #
#          _|/_|/__(___ _(___/_(__)___/___/_(___ _/___/___               #
#                       Free Content / Management System                 #
#                                   /                                    #
#                                                                        #
#                                                                        #
#   Copyright 2005-2011 by webspell.org                                  #
#                                                                        #
#   visit webSPELL.org, webspell.info to get webSPELL for free           #
#   - Script runs under the GNU GENERAL PUBLIC LICENSE                   #
#   - It's NOT allowed to remove this copyright-tag                      #
#   -- http://www.fsf.org/licensing/licenses/gpl.html                    #
#                                                                        #
#   Code based on WebSPELL Clanpackage (Michael Gruber - webspell.at),   #
#   Far Development by Development Team - webspell.org                   #
#                                                                        #
#   visit webspell.org                                                   #
#                                                                        #
##########################################################################
*/

// important data include
include("_mysql.php");
include("_settings.php");
include("_functions.php");

$_language->read_module('index');
$index_language = $_language->module;
// end important data include
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="description" content="Clanpage using webSPELL 4 CMS" />
<meta name="author" content="webspell.org" />
<meta name="keywords" content="webspell, webspell4, clan, cms" />
<meta name="copyright" content="Copyright &copy; 2005 - 2011 by webspell.org" />
<meta name="generator" content="webSPELL" />

<!-- Head & Title include -->
<title><?php echo PAGETITLE; ?></title>
<link href="css/style.css" rel="stylesheet" />
<link href="css/bootstrap.min.css" rel="stylesheet" />
<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
<link href="tmp/rss.xml" rel="alternate" type="application/rss+xml" title="<?php echo getinput($myclanname); ?> - RSS Feed" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script src="js/bootstrap.min.js" language="jscrip" type="text/javascript"></script>
<script src="js/wSBs.js" language="jscrip" type="text/javascript"></script>
<script src="js/bbcode.js" language="jscript" type="text/javascript"></script>
<!-- end Head & Title include -->

</head>
<body>
<div class="ws_main_wrapper">
    
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container">
                
                <a class="brand" href="index.php"><?php echo $myclanname ?></a>
                
                <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                
                <div class="nav-collapse collapse"> 
                    <?php include("navigation.php"); ?>
                    
                    <?php include("quicksearch.php"); ?>
                </div>
                
            </div><!-- container -->
        </div><!-- navbar-inner -->
    </div><!-- navbar navbar-inverse navbar-fixed-top -->
    
    <div class="container">
        
        <div class="hero-unit .visible">
            <h1>webSPELL Bootstrap</h1>
            <p>Free Template, build by you.</p>
            <p><a href="https://github.com/Pascalmh/webSPELL-Bootstrap/" class="btn btn-primary btn-large">» View on GitHub</a></p>
        </div>
    
        <div class="row">
            <!-- left column -->
            <div class="span3 visible-desktop">
                <hr class="grey" />
                <!-- poll include -->
                <b><?php echo $myclanname.".".$index_language['poll']; ?></b><br />
                <?php include("poll.php"); ?>
                <!-- end poll include -->
                <hr class="grey" />
                <!-- pic of the moment include -->
                <b><?php echo $myclanname.".".$index_language['pic_of_the_moment']; ?></b><br />
                <center><?php include("sc_potm.php"); ?></center>
                <!-- end pic of the moment include -->
                <hr class="grey" />
                <!-- language switch include -->
                <b><?php echo $myclanname.".".$index_language['language_switch']; ?></b><br />
                <center><?php include("sc_language.php"); ?></center>
                <!-- end language switch include -->
                <hr class="grey" />
                <!-- randompic include -->
                <b><?php echo $myclanname.".".$index_language['random_user']; ?></b><br />
                <?php include("sc_randompic.php"); ?>
                <!-- end randompic include -->
                <hr class="grey" />
                <!-- articles include -->
                <b><?php echo $myclanname.".".$index_language['articles']; ?></b><br />
                <?php include("sc_articles.php"); ?>
                <!-- end articles include -->
                <hr class="grey" />
                <!-- downloads include -->
                <b><?php echo $myclanname.".".$index_language['downloads']; ?></b><br />
                <?php include("sc_files.php"); ?>
                <!-- end downloads include -->
                <hr class="grey" />
                <!-- latest topics include -->
                <b><?php echo $myclanname.".".$index_language['topics']; ?></b><br />
                <?php include("latesttopics.php"); ?>
                <!-- end latest topics include -->
                <hr class="grey" />
                <!-- servers include -->
                <b><?php echo $myclanname.".".$index_language['server']; ?></b><br />
                <?php include("sc_servers.php"); ?>
                <!-- end servers include -->
                <hr class="grey" />
                <!-- sponsors include -->
                <b><?php echo $myclanname.".".$index_language['sponsors']; ?></b><br />
                <center><?php include("sc_sponsors.php"); ?></center>
                <!-- end sponsors include -->
                <hr class="grey" />
                <!-- partners include -->
                <b><?php echo $myclanname.".".$index_language['partners']; ?></b><br />
                <center><?php include("partners.php"); ?></center>
                <!-- end partners include -->
            </div>
            
            <!-- main content area -->
            <div class="span6">
                <?php
                    if(!isset($site)) $site="news";
                    $invalide = array('\\','/','/\/',':','.');
                    $site = str_replace($invalide,' ',$site);
                    if(!file_exists($site.".php")) $site = "news";
                    include($site.".php");
                ?>
            </div>
            
            <!-- right column -->
            <div class="span3">
                <!-- login include -->
                <div>
                    <b><?php echo $myclanname.".".$index_language['login']; ?></b><br />
                    <?php include("login.php"); ?>
                    <!-- end login include -->
                </div>
                <div class="visible-desktop visible-tablet">
                    <hr class="grey" />
                    <!-- topnews include -->
                    <b><?php echo $myclanname.".".$index_language['hotest_news']; ?></b><br />
                    <?php include("sc_topnews.php"); ?>
                    <!-- topnews include -->
                </div>
                <div class="visible-desktop visible-tablet">
                    <hr class="grey" />
                    <!-- headlines include -->
                    <b><?php echo $myclanname.".".$index_language['latest_news']; ?></b><br />
                    <?php include("sc_headlines.php"); ?>
                    <!-- end headlines include -->
                </div>
                <div class="visible-desktop visible-tablet">
                    <hr class="grey" />
                    <!-- squads include -->
                    <b><?php echo $myclanname.".".$index_language['squads']; ?></b><br />
                    <center><?php include("sc_squads.php"); ?></center>
                    <!-- end squads include -->
                </div>
                <div class="visible-desktop visible-tablet">
                    <hr class="grey" />
                    <!-- clanwars include -->
                    <b><?php echo $myclanname.".".$index_language['matches']; ?></b><br />
                    <?php include("sc_results.php"); ?>
                    <!-- end clanwars include -->
                </div>
                <div class="visible-desktop visible-tablet">
                    <hr class="grey" />
                    <!-- demos include -->
                    <b><?php echo $myclanname.".".$index_language['demos']; ?></b><br />
                    <?php include("sc_demos.php"); ?>
                    <!-- end demos include -->
                </div>
                <div class="visible-desktop visible-tablet">
                    <hr class="grey" />
                    <!-- upcoming events include -->
                    <b><?php echo $myclanname.".".$index_language['upcoming_events']; ?></b><br />
                    <?php include("sc_upcoming.php"); ?>
                    <!-- end upcoming events include -->
                </div>
                <div class="visible-desktop visible-tablet">
                    <hr class="grey" />
                    <!-- shoutbox include -->
                    <b><?php echo $myclanname.".".$index_language['shoutbox']; ?></b><br />
                    <center><?php include("shoutbox.php"); ?></center>
                    <!-- end shoutbox include -->
                </div>
                <div class="visible-desktop visible-tablet">
                    <hr class="grey" />
                    <!-- newsletter include -->
                    <b><?php echo $myclanname.".".$index_language['newsletter']; ?></b><br />
                    <?php include("sc_newsletter.php"); ?>
                    <!-- end newsletter include -->
                </div>
                <div class="visible-desktop visible-tablet">
                    <hr class="grey" />
                    <!-- statistics include -->
                    <b><?php echo $myclanname.".".$index_language['statistics']; ?></b><br />
                    <?php include("counter.php"); ?>
                    <!-- end statistics include -->
                </div>
            </div>
        </div>
        
    </div>
</div>
</body>
</html>