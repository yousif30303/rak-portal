<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>post app</title>
</head>
<body class="bg-gray-200">
    <nav class="p-4 bg-white flex justify-between mb-4">
        <ul class="flex items-center">
            <li class="p-3">
                <a href="">Home</a>
            </li>
            <li class="p-3">
                <a href="">Dashboard</a>
            </li>
            <li class="p-3">
                <a href="">Post</a>
            </li>
        </ul>
        <ul class="flex items-center">
            <li class="p-3">
                <a href="">Username</a>
            </li>
            <li class="p-3">
                <a href="">Register</a>
            </li>
            <li class="p-3">
                <a href="">Login</a>
            </li>
            <li class="p-3">
                <a href="">Logout</a>
            </li>
        </ul>
    </nav>
    @yield('content')
</body>
<script>
    $(document).ready(function(){
        $('#attForm').submit(function (e){
            e.preventDefault();
            var regnnumb = $('#regnnumb').val();
            $.ajax({
                url:'http://localhost/attendance_rak_portal/search',
                type:"POST",
                data:{
                    reg_num:regnnumb,
                    _token: $('input[name="_token"]').val()
                },
                success:function(response){
                    if(response.schedule.length === 1){
                        $('#attForm').unbind('submit').submit();
                    }
                    else{
                        displayResults(response.schedule);
                        $('#attForm').off('submit').submit(function () {
                                return true;
                            });
                    }
                },
                error:function(xhr,status,error){
                    console.error(xhr.responseText);
                }
            })
        })
    
    function displayResults(records){
        var html = '';
        html += '<select class="bg-gray-100 p-4 border-2 rounded-lg w-full mb-4" id="time" name="time" required>';
            records.forEach(function(record){
                html += '<option value="'+record.starttime+'">'+ record.starttime +'</option>'
            })
        html += '</select>';
        $('#searchResults').html(html);
    }
    
    $('#attForm').on('submit',function(){
        $('#searchResults').empty();
    })

})
</script>
</html>