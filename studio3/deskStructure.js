import { MdMenu } from "react-icons/md";
import {
  GoBrowser as PageIcon,
  GoHome,
  GoSettings,
  GoPencil,
} from "react-icons/go";
// import { FaPencil } from "react-icons/fa"

//import blog from './src/structure/blog'
//import landingPages from './src/structure/landingPages'
//import PreviewIFrame from './src/components/previewIFrame'

const hiddenDocTypes = (listItem) =>
  ![
    "route",
    "navigation",
    "content",
    "page",
    "site_settings",
    "gallery_page",
    "category",
    "termin",
  ].includes(listItem.getId());

export default (S) =>
  S.list()
    .title("Inhalte")
    .items([
      S.listItem()
        .title("Termine")
        .schemaType("termin")
        .child(
          S.documentTypeList("termin")
            .title("Termine")
            .defaultOrdering([{ field: "datum", direction: "desc" }])
        ),

      S.listItem()
        .title("Texte")
        .schemaType("content")
        .child(S.documentTypeList("content").title("Texte")),

      S.listItem()
        .title("Homepage")
        .schemaType("page")
        .child(S.documentTypeList("page")),

      S.listItem()
        .title("Galleries")
        .schemaType("gallery_page")
        .child(S.documentTypeList("gallery_page")),

      S.listItem()
        .title("Navigation")
        .schemaType("navigation")
        .child(S.documentTypeList("navigation")),

      // This returns an array of all the document types
      // defined in schema.js. We filter out those that we have
      // defined the structure above
      ...S.documentTypeListItems().filter(hiddenDocTypes),

      S.listItem()
        .title("Entwürfe")
        .icon(GoPencil)
        .child(
          S.documentList()
            .title("Entwürfe")
            .filter("_id in path('drafts.**')")
            .defaultOrdering([{ field: "_updatedAt", direction: "desc" }])
        ),

      S.listItem()
        .title("Settings")
        .icon(GoSettings)
        .child(
          S.document().schemaType("site_settings").documentId("site_settings")
        ),
      /*
      S.listItem()
        .title('Settings')
        .icon(GoSettings)
        .child(
          S.editor()
            .id('site_settings')
            .schemaType('site_settings')
            .documentId('site_settings')
        )*/
    ]);
