<?php
/*------------------------------------------------------------------------
# mod_sfs - JD Simple Flickr Slideshow for Joomla 3.x v1.0.7
# ------------------------------------------------------------------------
# author    JoomDev (Formerly GraphicAholic)
# copyright Copyright (C) 2020 Joomdev, Inc. All rights reserved.
# @license - GNU General Public License version 2 or later
# Websites: https://www.joomdev.com
-------------------------------------------------------------------------*/

// No direct access
defined('_JEXEC') or die('Restricted access');
defined('DS') or define('DS', DIRECTORY_SEPARATOR);
JHtml::_('bootstrap.framework');
// Import the file / foldersystem
jimport('joomla.filesystem.file');
jimport('joomla.filesystem.folder');
$modbase = JURI::base(true).'/modules/mod_sfs/';
$LiveSite 	= JURI::base();
$document = JFactory::getDocument();
$slideWidth 	= $params->get('slideWidth', '');
$slideHeight 	= $params->get('slideHeight', '');
$preText 	= $params->get('preText', '');
$topMargin 	= $params->get('topMargin', '');
$bottomMargin 	= $params->get('bottomMargin', '');
$postText 	= $params->get('postText', '');
$interval 	 	= $params->get('interval', '');
$autoStart 	 	= $params->get('autoStart','');
if($autoStart == "0") $autoStart = "true";
if($autoStart == "1") $autoStart = "false";
$photoSet 	 	= $params->get('photoSet', '');
$perPage 	 	= $params->get('perPage', '');
$hide_buttons 	= $params->get('hide_buttons','');
if($hide_buttons == "0") $hide_buttons = "false";
if($hide_buttons == "1") $hide_buttons = "true";
$tagSearch 	 	= $params->get('tagSearch');
$flickrTags 	= $params->get('flickrTags');
$customText 	= $params->get('customText');
$moduleId = $module->id;
//append javascript along with css files		
$document->addScript(JURI::root().'modules/mod_sfs/js/flickrshow-7.2.js');
?>
<p><?php echo $preText; ?></p>
<div class="example" id="cesc<?php echo $moduleId; ?>" style="height:<?php echo $slideHeight; ?>px;width:<?php echo $slideWidth; ?>; margin-top: <?php echo $topMargin; ?>px;margin-bottom:<?php echo $bottomMargin; ?>px;">
<p><?php echo $customText; ?></p>
</div>
<script>
var cesc<?php echo $moduleId; ?> = new flickrshow('cesc<?php echo $moduleId; ?>', {
<?php if ($tagSearch == "1") : ?>
'set':'<?php echo $photoSet; ?>',
<?php endif; ?>
per_page:<?php echo $perPage; ?>,
autoplay:<?php echo $autoStart; ?>,
interval:<?php echo $interval; ?>,
hide_buttons:<?php echo $hide_buttons; ?>,
baseURL:'<?php echo $LiveSite; ?>',
tags:'<?php echo $flickrTags; ?>'
});
</script>
<p><?php echo $postText; ?></p>