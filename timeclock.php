<?php
session_start();

require 'common.php';
include 'header.php';

if (!isset($_GET['printer_friendly'])) {

    if (isset($_SESSION['valid_user'])) {
        $set_logout = "1";
    }

    include 'topmain.php';

    echo '
    <div class="lomake">
    <form name="timeclock" action="kirjaus.php" autocomplete="off" method="post">
      <br/>
    	<label class="barcodeHeader" for="left-barcode">Käyttäjätunnus:</label>
			<br/>
      <div class="barcodeBox">
    	 <input type="password" id="left_barcode" name="left_barcode" maxlength="250" size="17" value="" autocomplete="off" autofocus>
       </div>
    </form>
	</div>
    ';

}

echo "<title>Kellokalle</title>\n";

?>
