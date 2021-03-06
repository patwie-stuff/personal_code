<?php
	require_once 'includes/db.php';
	require_once 'includes/debug.php';
	require_once 'includes/funcs.php';

	$result = connect();
		testError($result);
	select_db('llimllib');

	if(isset($_POST['shout_msg'])) {
		$shout = $_POST['shout_msg'];
		substr($shout, 0, 256);
		addslashes($shout);
		$query = "
			INSERT INTO shoutbox VALUES(
				NULL,
				'',
				NOW(),
				'$shout')";
		
		$result = query($query);
			testError($result);
	}
	
    printHeader();
    
    printNav();
    
	print "<div class=\"floatright\">\n";
	
	    $msg = 'New <a href="files.php">files</a> page';
		printMessageBox($msg);
		printShoutBox();
		printF2oThanks();
		
	print "</div>\n";
	
	print '<div class="bodytext">';
	
	$i = 0;
	$query = "SELECT * FROM `blog` ORDER BY `blog_date` DESC";
        
	$result = query($query);

	while($i < 3) {
		$row = fetchArray($result);
        
		if(isset($row['error']))
			die($row['error']);

		print "\n<strong>";
		printDate($row[1]);
		if(strlen(stripslashes($row[2])) > 3) {
			print ' &nbsp;&nbsp;&nbsp;' . 
				stripslashes(htmlspecialchars($row[2]));
		}
		print "</strong>";
		print stripslashes($row[3]);
		print "<br><br>";
		$i++;
	}
    
    printFooter();
?>
