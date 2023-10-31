//File name: link.js
//File location: schemas/objects

export default {
  name: 'link',
  type: 'object',
  title: 'Link',
  fields: [
    {
    title: 'Internal Link',
    name: 'internal',
    description: 'Select pages for navigation',
    type: 'reference',
    to: [{ type: 'content' }, { type: 'page' }, { type: 'gallery_page' }], 
    },
    {
      name: 'route',
      title: 'Interals URL',
      description: "Some path that is created by SSG, not controlled by CMS",
      type: 'url',
    },
    {
      name: 'external',
      title: 'External URL',
      description:"Use fully qualified URLS for external link",
      type: 'url',
    },

  ]
};