<layout.default lang="en" :page="page">

    <aside :if="page.body">
        <sanity.text :block="page.body"></sanity.text>
    </aside>


    <main class="dates">
        <template. :if="termine">

            <lux.termin :foreach="termine as termin" :termin="termin"></lux.termin>

        </template.>
        <aside :else>
            <p>Leider gerade keine Termine 😩</p>
        </aside>

    </main>

    <aside :foreach="sections as section">
        <sanity.text :block="section.body" :profile="small" :lightbox="gallery_big"></sanity.text>
    </aside>

</layout.default>
<?php


$termine = array_map(fn($it) => $helper->ref($it), (array)$props->page->termine);
$sections = array_map(fn($it) => $helper->ref($it->ref), $props->page->sections ?? []);
