<?php
    if (isset($data[0]['completed'])) {
        $done = $data[0]['completed'] ? 1 : 0;
    } else {
        $done = [];
    }
    ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Slim 4</title>
    <link href='//fonts.googleapis.com/css?family=Raleway:400' rel='stylesheet' type='text/css'>
    <style>
        body {
            width: 100%;
            margin: 50px 0 0 0;
            padding: 0;
            font-family: "Raleway", Helvetica, Arial, sans-serif;
            font-size: 20px;
            text-align: center;
            color: #aaa;
            background: #222;
        }
        a {
            color: #4a79ff;
            text-decoration: none;
        }
        h1 {
            margin-bottom: 0;
            font-family: 'Lato', sans-serif;
            font-size: 60px;
            font-weight: 200;
            color: #2050de;
            letter-spacing: -3px;
        }
        main {
            width: 400px;
            margin: 50px auto;
        }
        section {
            margin: 20px auto;
            padding: 5px 20px;
            background: #111;
            border-radius: 30px;
        }
        section div {
            text-align: left;
        }
        form {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .buttons {
            display: flex;
        }
        input[type="checkbox"] {
            width: 20px;
            height: 20px;
            margin: 5px;
        }
        input[type="text"] {
            width: 80%;
            height: 20px;
            margin: 5px auto;
        }
        input[type="date"] {
            width: 50%;
            height: 25px;
            margin: 5px auto;
        }
        input[type="submit"] {
            width: 120px;
            height: 25px;
            margin: 30px auto;
            background: #2050de;
            border: none;
            border-radius: 5px;
        }
        input[type="submit"]:active {
            transform: scale(0.9);
        }
        input[type="submit"].danger {
            background: #ac1f1f;
        }
        .uncheckMe {
            text-align: center;
        }
        .wide {
            min-width: 200px;
        }
    </style>
</head>
<body>
    <header>
        <h1>todo</h1>
    </header>

    <main>
        <section>
            <h2>
                <?php echo $done
                    ? 'Done / <a href="/">To do</a>'
                    : 'To do / <a href="/done">Done</a>'
                ?>
                </h2>
            <form method="post">
                <div>
                    <h6 class="uncheckMe">
                        Check items &amp; click submit to
                        <?php
                        echo $done
                            ? 'move back to todo list'
                            : 'remove from list';
                        ?>
                    </h6>
                    <table><thead><tr><td></td><td class="wide">ITEM</td><td><a href="/due">DUE</a></td></tr></thead>
                        <tbody>
                        <?php
                        foreach ($data as $one) {
                            echo '<tr><td><input type="checkbox" id="item'
                            . $one['id']
                            . '" name="'
                            . $one['id']
                            . '" value="'
                            . ($one['completed'] ? 1 : 0)
                            . '"></td><td><label for="item'
                            . $one['id']
                            . '">'
                            . ($done ? '<s>' : '')
                            . $one['name']
                            . ($done ? '</s>' : '')
                            . '</label></td><td>'
                            . $one['due']
                            . '</td></tr>';
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
                <div class="buttons">
                    <input type="submit" name="redoDone" value="<?php echo $done ? 'REDO' : 'DONE' ?>!" />
                    <?php echo $done ? '<input type="submit" name="delete" value="DELETE!" class="danger" />' : '' ?>
                </div>
            </form>
        </section>
        <?php echo $done ? '' :
        '<section>
            <h3>Add an item</h3>
            <form method="post" action="/add">
                <input type="text" id="listItem" name="name" required="required" />
                <input type="date" id="dueDate" name="due" />
                <input type="submit" value="ADD!" />
            </form>
        </section>'
        ?>
    </main>

</body>
</html>
