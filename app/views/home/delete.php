<html>
    <head>
        <title>Delete an Item</title>
    </head>
    <body>
    <h1>Delete an Item</h1>

    <form action = '' method = 'post'>
        <label>Name: <input disabled type = 'text' name = 'name' value = '<?=$data->name?>'/></label>
        <input type = 'submit' name = 'action' value = 'Delete'/>
    </form>

    <a href='/home/index'>Cancel</a>

    </body>
</html>