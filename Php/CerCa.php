<form method="post" action="cerca.php">
<input type="text" name="testo">
<input type="submit" value="Cerca">
</form>
<?
    $cn = mysql_connect("localhost", "root", "");
    @mysql_select_db("my_db", $cn);
    $testo = isset($_POST["testo"]) ? htmlspecialchars($_POST["testo"]) : '';
?>
<html><head><title>Risultati della ricerca</title></head><body>
<p>
<b>Risultati della ricerca:</b>
<?
    if (!$testo)
    {
        echo "nessun risultato!";
    }
    else
    {
        echo $testo;
    }
?>
</p>
<?
    if (!$testo)
    {
?>
<p>Specificare un criterio di ricerca.</p>
<?
    }
    else
    {
        $arr_txt = explode(" ", $testo);
        $sql = "SELECT * FROM myguests WHERE firstname LIKE '%$testo%'";
        for ($i=0; $i<count($arr_txt); $i++)
        {
            if ($i > 0)
            {
                $sql .= " AND ";
            }
            $sql .= "(titolo LIKE '%" . mysql_real_escape_string($arr_txt[$i]) . "%' OR descrizione LIKE '%" . mysql_real_escape_string($arr_txt[$i]) . "%')";
        }
        //$sql .= " ORDER BY titolo ASC";
        $query = mysql_query($sql, $cn);
        $quanti = mysql_num_rows($query);
        if ($quanti == 0)
        {
?>
<p>Nessun risultato!</p>
<?
        }
        else
        {
            for($x=0; $x<$quanti; $x++)
            {
                $rs = mysql_fetch_row($query);
                $id = $rs[0];
                $titolo = $rs[1];
?>
<p><a href="leggi.php?id=<?echo $id?>"><?echo $titolo?></a></p>
<?
            }
        }
    }
?>
</body></html>