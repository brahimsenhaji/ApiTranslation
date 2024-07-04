<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Real-time AI Translation</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 20px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        td {
            background-color: #fff;
        }
    </style>
</head>
<body>
    <div class="container">
        <table id="translation-table" border="1" cellspacing="0" cellpadding="8">
            <thead>
                <tr>
                    <th>Default Language (EN)</th>
                    <th>French</th>
                    <th>Spanish</th>
                    <th>German</th>
                    <th>Arabic</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td id="en-document">Document</td>
                    <td id="fr-document">{{$translations['Document']['fr'] }}</td>
                    <td id="es-document">{{$translations['Document']['es'] }}</td>
                    <td id="de-document">{{$translations['Document']['de'] }}</td>
                    <td id="ar-document">{{$translations['Document']['ar'] }}</td>
                </tr>
                <tr>
                    <td id="en-file">File</td>
                    <td id="fr-file">{{$translations['File']['fr'] }}</td>
                    <td id="es-file">{{$translations['File']['es'] }}</td>
                    <td id="de-file">{{$translations['File']['de'] }}</td>
                    <td id="ar-file">{{$translations['File']['ar'] }}</td>
                </tr>
                <tr>
                    <td id="en-project">Project</td>
                    <td id="fr-project">{{$translations['Project']['fr'] }}</td>
                    <td id="es-project">{{$translations['Project']['es'] }}</td>
                    <td id="de-project">{{$translations['Project']['de'] }}</td>
                    <td id="ar-project">{{$translations['Project']['ar'] }}</td>
                </tr>
                <tr>
                    <td id="en-user">User</td>
                    <td id="fr-user">{{$translations['User']['fr'] }}</td>
                    <td id="es-user">{{$translations['User']['es'] }}</td>
                    <td id="de-user">{{$translations['User']['de'] }}</td>
                    <td id="ar-user">{{$translations['User']['ar'] }}</td>
                </tr>
                <tr>
                    <td id="en-permissions">Permissions</td>
                    <td id="fr-permissions">{{$translations['Permissions']['fr'] }}</td>
                    <td id="es-permissions">{{$translations['Permissions']['es'] }}</td>
                    <td id="de-permissions">{{$translations['Permissions']['de'] }}</td>
                    <td id="ar-permissions">{{$translations['Permissions']['ar'] }}</td>
                </tr>
                <tr>
                    <td id="en-account">Account</td>
                    <td id="fr-account">{{$translations['Account']['fr'] }}</td>
                    <td id="es-account">{{$translations['Account']['es'] }}</td>
                    <td id="de-account">{{$translations['Account']['de'] }}</td>
                    <td id="ar-account">{{$translations['Account']['ar'] }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    
</body>
</html>
