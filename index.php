<?php

/** List of the archives and folders and return an array with then. */
function listDir(){
    $list = [];
    $way = opendir(__DIR__.'/');

    while (false != ($entry = readdir($way)) )
    {
        array_push($list, $entry);
    }
    closedir($way);

    array_pop($list);
    array_shift($list);

    return $list;
}

/** Mount a list of links with the folders and archives to show  */
$list = listDir();
$formatList = '';
foreach($list as $item){
    $dir = 'localhost/' . $item;
    $formatList .= "<a href='{$item}' target='_blank'>Project: {$item}</a>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<style>
:root {
    --color-1: #634F40;
    --color-2: #C3A57C;
    --color-3: #DED8CD;

    --letter-dark: #291211;
    --letter-light: #FFFEE6;
}
* 
{
    padding: 0;
    margin: 0;
    text-decoration: none;
    box-sizing: border-box;
    list-style: none;
    transition: all .3s;
}
.container
{
    margin: 0px auto;
    width: 750px;
    background-color: var(--color-3);
 
    display: grid;
    grid-template-columns: 1fr 4fr;
    grid-template-rows: 15vh 80vh 5vh;

    grid-template-areas: "top top top top"
                         "menu content content content"
                         "foot foot foot foot";
}

header
{
    grid-area: top;

    display: flex;
    align-items: center;
    text-align: center;
    background-color: var(--color-1);
    color: var(--letter-light);
}
header h1 {
    width: 100%;
}

aside {
    grid-area: menu;

    display: block;
    text-align: center;
    margin-top: 10px;
}
aside a {
    width: 100%;
    display: block;
    margin-top: 15px;
}
aside a svg {
    width: 3rem;
    height: 3rem;
    fill: var(--color-1);
}
aside a svg:hover{
    transform: scale(1.2);
    fill: var(--letter-dark);
}

main {
    grid-area: content;
}
/* Format the list */
main a{
    text-align: center;
    display: block;
    color: var(--letter-light);
    background-color: var(--color-2);
    width: 100%;
    overflow-y: auto;
    padding: 15px 0px;
    border-bottom: 1px solid var(--color-3);
    
}
main a:hover{
    font-weight: bold;
    transform: scale(1.1);
    color: var(--color-1);
    background-color: var(--color-3);
    border: 1px solid black;
}

footer {
    grid-area: foot;

    display: flex;
    align-items: center;
    text-align: center;
    background-color: var(--color-1);
}

</style>

    <div class="container">
        
        <header>
            <h1>List Projects</h1>
        </header>
        <aside>
            <a href="https://github.com">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-github" viewBox="0 0 16 16"> <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z"/> </svg>
            </a>
        </aside>
        <main>
            <?= $formatList ?>
        </main>

        <footer id="foot">
        </footer>
    </div>
</body>
</html>
