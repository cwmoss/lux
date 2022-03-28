export default {
  type: 'document',
  name: 'page',
  title: 'Page',
  fields: [
    {
      name: 'title',
      type: 'string',
      title: 'Title',
    },
    {
      name: 'slug',
      title: 'Slug',
      type: 'slug',
      options: {
        source: 'title',
        maxLength: 96
      }
    },
    {
      name: 'body',
      type: 'body_text',
      title: 'Body'
    },
    {
      title: "Sections",
      name: "sections",
      type: 'array',
      of: [
        {
          type: "section",
        }
      ],
      options:{
        // sortable: false,
         //editModal: 'popover'
        // layout: 'grid'
      }
    },
    {
      name: 'main_image',
      type: 'main_image',
      title: 'Main image'
    },
  ],
  preview: {
    select: {
      title: 'title',
      slug: 'slug',
      media: 'main_image',
    },
    prepare ({title = 'No title', slug = {}, media}) {
     // const dateSegment = format(publishedAt, 'YYYY/MM')
      const path = slug.current??''
      return {
        title,
        media,
        subtitle: path 
      }
    }
  }
}