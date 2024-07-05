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
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .search-container {
            margin-bottom: 20px;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
            transition: border-color 0.3s ease;
        }
        input[type="text"]:focus {
            outline: none;
            border-color: #3498db;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            border-radius: 8px;
            overflow: hidden;
        }
        th, td {
            padding: 12px;
            text-align: center;
            border: 1px solid #ddd;
        }
        th {
            background-color: #3498db;
            color: #fff;
        }
        td {
            background-color: #f9f9f9;
        }
        .highlight {
            background-color: #ffeb3b; /* Highlight color */
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="search-container">
            <input type="text" id="searchInput" onkeyup="searchTable()" placeholder="Search for keywords...">
        </div>
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

    <script>
        function searchTable() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("searchInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("translation-table");
            tr = table.getElementsByTagName("tr");

            for (i = 0; i < tr.length; i++) {
                tr[i].classList.remove("highlight"); 
                td = tr[i].getElementsByTagName("td");
                for (var j = 0; j < td.length; j++) {
                    if (td[j]) {
                        txtValue = td[j].textContent || td[j].innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].classList.add("highlight");
                            break; 
                        }
                    }
                }
            }
        }
    </script>
</body>
</html>
