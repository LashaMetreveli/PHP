<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>

        body {
            width:100%;
            height:100%;
        }
        table {  
            margin: 0 auto; 
      color: #333;
    font-family: Helvetica, Arial, sans-serif;
    width: 640px; 
    border-collapse: 
    collapse; border-spacing: 0;
}

td, th {  
    border: 1px solid transparent; /* No more visible border */
    height: 30px; 
    transition: all 0.3s;  /* Simple transition for hover effect */
}

th {  
    background: #DFDFDF;  /* Darken header a bit */
    font-weight: bold;
}

td {  
    background: #FAFAFA;
    text-align: center;
}

input {
    margin: 20px 30px;
    width: 70%;
    border: 1px solid black;
    border-radius: 5px;
    padding: 5px;
}

button {
    margin: 20px 30px;
    padding: 5px 20px;
}

/* Cells in even rows (2,4,6...) are one color */        
tr:nth-child(even) td { background: #F1F1F1; }   

/* Cells in odd rows (1,3,5...) are another (excludes header cells)  */        
tr:nth-child(odd) td { background: #FEFEFE; }  
    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Al Products</title>
</head>
<body>

    <form action="/product/add" method="POST">
        @csrf

    <table>

        
    <tr>
        <td colspan="2"><input type="text" name="name" placeholder="name"></td>
        <td><input type="number" name="price" placeholder="price"></td>
        <td><input type="text" name="category" placeholder="category"></td>
        <td><button>Add</button></td>
    </tr>


        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Price</th>
            <th>Category</th>
            <th>Date</th>
        </tr>
   

    @foreach ($products as $p)
        <tr>
        <td>{{ $p->id}}</td>
        <td>{{ $p->name}}</td>
        <td>{{ $p->price}}</td>
        <td>{{ $p->category}}</td>
        <td>{{ $p->created_at}}</td>
        </tr>
    @endforeach

</table>
    

</form>


</body>
</html>