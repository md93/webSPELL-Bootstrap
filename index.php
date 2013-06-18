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

$hide1 = array("forum","forum_topic");
header('X-UA-Compatible: IE=edge,chrome=1');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="description" content="Clanpage using webSPELL 4 CMS">
<meta name="author" content="webspell.org">
<meta name="keywords" content="webspell, webspell4, clan, cms">
<meta name="generator" content="webSPELL">

<!-- Head & Title include -->
<title><?php echo PAGETITLE; ?></title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap-responsive.min.css">
<link rel="stylesheet" href="css/gridpushpulladdon.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<!--[if IE 7]> <link rel="stylesheet" href="css/font-awesome-ie7.min.css"> <![endif]-->
<link href="css/style.css" rel="stylesheet">
<link href="tmp/rss.xml" rel="alternate" type="application/rss+xml" title="<?php echo getinput($myclanname); ?> - RSS Feed">

<script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
<script src="js/bbcode.js"></script>
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
        <!--[if lte IE 8]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->
        <div class="hero-unit hidden-phone <?php if(in_array($site, $hide1)) echo "hidden"; ?>">
            <h1>webSPELL Bootstrap</h1>
            <p>Free Template, build by you.</p>
            <p><a href="https://github.com/Pascalmh/webSPELL-Bootstrap/" class="btn btn-primary btn-large">» View on GitHub</a></p>
        </div>
    
        <div class="row">
            <!-- main content area -->
            <div class="<?php if(in_array($site, $hide1)) echo "span9"; else echo"span6 push3"; ?>">
                <?php
                    if(!isset($site)) $site="news";
                    $invalide = array('\\','/','/\/',':','.');
                    $site = str_replace($invalide,' ',$site);
                    if(!file_exists($site.".php")) $site = "news";
                    include($site.".php");
                ?>
            </div>

            <!-- left column -->
            <div class="<?php if(in_array($site, $hide1)) echo "hidden"; else echo"span3 pull6 visible-desktop"; ?>">
                <hr class="grey">
                <!-- poll include -->
                <b><?php echo $myclanname.".".$index_language['poll']; ?></b><br>
                <?php include("poll.php"); ?>
                <!-- end poll include -->
                <hr class="grey">
                <!-- pic of the moment include -->
                <b><?php echo $myclanname.".".$index_language['pic_of_the_moment']; ?></b><br>
                <center><?php include("sc_potm.php"); ?></center>
                <!-- end pic of the moment include -->
                <hr class="grey">
                <!-- language switch include -->
                <b><?php echo $myclanname.".".$index_language['language_switch']; ?></b><br>
                <center><?php include("sc_language.php"); ?></center>
                <!-- end language switch include -->
                <hr class="grey">
                <!-- randompic include -->
                <b><?php echo $myclanname.".".$index_language['random_user']; ?></b><br>
                <?php include("sc_randompic.php"); ?>
                <!-- end randompic include -->
                <hr class="grey">
                <!-- articles include -->
                <b><?php echo $myclanname.".".$index_language['articles']; ?></b><br>
                <?php include("sc_articles.php"); ?>
                <!-- end articles include -->
                <hr class="grey">
                <!-- downloads include -->
                <b><?php echo $myclanname.".".$index_language['downloads']; ?></b><br>
                <?php include("sc_files.php"); ?>
                <!-- end downloads include -->
                <hr class="grey">
                <!-- servers include -->
                <b><?php echo $myclanname.".".$index_language['server']; ?></b><br>
                <?php include("sc_servers.php"); ?>
                <!-- end servers include -->
                <hr class="grey">
                <!-- sponsors include -->
                <b><?php echo $myclanname.".".$index_language['sponsors']; ?></b><br>
                <center><?php include("sc_sponsors.php"); ?></center>
                <!-- end sponsors include -->
                <hr class="grey">
                <!-- partners include -->
                <b><?php echo $myclanname.".".$index_language['partners']; ?></b><br>
                <center><?php include("partners.php"); ?></center>
                <!-- end partners include -->
            </div>
            
            
            
            <!-- right column -->
            <div class="span3">
                <!-- login include -->
                <div>
                    <b><?php echo $myclanname.".".$index_language['login']; ?></b><br>
                    <?php include("login.php"); ?>
                </div>
                <div class="visible-desktop visible-tablet">
                    <hr class="grey">
                    <b><?php echo $myclanname.".".$index_language['topics']; ?></b><br>
                    <?php include("latesttopics.php"); ?>
                </div>
                <div class="visible-desktop visible-tablet <?php if(in_array($site, $hide1)) echo "hidden"; ?>">
                    <hr class="grey">
                    <b><?php echo $myclanname.".".$index_language['hotest_news']; ?></b><br>
                    <?php include("sc_topnews.php"); ?>
                </div>
                <div class="visible-desktop visible-tablet <?php if(in_array($site, $hide1)) echo "hidden"; ?>">
                    <hr class="grey">
                    <!-- headlines include -->
                    <b><?php echo $myclanname.".".$index_language['latest_news']; ?></b><br>
                    <?php include("sc_headlines.php"); ?>
                    <!-- end headlines include -->
                </div>
                <div class="visible-desktop visible-tablet <?php if(in_array($site, $hide1)) echo "hidden"; ?>">
                    <hr class="grey">
                    <!-- squads include -->
                    <b><?php echo $myclanname.".".$index_language['squads']; ?></b><br>
                    <center><?php include("sc_squads.php"); ?></center>
                    <!-- end squads include -->
                </div>
                <div class="visible-desktop visible-tablet <?php if(in_array($site, $hide1)) echo "hidden"; ?>">
                    <hr class="grey">
                    <!-- clanwars include -->
                    <b><?php echo $myclanname.".".$index_language['matches']; ?></b><br>
                    <?php include("sc_results.php"); ?>
                    <!-- end clanwars include -->
                </div>
                <div class="visible-desktop visible-tablet <?php if(in_array($site, $hide1)) echo "hidden"; ?>">
                    <hr class="grey">
                    <!-- demos include -->
                    <b><?php echo $myclanname.".".$index_language['demos']; ?></b><br>
                    <?php include("sc_demos.php"); ?>
                    <!-- end demos include -->
                </div>
                <div class="visible-desktop visible-tablet <?php if(in_array($site, $hide1)) echo "hidden"; ?>">
                    <hr class="grey">
                    <!-- upcoming events include -->
                    <b><?php echo $myclanname.".".$index_language['upcoming_events']; ?></b><br>
                    <?php include("sc_upcoming.php"); ?>
                    <!-- end upcoming events include -->
                </div>
                <div class="visible-desktop visible-tablet <?php if(in_array($site, $hide1)) echo "hidden"; ?>">
                    <hr class="grey">
                    <!-- shoutbox include -->
                    <b><?php echo $myclanname.".".$index_language['shoutbox']; ?></b><br>
                    <center><?php include("shoutbox.php"); ?></center>
                    <!-- end shoutbox include -->
                </div>
                <div class="visible-desktop visible-tablet <?php if(in_array($site, $hide1)) echo "hidden"; ?>">
                    <hr class="grey">
                    <!-- newsletter include -->
                    <b><?php echo $myclanname.".".$index_language['newsletter']; ?></b><br>
                    <?php include("sc_newsletter.php"); ?>
                    <!-- end newsletter include -->
                </div>
                <div class="visible-desktop visible-tablet <?php if(in_array($site, $hide1)) echo "hidden"; ?>">
                    <hr class="grey">
                    <!-- statistics include -->
                    <b><?php echo $myclanname.".".$index_language['statistics']; ?></b><br>
                    <?php include("counter.php"); ?>
                    <!-- end statistics include -->
                </div>
            </div>
        </div>
    </div>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>') //local fallback</script>
<script src="js/vendor/bootstrap.min.js"></script>
<script src="js/holder.js">//create images with <img data-src="holder.js/260x200"></script>
<script src="js/wSBs.js" type="text/javascript"></script>

<script>
    //uncomment for analytics use
    /*var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
    (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
    g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
    s.parentNode.insertBefore(g,s)}(document,'script'));*/
</script>

</body>
</html>