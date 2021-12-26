<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CRUD</title>
    <link rel="stylesheet" href="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.min.css">
</head>

<body>
    <!-- Start Top Bar -->
    <div class="top-bar">
        <div class="top-bar-left">
            <ul class="menu">
                <li class="menu-text">CRUD by 5h4r3r</li>
            </ul>
        </div>
    </div>
    <!-- We can now combine rows and columns when there's only one column in that row -->
    <div class="row medium-8 large-10 columns">
        <table class="hover">
            <thead>
                <tr>
                    <th width="50">id</th>
                    <th width="200">Фамилия</th>
                    <th width="200">Имя</th>
                    <th width="200">Отчество</th>
                    <th width="200">Задолжность</th>
                    <th width="200">Пошлина</th>
                    <th width="350">Действия</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($content as $value)
                <tr>
                    <td>{{$value['id']}}</td>
                    <td>{{$value['LASTNAME']}}</td>
                    <td>{{$value['FIRSTNAME']}}</td>
                    <td>{{$value['SECONDNAME']}}</td>
                    <td>{{$value['DEBT']}}</td>
                    <td>{{$value['STATEFEE']}}</td>
                    <td>
                        <a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                        <a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                    </td>
                </tr>
                @endforeach
                <tr>
                    <td></td>
                    <td><input type="text" name="firstName" placeholder="Иван" form="data"></td>
                    <td><input type="text" name="lastName" placeholder="Иванов" form="data"></td>
                    <td><input type="text" name="email" placeholder="kek@nu.ti" form="data"></td>
                    <td><input type="text" name="phone" placeholder="8(800)555-35-35" form="data"></td>
                    <td></td>
                    <td>
                        <a class="add" title="Add" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>
                        <a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                    </td>
                </tr>
                <form id="data" action="create.php" method="post"></form>
                </tr>
            </tbody>
        </table>
    </div>
    </div>
</body>

</html>