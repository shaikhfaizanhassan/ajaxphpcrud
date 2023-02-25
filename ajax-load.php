<?php 
    $con = mysqli_connect("localhost","root","","testing");
    $sql  = "select * from student";
    $resuly = mysqli_query($con,$sql);
    $output = "";
    if(mysqli_num_rows($resuly)>0)
    {
        $output  = '
            <table class="table">
                <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>Action</th>
                </tr>
        ';
        while($row = mysqli_fetch_array($resuly))
        {
            $output .= "<tr>
                <td>{$row[0]}</td>
                <td>{$row[1]}</td>
                <td>
                    <a href=''>Edit</a>
                    <a href=''>Delete</a>
                </td>
            </tr>";
        }
        $output.="</table>";
        echo $output;
    }
    else
    {
        echo "<h1>No data</h1>";
    }
?>