<?php
/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template in this directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 * @see html.tpl.php
 */
?>
<?php
if ($page['sidebar_first'] && $page['sidebar_second'] ) {
	$classpage = 'colldeux';
	 }
elseif ($page['sidebar_first']) {
	$classpage = 'collgauche';
	}
elseif ($page['sidebar_second']) {
	$classpage = 'colldroite';
	}
else {
	$classpage = 'full';
};
?>
<div id="top">
  <div class="wrap">
    <header id="header">
        <a href="/" class="home"></a>
     </header> 
    <?php if ($main_menu) { print '<nav  class="nav-collapse">' .theme('links__system_main_menu', array('links' => $main_menu, 'attributes' => array('id' => 'main-menu'))) .'</nav>';}; ?>
    <?php print render($page['header']); ?>
  </div><!--  /.wrap -->
</div><!--  /#top -->
<div id="contenant" class="<?php echo $classpage; ?>">
  <!--  BANNIERE 
  chercher l'image de fond dans le dossier -->
 <?
  
 $imglist='';
 $img_folder = "sites/all/themes/mutualite/images/banniere/";
  mt_srand((double)microtime()*1000);
  //use the directory class
 $imgs = dir($img_folder);
  //read all files from the  directory, checks if are images and ads them to a list
 while ($file = $imgs->read()) {
	  if (preg_match("/gif/i", $file) || preg_match("/jpg/i", $file) || preg_match("/png/i", $file))
       $imglist .= "$file ";
 } closedir($imgs->handle);
  //put all images into an array
 $imglist = explode(" ", $imglist);
 $no = sizeof($imglist)-2;
 //generate a random number between 0 and the number of images
 $random = mt_rand(0, $no);
 $image = $imglist[$random];
//display background image and texte hover
 print '<div class="ban" style=" background-image:url(/'.$img_folder.$image.' )" border=0><div class="wrap"><p><span>Une entreprise d’économie <br/>sociale spécialisée en services TI</span><br/>basée à la Maison du développement durable.</p>
<img src="/sites/all/themes/mutualite/images/filigran_ban.png" /></div></div>';
 ?>
  <div class="wrap">
    <div id="highlighted">
      <div  class="slogan">
       <h1><span>Nos objectifs</span><br />à votre service!</h1>
      </div>  
      <div class="contact"><h2>Contact et support</h2><p>514 394-1133<br /><span>ti@mutualit.org</span></p>
      </div>     
    </div>
    <div id="wrapper_contenant" >
      <a id="main-content"></a>
      <?php print render($title_prefix); ?>
      <?php print render($title_suffix); ?>
      <?php print render($page['accueil']); ?>
     </div><!--  /#wrapper_contenant -->
  </div><!--  /.wrap -->
</div><!--  /#contenant -->
<div id="bottom">
  <div class="wrap">
    <footer id="footer">
    <div class="mobile">
      <a class="tel"href="tel:514 394-1133">514 394-1133</a>
      <a class="email" href="mailto:ti@mutualit.org">ti@mutualit.org</a>
      <div class="imgage"><img src="/sites/all/themes/mutualite/images/logo_mdd.png" alt="MDD"/></div>
    </div>
    <div class="bot-gauche desktop">
      <img src="/sites/all/themes/mutualite/images/logo_seul.png" width="51" height="51" alt="Mutulait'" />
      <p class="contact">Contactez nous pour une évaluation ou pour toute question.</p>
      <p class="tel">514 394-1133</p>
      <p class="email"><a href="mailto:ti@mutualit.org">ti@mutualit.org</a></p>
    </div>
    <div class="bot-droit desktop">
      <p><img src="/sites/all/themes/mutualite/images/logo_mdd.png" alt="MDD"/>Partenaire principal</p></div>
    </footer>
  </div><!--  /.wrap -->
</div><!--  /#bottom-->