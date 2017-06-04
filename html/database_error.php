<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>Error Page</title>
    <!-- <link rel="stylesheet" type="text/css" href="main.css" /> -->
</head>

<!-- the body section -->
<body>
    <header><h1>Error Has Occurred</h1></header>

    <main>
        <h1>Database Error</h1>
        <p>There was an error connecting to the database.</p>
        <p>MySQL must be running properly.</p>
        <p>Error message: <?php echo $error_message; ?></p>
        <p>&nbsp;</p>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Whomp Whomp.</p>
    </footer>
</body>
</html>
