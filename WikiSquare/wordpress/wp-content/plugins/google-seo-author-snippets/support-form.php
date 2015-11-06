<?php
function support_form() {
global $wpdb;
?>

<div class = 'wrap' id="supportmain"> 
<h3 style="margin-left:15px;padding-top:20px"> Contact Us </h3>
 <div style = 'width:60%';>
  <div id = 'warn' style = 'display:none'> </div>
 <div id = 'showMsg' style = "color:red;margin-left:30px;font-size:20px;" /> </div>
<table >

<tr style="border-top: 1px solid #dddddd;">
<td id="tdalign"><b> First name</b> <span class="mandatory">*</span></td><td id="tdalign"><input type="text" id="firstname" placeholder="First name" name="firstname" /></td>
<td id="tdalign"> <b>Last name </b> <span class="mandatory">*</span></td><td id="tdalign"><input type="text" id="lastname" placeholder="Last name" name="lastname" />
<input type="hidden" id="smackmailid" name="smackmailid" value="helpdesk@smackcoders.com" />
</td>
<td id="tdalign"><b> Related To </b> </td>
<td id="tdalign"><select name="subject" id = "msg">
<option>Support</option>
</select>
</td>
</tr>
<tr>

<td id="tdalign"> <b> Message </b> <span class="mandatory">*</span></td>
<td colspan="5">
<textarea class="form-control" rows="3" name="message" id="message" style="width:780px"></textarea>
</td>
</tr>
<tr><td d="tdalign" colspan="6">
<div style = 'margin-top:25px;float:right;margin-right:50px' ><input class="button button-primary" type="submit" name="send_mail" onclick = "sendemail2smackers();" /></div>
</td></tr>
</table>
 </div> 
</div>



<?php

}


?>
