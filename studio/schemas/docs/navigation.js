//File name: navigation.js
//File location: schemas/documents

import { GrNavigate } from "react-icons/gr";

export default {
    name: 'navigation',
    title: 'Navigation',
    type: 'document',
    icon: GrNavigate,
    fields: [
        {
            name: "title",
            type: "string",
            title: "Title"
          },
          {
            name: 'slug',
            type: 'slug',
            title: "Slug",
            options: {
               source: 'title',
               maxLength: 96
            }
          },
          {
            name: "items",
            type: "array",
            title: "Navigation items",
            of: [{ type: "nav_item" }]
          }
    ]
}