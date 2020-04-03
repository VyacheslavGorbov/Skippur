<html>
    <head>
        <style>
            table, th, td {
                border: 1px solid black;
            }
        </style>
        <title>List of Items</title>
    </head>
    <body>
        <h1>Item list</h1>
        <a href='/home/create'>Add an item</a>
        <table style="width:50%;">
            <tr>
                <th>Name</td>
                <th>Actions</td>
            </tr>
            <?php
                foreach($data['items'] as $item)
                {
                    echo 
                    
                    "<tr>
                        <td>$item->name</td>
                        <td>
                            <a href='/home/details/$item->item_id'>Details</a> |
                            <a href='/home/edit/$item->item_id'>Edit</a> |
                            <a href='/home/delete/$item->item_id'>Delete</a>
                        </td>
                    </tr>";
                }
            ?>
        </table>
    </body>
</html>