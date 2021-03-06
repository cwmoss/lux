export default {
  name: 'section',
  type: 'object',
  title: 'Section',

  fields: [
    {
      name: 'title',
      type: 'string',
      title: 'Titel',
    },
    {
      name: 'ref',
      type: 'reference',
      title: 'Section',
      to: [{ type: 'content' }, { type: 'page' }, { type: 'gallery_page' }], 
    }
  ],
  preview: {
    select: {
      title: 'title',
      rtitle: 'ref.title',
      rtitle2: 'ref.name',
      slug: 'ref.slug',
      media: 'ref.main_image'
    },
    prepare ({title = '-', rtitle, rtitle2, slug = {}, media}) {
      // const dateSegment = format(publishedAt, 'YYYY/MM')
      const path = `${slug.current}`
      return {
        title: title + ' / ' + (rtitle?rtitle:rtitle2),
        media,
        subtitle: path
      }
    }
  }
}