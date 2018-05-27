<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script>
        <?php if(isset($_POST['content-json']) && !empty($_POST['content-json'])): ?>
            content = '<?php echo addslashes($_POST['content-json']); ?>'.replace(/\\\"/g, '\\"');
        <?php else: ?>
            content = '[]';
        <?php endif; ?>
    </script>
    <script src="js/app.js"></script>

    <title>Content Generator</title>
</head>
<body>

    <?php if(isset($_POST['content-json']) && !empty($_POST['content-json'])): ?>
        <pre><?php var_dump(json_decode($_POST['content-json'])); ?></pre>
    <?php endif; ?>

    <div id="app">
        <div v-for="item in items">
            <input type="text" v-model="item.title"><br />
            <textarea v-model="item.content"></textarea><br />
            <button class="remove" v-on:click="remove(item)">Usuń</button><br /><br />
        </div>

        <button v-on:click="addField">Dodaj</button>

        <br />

        <form action="" method="POST">
            <textarea name="content-json" id="main-content" cols="100" rows="10" v-html="jsonContent"></textarea>
            <br/>
            <button>Zapisz</button>
        </form>

        <div id="quick-view-json" v-html="jsonContent"></div>
    </div>
</body>
</html>