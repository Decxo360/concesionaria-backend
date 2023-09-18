<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Informes de vehículos</title>
</head>
<body>
    <style>
        table{
            width: 100%;
            border: 1px solid black;
            border-collapse: collapse;
        }
        th, td {
            width: 25%;
            vertical-align: top;
            border: 1px solid #000;
            padding: 20px
        }
        th{
            text-align: center;
            border-collapse: unset;
            background-color: #000;
            border-color: #000;
            color: white;
        }

    </style>

    <h1 style="text-align: center">Informes de vehículos</h1>
    <table style="; text-align: center">
        <tr>
            <th>ID</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Dueño</th>
            <th>Color del vehiculo</th>
            <th>Patente</th>
            <th>Año del Vehiculo</th>
        </tr>

        <?php foreach ($vehiculos as $vehiculo) { ?>
            <tr style="border-top: 1px solid black">
                <td><?php echo $vehiculo->idvehiculo;?></td>
                <td><?php echo $vehiculo->modelo->marca->marca;?></td>
                <td><?php echo $vehiculo->modelo->modelo;?></td>
                <td><?php echo $vehiculo->dueno->nombre;?></td>
                <td><?php echo $vehiculo->color->color;?></td>
                <td><?php echo $vehiculo->patente;?></td>
                <td><?php echo $vehiculo->ano;?></td>

            </tr>
        <?php } ?>
    </table>

    <br>
    <p>Este informe se ha generado el <?php echo \Carbon\Carbon::now()->format('d/m/Y'); ?></p>
</body>
</html>