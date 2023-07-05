<?php

/**
 * @ Author: Bill Minozzi
 * @ Copyright: 2020 www.BillMinozzi.com
 * @ Modified time: 2021-03-19 10:20:31
 */

// http://codylindley.com/thickbox/
if (!defined('ABSPATH'))
  exit; // Exit if accessed directly
add_thickbox();
$is_modal = "&modal=true";
$is_modal = "";
if (empty($is_modal))
  $wheight = "400";
else
  $wheight = "300";



?>
<div style="display:none; max-width:530px !important;">

  <a href="#TB_inline?&width=530&height=240&inlineId=stopbadbots-scan-id<?php echo $is_modal; ?>" id="stopbadbots-scan-ok" class="thickbox" style="display:none;">xx---xxx</a>

</div>
<div id="stopbadbots-scan-id" style="display:none;">

<?php echo STOPBADBOTSURL; ?>assets/videos/memory.mp4


  <div class="bill-parent">
    <div class="bill-child-cols" style="margin-top:5px;">
      <video id="bill-banner" style="margin: 0px; padding:0px;" width="400" height="240" muted>
        <source src="<?php echo STOPBADBOTSURL; ?>assets/videos/security11.mp4" type="video/mp4">
      </video>

    </div>
    <div class="bill-child-cols" style="margin-left:20px;">
      <a href="#" id="bill-vendor-button-ok-sbb" style="margin-top: 0px !important; margin-right:0px;" class="button button-primary">Learn More</a>
      <br>
      <br>
      <a href="#" id="bill-vendor-button-again-sbb" style="margin-top: 0px !important;" class="button" style="margin-left: 20px;">Watch Again</a>
      <br>
      <br>
      <a href="#" id="bill-vendor-button-dismiss-sbb" class="button" style="margin-left:0px;">Dismiss</a>
    </div>
  </div>
</div>
<?php
return;