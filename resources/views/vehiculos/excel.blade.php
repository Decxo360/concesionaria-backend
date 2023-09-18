<?php
header('Content-type: aplication/vnd.ms-excel;charset=iso-8859-15');
header('Content-Disposition: attachment; filename=vehiculos_totales.xls');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <main>
        <table style="text-align: center">
            <tr>
                <th colspan="8" style="background-color: cornsilk">Vehiculos desde base de datos, este excel has sido generado el <?php echo \Carbon\Carbon::now()->format('d/m/Y'); ?></th>
            </tr>
            <tr>
                <th>ID</th>
                <th>PATENTE</th>
                <th>ANO</th>
                <th>DUENO</th>
                <th>CONTACTO DUENO</th>
                <th>COLOR</th>
                <th>MODELO</th>
                <th>MARCA</th>
            </tr>
            <?php foreach ($vehiculos as $vehiculo) { ?>
                <tr style="border-top: 1px solid black">
                    <td><?php echo $vehiculo->idvehiculo;?></td>
                    <td><?php echo $vehiculo->patente;?></td>
                    <td><?php echo $vehiculo->ano;?></td>
                    <td><?php echo $vehiculo->dueno->nombre;?></td>
                    <td><?php echo $vehiculo->dueno->fono_fijo;?></td>
                    <td><?php echo $vehiculo->color->color;?></td>
                    <td><?php echo $vehiculo->modelo->modelo;?></td>
                    <td><?php echo $vehiculo->modelo->marca->marca;?></td>
                </tr>
            <?php } ?>
        </table>
        </table>
    </main>
</body>
</html>