<?php
// insert into dataBase
function insert($sql)
{
    global $connection;
    mysqli_query($connection, $sql);
}

// deletes from
function delete($sql)
{
    global $connection;
    mysqli_query($connection, $sql);
}

// gets a single row by id
function getrow($sql)
{

    global $connection;
    {
        $query = mysqli_query($connection, $sql);
        if($query)
        return $row = mysqli_fetch_assoc($query);
    }
   
}

// update

function update($sql)
{
    global $connection;
    $query = mysqli_query($connection, $sql);
   
}
function select($sql)
{
    global $connection;
    $data = mysqli_query($connection, $sql);
    $all = array();
    while ($row = mysqli_fetch_assoc($data)) {
        $all[] = $row;
    }
    return $all;
}


function printr($data)
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}
