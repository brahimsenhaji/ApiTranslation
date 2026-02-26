<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Real-time AI Translation</title>

    <link rel="stylesheet" href="{{ url('css/style.css') }}">
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
                    @foreach ($languages as $language)
                        <th>{{ strtoupper($language) }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($keywords as $keyword)
                    <tr>
                        <td>{{ $keyword }}</td>
                        @foreach ($languages as $language)
                            <td>{{ $translations[$keyword][$language] ?? '' }}</td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        function searchTable() {
            const input = document.getElementById('searchInput');
            const filter = input.value.toUpperCase();
            const table = document.getElementById('translation-table');
            const tr = table.getElementsByTagName('tr');

            for (let i = 0; i < tr.length; i++) {
                tr[i].classList.remove('highlight');
                const td = tr[i].getElementsByTagName('td');

                for (let j = 0; j < td.length; j++) {
                    const txtValue = td[j].textContent || td[j].innerText;

                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].classList.add('highlight');
                        break;
                    }
                }
            }
        }
    </script>
</body>
</html>
