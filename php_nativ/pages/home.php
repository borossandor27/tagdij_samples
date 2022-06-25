<h1>Eddigi befizetések</h1>
<table id="befizetesek">
    <thead>
        <tr>
            <th>Befizetés ideje</th>
            <th>Befizetett összeg</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $befizetesek = $db->query_eddigi_befizetesek_egyeni($user->azon);
        $sum = 0;
        foreach ($befizetesek as $row) {
            $sum += intval($row["osszeg"]);
            $tablerow = '<tr>
                    <td>'.$row['datum'].'</td>
                    <td>'.penznem($row['osszeg']).'</td>
                </tr>';
            echo $tablerow;
        }
        ?>
    </tbody>
    <tfoot>
        <tr>
            <td>Mindösszesen:</td>
            <td><?php echo penznem($sum); ?></td>
            <td>&nbsp;</td>
        </tr>
    </tfoot>
</table>
