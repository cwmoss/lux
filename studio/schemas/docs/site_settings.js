export default {
  name: 'site_settings',
  type: 'document',
  title: 'Site Settings',
  __experimental_actions: ['update', /* 'create',  'delete',  */ 'publish'],
  fields: [
    {
      name: 'title',
      type: 'string',
      title: 'Title'
    },
    {
      title: 'Open graph',
      name: 'openGraph',
      description: 'These will be the default meta tags on all pages that have not set their own',
      type: 'opengraph'
    },
    {
      type: 'color',
      name: 'primaryColor',
      title: 'Primary brand color',
      description: 'Used to generate the primary accent color for websites, press materials, etc'
    },
    {
      type: 'color',
      name: 'secondaryColor',
      title: 'Secondary brand color',
      description: 'Used to generate the secondary accent color for websites, press materials, etc'
    },
    {
        title: 'Main navigation',
        name: 'nav_main',
        description: 'Select menu for main navigation',
        type: 'reference',
        to: {type: 'navigation'},
    },
    {
        title: 'Footer Links',
        name: 'nav_footer',
        description: 'Select menu for footer navigation',
        type: 'reference',
        to: {type: 'navigation'},
    },
    {
      title: 'Properties',
      name: 'props',
      description:
        'Custom Properties',
      type: 'array',
      of: [{type: 'keyval'}],
      options: {
        sortable: false
      }
    }
  ]
}