<layout.default lang="en" :page="page">

    <aside :if="page.body">
        <sanity.text :block="page.body"></sanity.text>
    </aside>


    <main class="dates">
        <template. :if="termine">

            <section :foreach="termine as termin">
                <div class="when"> termin_date($doc['datum']) </div>

                <div :if="doc.main_image" class="bild">
                    <a href="$image_url($bild, 'gallery_big')" aria-label="Ich bin ein Bild, klick mich groß" class="ltbx">
                        image_source_set($bild, [300, 600])</a>
                </div>

                <div class="details">
                    <h2>{{doc.title}}</h2>

                    <h3 :if="doc.subtitle">{{doc.subtitle}}</h3>

                    <sanity.text :if="doc.body" :text="doc.body"></sanity.text>

                    <p :if="eintritt">{{eintritt}}</p>

                </div>
            </section>

        </template.>
        <aside :else>
            <p>Leider gerade keine Termine 😩</p>
        </aside>

    </main>

    <aside foreach="sections as section">
        <sanity.text :block="doc.body" :profile="small" :lightbox="gallery_big"></sanity.text>
    </aside>

</layout.default>
<?php

#$links = query('*[_id=="$id"]{articles[]->, pix[]->}[0]', ['id' =>$_id]);
$links = [];
$subtitle = "untertitel";
$termine = $page['termine'];
$sections = $page['sections'] ?? [];

/*

$doc = $ref($termin); #strtotime($doc['datum'])
            $eintritt = $doc['admission_text'] ?? ($doc['admission_is_free'] ? 'Eintritt Frei' : ''); 
            
// $image_tag($bild, 'small')


$bild = $ref($doc['main_image']['asset'])
*/
