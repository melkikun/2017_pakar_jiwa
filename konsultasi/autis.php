<?php
include "librari/inc.koneksidb.php";
$NOIP = $_SERVER['REMOTE_ADDR'];
session_start();
$sql = "SELECT DISTINCT
 r.kd_gejala1, g.nm_gejala AS gejala1
FROM relasi r
LEFT JOIN penyakit p ON p.kd_penyakit = r.kd_penyakit
LEFT JOIN gejala g ON g.kd_gejala = r.kd_gejala1
LEFT JOIN gejala g1 ON g1.kd_gejala = r.kd_gejala2
LEFT JOIN gejala g2 ON g2.kd_gejala = r.kd_gejala3
ORDER BY  g.nm_gejala ASC limit 1";
$query = mysql_query($sql, $koneksi);
$gejala = mysql_fetch_assoc($query);
$kode_gejala1 = $gejala['kd_gejala1'];
$nama_gejala1 = $gejala['gejala1'];
?>
<html>
    <head>
        <title>Form Utama Penelusuran</title>
    </head>
    <body>
        <!--<form action="?page=konsulcek" method="post" name="form1" target="_self">-->
        <form action="?page=konsulcekpertama" method="post" name="form1" target="_self">
            <input type="hidden" name="level" value="0">
            <p>&nbsp;</p>
            <table width="200" border="0"align="center" >
                <tr>
                    <td height="336">&nbsp;</td>
                    <td>
                        <table width="450" border="0" cellpadding="2" cellspacing="1" bgcolor="#FF9900">
                            <tr>
                                <td>
                                    <b>JAWABLAH PERTANYAAN BERIKUT :</b>
                                </td>
                            </tr>
                            <tr>
                                <td width="312" bgcolor="#FFFFFF">Apakah  anda mengalami <?php echo ucwords($nama_gejala1); ?> ?
                                    <input name="kd_gejala" type="hidden" value="<?php echo $kode_gejala1; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td bgcolor="#FFFFFF">
                                    <input type="radio" name="RbPilih" value="YA" checked>
                                    Benar (YA)
                                    <input type="radio" name="RbPilih" value="TIDAK">
                                    Salah (TIDAK)</td>
                            </tr>
                            <tr>
                                <td bgcolor="#FFFFFF">
                                    <input type="submit" name="Submit" value="Jawab">
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </form>
        <script>
            $(document).ready(function () {
//                alert("123");
            });
        </script>
    </body>
</html>