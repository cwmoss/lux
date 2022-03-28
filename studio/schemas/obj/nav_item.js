//File name: navItem.js
//File location: schemas/objects
import { GrNavigate } from "react-icons/gr";

export default {
    name: 'nav_item',
    title: 'Navigation Item',
    type: 'object',
    icon: GrNavigate,
    fields: [
        {
            name: "text",
            type: "string",
            title: "Navigation Text"
          },
          {
            name: "link",
            type: "link", 
            title: "Navigation Item Link"
          }
    ],
    preview: {
        select: {
          title: 'text',
          rtitle: 'link.internal.title',
        },
        prepare ({title, rtitle}) {
          // const dateSegment = format(publishedAt, 'YYYY/MM')
       
          return {
            title: title?title:(rtitle?rtitle:'')
           
          }
        }
    }
}