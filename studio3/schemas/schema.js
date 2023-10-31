import gallery_page from "./docs/gallery_page";
import site_settings from "./docs/site_settings";
import navigation from "./docs/navigation";
import page from "./docs/page";
import content from "./docs/content";

import gallery from "./obj/gallery";
import keyval from "./obj/keyval";
import main_image from "./obj/main_image";
import opengraph from "./obj/opengraph";
import link from "./obj/link";
import nav_item from "./obj/nav_item";
import body_text from "./obj/body_text";
import excerpt_text from "./obj/excerpt_text";
import section from "./obj/section";
import termin from "./docs/termin";

// Then we give our schema to the builder and provide the result to Sanity
export default [
  gallery_page,
  site_settings,
  navigation,
  page,
  content,
  termin,
  gallery,
  keyval,
  main_image,
  opengraph,
  nav_item,
  link,
  body_text,
  excerpt_text,
  section,
];
