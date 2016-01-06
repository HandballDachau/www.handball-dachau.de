<?php
	session_start();
	require('src/auth.php');
	include('src/navi_red.php');
	$team = $_SESSION['team'];
	
	$berichte = $mysql->get_berichte($team, '0');
	
?>
<!DOCTYPE html>
<html>

<head>
    <title>Handball-Dachau // Redakteur</title>

    <meta charset="UTF-8">
    <meta name="description" content="Handballer des ASV Dachau">
    <link href="src/style_red.css" type="text/css" rel="stylesheet">
</head>

    

<body>
	<h1><?php echo $_SESSION['team'].' // Berichte'; ?></h1> 
	<form name="redakteur" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" >
	    
        <br />
		
		<?php
			echo make_navi_red("Berichte", $team);
        ?>
		<br /><br />
        <a class="button" href="add_bericht.php" title="Neuer Bericht">Neuer Bericht</a>
		
        <br /> <br />
		
		<table class="tabellenkopf">
            <tr>
                <td width="44px" style="background-color: #0099FF"></td>
                <td id="time">Hochgeladen:</td>
                <td id="title">Titel:</td>
                <td id="gamedate">Spieldatum:</td>
            </tr>
        </table>
		
		<div class="tabelle">
            <table class="berichte">
    			<?php
    				$html = "";
    				if($berichte!='leer'){
    					foreach($berichte as $bericht){
    						$html .= '<tr>'
    								.'<td width="16px" height="16px" ><a href="edit_bericht.php?id='.$bericht['id'].'"><img src="bilder/edit_orange.png" alt="edit" /></a></td>'
    								.'<td><a href="erase_bericht.php?id='.$bericht['id'].'"><img src="bilder/erase_red.png" alt="erase" /></a></td>';
    						if($team == TEAM_UEBER && $bericht['team'] != ""){
								$html .= '<td id="team">'.$bericht["team"].'</td>';
							}
    						$html .= '<td id="time">'.$bericht["datetime"].'</td>'
    								.'<td id="title">'.$bericht["titel"].'</td>'
    								.'<td id="gamedate">'.$bericht["gamedate"].'</td>'
    								.'</tr>';
    					}
    				}else{
    					$html = '<tr><td>Bisher keine Berichte vorhanden</td></tr>';
    				}
    				echo $html;
    			?>
    		</table>
		</div>
	</form>
</body>
</html>