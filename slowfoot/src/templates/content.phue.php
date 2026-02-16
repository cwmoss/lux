<layout.default lang="de" :page="page">
    <article :if="page.is_page">
        <h2>{{ page.title}}</h2>
        <sanity.text :block="page.body"></sanity.text>
    </article>
</layout.default>