<html>
    <head>
        <title>Edit an Item</title>
    </head>
    <body>
    <h1>Edit an Item</h1>

    <form action = '' method = 'post'>
        <label>Name: <input type = 'text' name = 'name' value = '<?=$data->name?>'/></label>
        <input type = 'submit' name = 'action' value = 'Save Changes'/>
    </form>

    <a href='/home/index'>Cancel</a>

    </body>
</html>