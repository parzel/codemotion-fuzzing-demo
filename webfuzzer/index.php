<!DOCTYPE html>
<html>
<head>
<title>Vulnerable Searchbar</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
* {box-sizing: border-box;}

body {
    margin: 0;
    font-family: Arial, Helvetica, sans-serif;
}

.topnav {
    overflow: hidden;
    background-color: #e9e9e9;
}

.topnav a {
    float: left;
    display: block;
    color: black;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 17px;
}

.topnav a:hover {
    background-color: #ddd;
    color: black;
}

.topnav a.active {
    background-color: #2196F3;
    color: white;
}

.topnav .search-container {
    float: right;
}

.topnav input[type=text] {
    padding: 6px;
    margin-top: 8px;
    font-size: 17px;
    border: none;
}

.topnav .search-container button {
    float: right;
    padding: 6px 10px;
    margin-top: 8px;
    margin-right: 16px;
    background: #ddd;
    font-size: 17px;
    border: none;
    cursor: pointer;
}

.topnav .search-container button:hover {
    background: #ccc;
}

table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}

@media screen and (max-width: 600px) {
    .topnav .search-container {
        float: none;
    }
    .topnav a, .topnav input[type=text], .topnav .search-container button {
        float: none;
        display: block;
        text-align: left;
        width: 100%;
        margin: 0;
        padding: 14px;
    }
    .topnav input[type=text] {
        border: 1px solid #ccc;    
    }
}
</style>
</head>
<body>

<div class="topnav">
    <a class="active" href="index.php">Home</a>
    <a href="#about">About</a>
    <a href="#contact">Contact</a>
    <div class="search-container">
        <form action="/index.php">
            <input type="text" placeholder="Search.." name="search">
            <button type="submit"><i class="fa fa-search"></i></button>
        </form>
    </div>
</div>

<div style="padding-left:16px">
    <h2>Query Results</h2>
    <?php
        if(isset($_GET["search"])){
            $search_term = $_GET["search"];
            // try to prevent xss in a bad way
            $search_term = trim($search_term);
            $search_term = preg_replace('/<script>/i', '', $search_term);
            $search_term = preg_replace('/<\/script>/i', '', $search_term);
            $search_term = preg_replace('/onerror=/i', '', $search_term);
            $search_term = preg_replace('/onload=/i', '', $search_term);
            $search_term = preg_replace('/onfocus=/i', '', $search_term);
            echo "Sorry we could not find any results for: ".$search_term;
        } else {
            echo "<table>";
            echo "<tr>";
            echo "    <th>Company</th>";
            echo "    <th>Contact</th>";
            echo "    <th>Country</th>";
            echo "</tr>";
            echo "<tr>";
            echo "    <td>Alfreds Futterkiste</td>";
            echo "    <td>Maria Anders</td>";
            echo "    <td>Germany</td>";
            echo "</tr>";
            echo "<tr>";
            echo "    <td>Centro comercial Moctezuma</td>";
            echo "    <td>Francisco Chang</td>";
            echo "    <td>Mexico</td>";
            echo "</tr>";
            echo "<tr>";
            echo "    <td>Ernst Handel</td>";
            echo "    <td>Roland Mendel</td>";
            echo "    <td>Austria</td>";
            echo "</tr>";
            echo "<tr>";
            echo "    <td>Island Trading</td>";
            echo "    <td>Helen Bennett</td>";
            echo "    <td>UK</td>";
            echo "</tr>";
            echo "<tr>";
            echo "    <td>Laughing Bacchus Winecellars</td>";
            echo "    <td>Yoshi Tannamuri</td>";
            echo "    <td>Canada</td>";
            echo "</tr>";
            echo "<tr>";
            echo "    <td>Magazzini Alimentari Riuniti</td>";
            echo "    <td>Giovanni Rovelli</td>";
            echo "    <td>Italy</td>";
            echo "</tr>";
            echo "</table>";
        } 
    ?> 
</div>


</body>
</html>
