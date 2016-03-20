<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>{{ Seo.getTitle() }}</title>
        <meta name="keywords" content="{{ Seo.getKeywords() }}"/>
        <meta name="description" content="{{ Seo.getDescription() }}"/>
        <script src="<?=CSS_PATH?>t.css"></script>
        <script src="<?=JS_PATH?>j.js"></script>
        <script src="<?=JS_PATH?>c.js"></script>
    </head>
    <body>
        {{ Content.getMainMenu() }}
        {{ content() }}
    </body>
</html>