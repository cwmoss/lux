export default {
  widgets: [
    {name: 'deploy-website', layout: {height: 'auto'}, options: {site: {name:'lux', url:process.env.SANITY_STUDIO_DEPLOY_WEBSITE, token: process.env.SANITY_STUDIO_DEPLOY_TOKEN}}},


    {
      name: 'project-info'
    },
    {
      name: 'project-users'
    },
    {
      name: 'document-list',
      options: {title: 'Neueste Inhalte', order: '_createdAt desc', types: ['post']},
      layout: {width: 'medium'}
    }
  ]
}