export default {
  type: 'document',
  name: 'content',
  title: 'General Content',
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
      name: 'is_page',
      type: 'boolean',
      description:
        'Does it have a its own Page?',
      title: 'No / Yes',
    },
    {
      name: 'main_image',
      type: 'main_image',
      title: 'Main image'
    },
    
    {
      name: 'body',
      type: 'body_text',
      title: 'Body'
    },
    {
      name: 'excerpt',
      type: 'excerpt_text',
      title: 'Excerpt',
      description:
        'Sometimes a Teaser is needed'
    },
  ],
  
  preview: {
    select: {
      title: 'title',
      slug: 'slug',
      media: 'main_image',
      is_page: 'is_page'
    },
    prepare ({title = 'No title', slug = {}, media, is_page = false}) {
     // const dateSegment = format(publishedAt, 'YYYY/MM')
      const path = slug.current??''
      return {
        title,
        media,
        subtitle: path + (is_page?' PAGE':'')
      }
    }
  }
}