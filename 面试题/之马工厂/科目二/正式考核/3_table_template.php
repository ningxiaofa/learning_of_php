<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table border="1" style="border-collapse:collapse">
        <thead align="center">
            <td>姓名</td>
            <td>电话</td>
            <td>性别</td>
            <td>性别</td>
            <td>状态</td>
        </thead>
        <tbody align="center">
            <?php
            foreach($array as $key => $vlaue){
                echo "<tr>
                <td>{$vlaue['name']}</td>
                <td>{$vlaue['phone']}</td>
                <td>{$array_sex[$vlaue['sex']]}</td>
                <td>{$vlaue['email']}</td>
                <td>{$array_status[$vlaue['status']]}</td>
                </tr>";
            }
            ?>
        </tbody>
    </table>
</body>

</html>