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

if($userID) {
	$name_settings = 'value="'.getinput(getnickname($userID)).'" readonly="readonly" ';
	$captcha_form = '';
}
else {
	$CAPCLASS = new Captcha;
	$captcha = $CAPCLASS->create_captcha();
	$hash = $CAPCLASS->get_hash();
	$CAPCLASS->clear_oldcaptcha();
	$captcha_form = '<div class="control-group"><div class="input-prepend"><span class="add-on captcha-img">'.$captcha.'</span><input type="text" name="captcha" size="5" maxlength="5" class="input-small" placeholder="Enter Captcha"><input name="captcha_hash" type="hidden" value="'.$hash.'"></div></div>';
}

$_language->read_module('shoutbox');

$refresh = $sbrefresh*1000;

eval ("\$shoutbox = \"".gettemplate("shoutbox")."\";");
echo $shoutbox;

?>