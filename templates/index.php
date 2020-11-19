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
            background: #111;
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
            width: 300px;
            margin: 50px auto;
        }
        section {
            margin: 100px auto;
        }
        section div {
            text-align: left;
        }
        form {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        input[type="checkbox"] {
            width: 20px;
            height: 20px;
            margin: 5px;
        }
        input[type="text"] {
            width: 200px;
            height: 20px;
            margin: auto;
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
    </style>
</head>
<body>

    <header>
        <h1>TODO</h1>
    </header>

    <main>
        <section>
            <h2>My list / <a href="/done">Done</a></h2>
            <form method="post">
                <div>
                    <?php
                    foreach ($data as $one) {
                        echo '<input type="checkbox" id="item'
                            . $one['id']
                            . '" name="'
                            . $one['id']
                            . '"><label for="item'
                            . $one['id']
                            . '">'
                            . $one['name']
                            . '</label><br/>';
                    }
                    ?>
                </div>
                <input type="submit" value="DONE!" />
            </form>
        </section>
        <section>
            <h3>Add an item</h3>
            <form method="post" action="/add">
                <input type="text" id="listItem" name="name" required="required" />
                <input type="submit" value="ADD!" />
            </form>
        </section>
    </main>

</body>
</html>
