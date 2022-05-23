<!DOCTYPE html>
<html lang="en">
<head>
    <title>All Users</title>
    <style>
        @page {
        header: page-header;
        footer: page-footer;
    }

    i{
        color: #7c7c80;
    }
    h1{
        color: #4a4a4d;
  font: "Helvetica Neue", Helvetica, Arial, sans-serif;

    }
    table {
  border-collapse: collapse;
  border-spacing: 0;
  color: #4a4a4d;
  font: 14px/1.4 "Helvetica Neue", Helvetica, Arial, sans-serif;

}

th, td {
  padding: 10px 15px;
  vertical-align: middle;
}


thead {
  background: #395870;
  background: linear-gradient(#49708f, #293f50);
  color: #fff;
  font-size: 11px;
  text-transform: uppercase;
}

th:first-child {
  border-top-left-radius: 5px;
  text-align: left;
}

th:last-child {
  border-top-right-radius: 5px;
}

tbody tr:nth-child(even){
  background: #f0f0f2;
}

td {
  border-bottom: 1px solid #cecfd5;
  border-right: 1px solid #cecfd5;
}

td:first-child {
  border-left: 1px solid #cecfd5;
}

.book-title {
  color: #395870;
  display: block;
}

.text-offset {
  color: #7c7c80;
  font-size: 12px;
}

.item-stock,
.item-qty {
  text-align:center;
}

.item-price {
  text-align:right;
}

.item-multiple {
  display: block;
}

tfoot {
  text-align: right;
}

tfoot tr:last-child {
  background: #f0f0f2;
  color: #395870;
  font-weight: bold;
}

tfoot tr:last-child td:first-child {
  border-bottom-left-radius: 5px;
}
tfoot tr:last-child td:last-child {
  border-bottom-right-radius: 5px;
}


    </style>
</head>
<body>

    <htmlpageheader name="page-header">
       <h1>
        {{config('app.name')}} User's
       </h1>
    </htmlpageheader>
    <table border="1" width="100%" style="border-color: darkgray;">
        <thead>
        <tr>
            <th  style="width: 1%"></th>
            <th>Name</th>
            <th  style="width: 1%">Email</th>
        </tr>
        </thead>
        <tbody>
         @foreach ($users as $key=>$user)
                <tr>
                    <td >{{$key+1}}</td>
                    <td >
                        {{$user->name}}
                    </td>
                    <td>{{$user->email}}</td>
                </tr>
         @endforeach
        </tbody>
    </table>
    <br>

    <i>
    Users list as of {{now()}}

    </i>
</body>
</html>