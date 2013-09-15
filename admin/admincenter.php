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

chdir('../');
include("_mysql.php");
include("_settings.php");
include("_functions.php");
chdir('admin');

$_language->read_module('admincenter');

if(isset($_GET['site'])) $site = $_GET['site'];
else
if(isset($site)) unset($site);

$admin=isanyadmin($userID);
if(!$loggedin) die($_language->module['not_logged_in']);
if(!$admin) die($_language->module['access_denied']);

if(!isset($_SERVER['REQUEST_URI'])) {
        $arr = explode("/", $_SERVER['PHP_SELF']);
        $_SERVER['REQUEST_URI'] = "/" . $arr[count($arr)-1];
        if ($_SERVER['argv'][0]!="")
        $_SERVER['REQUEST_URI'] .= "?" . $_SERVER['argv'][0];
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Content-Type" content="text/html; charset=us-ascii" />
  <meta name="description" content="Clanpage using webSPELL 4 CMS" />
  <meta name="author" content="webspell.org" />
  <meta name="keywords" content="webspell, webspell4, clan, cms" />
  <meta name="copyright" content="Copyright &copy; 2005 - 2011 by webspell.org" />
  <meta name="generator" content="webSPELL" />

  <title><?php echo $myclanname ?> - webSPELL AdminCenter</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link href="css/bootstrap-theme.min.css" rel="stylesheet">
  <link href="_stylesheet.css" rel="stylesheet" type="text/css" />
  <link href="css/styles.css" rel="stylesheet" type="text/css" />

  <script language="JavaScript" type="text/JavaScript">
//<![CDATA[
          var calledfrom='admin';
  //]]>
  </script>
  <script src="js/bbcode.js" language="JavaScript" type="text/javascript">
</script>
</head>

<body>

<div class="navbar navbar-default" role="navigation">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar_nav">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="admincenter.php">webSPELL</a>
	</div>

	<div class="collapse navbar-collapse navbar-ex1-collapse">
		<ul class="nav navbar-nav navbar-right">
			<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-home icon-2x"></i></a>
				<ul class="dropdown-menu">
					<li><a href="admincenter.php"><i class="icon-dashboard icon-spacing"></i><?php echo $_language->module['overview']; ?></a></li>
					<li><a href="admincenter.php?site=page_statistic"><i class="icon-bar-chart icon-spacing"></i><?php echo $_language->module['page_statistics']; ?></a></li>
					<!--li><a href="admincenter.php?site=visitor_statistic"><?php #echo $_language->module['visitor_statistics']; ?></a></li-->
					<li><a href="../logout.php"><i class="icon-off icon-spacing"></i><?php echo $_language->module['log_out']; ?></a></li>
				</ul>
			</li>
			<?php if(ispageadmin($userID)) { ?>
			<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-cogs icon-2x"></i></a>
				<ul class="dropdown-menu">
					<li><a href="admincenter.php?site=settings"><i class="icon-wrench icon-spacing"></i><?php echo $_language->module['settings']; ?></a></li>
					<li><a href="admincenter.php?site=styles"><i class="icon-tint icon-spacing"></i><?php echo $_language->module['styles']; ?></a></li>
					<li><a href="admincenter.php?site=countries"><i class="icon-globe icon-spacing"></i><?php echo $_language->module['countries']; ?></a></li>
					<li><a href="admincenter.php?site=games"><i class="icon-trophy icon-spacing"></i><?php echo $_language->module['games']; ?></a></li>
					<li><a href="admincenter.php?site=smileys"><i class="icon-smile icon-spacing"></i><?php echo $_language->module['smilies']; ?></a></li>
					<li><a href="admincenter.php?site=database"><i class="icon-hdd icon-spacing"></i><?php echo $_language->module['database']; ?></a></li>
					<li><a href="admincenter.php?site=update&amp;action=update"><i class="icon-cloud-download icon-spacing"></i><?php echo $_language->module['update_webspell']; ?></a></li>
				</ul>
			</li>
			<?php } ?>
		</ul>
	</div>
</div>
	
<div class="sidebar collapse navbar-collapse sidebar_nav">
	<ul class="nav nav-tabs nav-stacked ">
		
		<?php if(isuseradmin($userID)) { ?>
			<li class="list-group-item"><i class="icon-user icon-large icon-spacing"></i><?php echo $_language->module['user_administration']; ?></li>
			<li><a href="admincenter.php?site=users"><?php echo $_language->module['registered_users']; ?></a></li>
			<li><a href="admincenter.php?site=squads"><?php echo $_language->module['squads']; ?></a></li>
			<li><a href="admincenter.php?site=members"><?php echo $_language->module['clanmembers']; ?></a></li>
			<li><a href="admincenter.php?site=contact"><?php echo $_language->module['contact']; ?></a></li>
			<li><a href="admincenter.php?site=newsletter"><?php echo $_language->module['newsletter']; ?></a></li>
		<?php } if(isnewsadmin($userID) || isfileadmin($userID) || ispageadmin($userID)) { ?>
			<li class="list-group-item"><i class="icon-folder-close icon-large icon-spacing"></i><?php echo $_language->module['rubrics']; ?></li>
		<?php } if(isnewsadmin($userID)) { ?>
			<li><a href="admincenter.php?site=rubrics"><?php echo $_language->module['news_rubrics']; ?></a></li>
			<li><a href="admincenter.php?site=newslanguages"><?php echo $_language->module['news_languages']; ?></a></li>
		<?php } if(isfileadmin($userID)) { ?>
			<li><a href="admincenter.php?site=filecategorys"><?php echo $_language->module['file_categories']; ?></a></li>
		<?php } if(ispageadmin($userID)) { ?>
			<li><a href="admincenter.php?site=faqcategories"><?php echo $_language->module['faq_categories']; ?></a></li>
			<li><a href="admincenter.php?site=linkcategorys"><?php echo $_language->module['link_categories']; ?></a></li>
		<?php } if(ispageadmin($userID)) { ?>
			<li class="list-group-item"><i class="icon-edit icon-large icon-spacing"></i><?php echo $_language->module['content']; ?></li>
			<li><a href="admincenter.php?site=static"><?php echo $_language->module['static_pages']; ?></a></li>
			<li><a href="admincenter.php?site=faq"><?php echo $_language->module['faq']; ?></a></li>
			<li><a href="admincenter.php?site=servers"><?php echo $_language->module['servers']; ?></a></li>
			<li><a href="admincenter.php?site=sponsors"><?php echo $_language->module['sponsors']; ?></a></li>
			<li><a href="admincenter.php?site=partners"><?php echo $_language->module['partners']; ?></a></li>
			<li><a href="admincenter.php?site=history"><?php echo $_language->module['history']; ?></a></li>
			<li><a href="admincenter.php?site=about"><?php echo $_language->module['about_us']; ?></a></li>
			<li><a href="admincenter.php?site=imprint"><?php echo $_language->module['imprint']; ?></a></li>
			<li><a href="admincenter.php?site=bannerrotation"><?php echo $_language->module['bannerrotation']; ?></a></li>
			<li><a href="admincenter.php?site=scrolltext"><?php echo $_language->module['scrolltext']; ?></a></li>
		<?php } if(isforumadmin($userID)) { ?>
			<li class="list-group-item"><i class="icon-comment icon-large icon-spacing"></i><?php echo $_language->module['forum']; ?></li>
			<li><a href="admincenter.php?site=boards"><?php echo $_language->module['boards']; ?></a></li>
			<li><a href="admincenter.php?site=groups"><?php echo $_language->module['manage_user_groups']; ?></a></li>
			<li><a href="admincenter.php?site=group-users"><?php echo $_language->module['manage_group_users']; ?></a></li>
			<li><a href="admincenter.php?site=ranks"><?php echo $_language->module['user_ranks']; ?></a></li>
		<?php } if(isgalleryadmin($userID)) { ?>
			<li class="list-group-item"><i class="icon-camera icon-large icon-spacing"></i><?php echo $_language->module['gallery']; ?></li>
			<li><a href="admincenter.php?site=gallery&amp;part=groups"><?php echo $_language->module['manage_groups']; ?></a></li>
			<li><a href="admincenter.php?site=gallery&amp;part=gallerys"><?php echo $_language->module['manage_galleries']; ?></a></li>
		<?php } ?>
	</ul>
</div>

<div class="main_content">
	 <?php
		 if(isset($site) && $site!="news"){
		 $invalide = array('\\','/','//',':','.');
		 $site = str_replace($invalide,' ',$site);
			  if(file_exists($site.'.php')) include($site.'.php');
			  else include('overview.php');
		 }
		 else include('overview.php');
	 ?>
</div>




 

	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
