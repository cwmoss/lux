export default {
  title: 'Open Graph',
  name: 'opengraph',
  type: 'object',
  options: {
    collapsible: true,
    columns: 2
  },
  /* fieldsets: [{name: 'og', title: 'Open Graph Details'}], */
  fields: [
    {
      title: 'Title',
      name: 'title',
      type: 'string',
      
      description: 'Heads up! This will override the page title.',
      validation: Rule => Rule.max(60).warning('Should be under 60 characters')
    },
    {
      title: 'Description',
      name: 'description',
      type: 'text',
      
      validation: Rule => Rule.max(155).warning('Should be under 155 characters')
    },
    {
      title: 'Image',
      description: 'Facebook recommends 1200x630 (will be auto resized)',
      name: 'image',
      
      type: 'main_image'
    }
    /*
    // You can add videos to Open Graph tags too
    {
      name: 'video',
      title: 'Video',
      type: 'mux.video'
    }
    */
  ],
  preview: {
    select: {
      title: 'title',
      route: 'route.slug.current',
      link: 'link'
    },
    prepare({ title, route, link }) {
      return {
        title,
        subtitle: route ? `Route: /${route}/` : link ? `External link: ${link}` : 'Not set'
      }
    }
  }
}
