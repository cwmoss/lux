<nav>
    <sanity.link :foreach="nav.items as nav" :navitem="nav">link</sanity.link>
</nav>
<style global>
    nav a,
    nav a:visited {
        background-color: yellow;
        text-decoration: none;
        font-weight: bold;
        border-bottom: 6px solid white;
        color: black;
        display: inline-block;
        line-height: 8px;
        margin: 0 2em 2em 0;
    }
</style>