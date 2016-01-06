<?php
// Wurde das Formular abgeschickt?
if (isset( $_POST['submitbutton'] ))
{
    // Whiteliste Dateiendungen und Ersetzungen
    $Erlaubte_Dateiendungen = array( "jpg", "gif", "zip" );
    $Dateiname_bereinigen = array( 'ä' => 'ae', 'ö' => 'oe', 'ü' => 'ue', 'ß' => 'ss', ' ' => '_' );
    // Pruefen ob die hochgeladenen Datei mehr als 0 Byte hat
    // Hat sie das nicht, wurde auch nichts hochgeladen, logisch, was?! ;)
    if ($_FILES['datei']['size'] > 0)
    {
        // Dateiendung der hochgeladenen Datei abtrennen
        $UploadDateiEndung = array_pop( explode( ".", strtolower( $_FILES['datei']['name'] ) ) );
        // Schauen ob die Endung der hochgeladenen Datei in der Whitelist steht
        if (!in_array( $UploadDateiEndung, $Erlaubte_Dateiendungen ))
        {
            die( "Die angeh&auml;ngte Datei hat eine nicht erlaubte Dateiendung!" );
        }
        // Neuer Dateiname erzeugen indem Umlaute und Leerzeichen umgewandelt werden
        $DateiNameNeu = strtr( strtolower( $_FILES['datei']['name'] ), $Dateiname_bereinigen );
        // UMASK resetten um Dateirechte zu ändern (wird nur fuer Linux benoetigt, Windows ignoriert das)
        $umask_alt = umask( 0 );
        // Hochgeladenen Datei verschieben
        if (@move_uploaded_file( $_FILES['datei']['tmp_name'], $DateiNameNeu ))
        {
            // Die Datei wurde erfolgreich an ihren Bestimmungsort verschoben
            /* ***************************************************************************************** */
            /* *** Hier koennte Code stehen um Email zu versenden oder Datenbank-Eintraege zu machen *** */
            /* ***************************************************************************************** */
 
            // Dateirechte setzen, damit man später die Datei wieder vom FTP bekommt und die UMASK auf den alten Wert setzen
            @chmod( $DateiNameNeu, 0755 );
            umask( $umask_alt );
        }
        else
        {
            // UMASK resetten
            umask( $umask_alt );
            // Hier steht Code der ausgefuehrt wird, wenn der Upload fehl schlug
        }
    }
}
?>
<html>
<head>
<title>Datei Upload</title>
</head>
 
<body>
<form name="DateiUpload" id="DateiUpload" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
    <input type="file" name="datei" id="datei"><br />
    <input type="submit" name="submitbutton" id="submitbutton" value="Datei hochladen">
</form>
</body>
</html>