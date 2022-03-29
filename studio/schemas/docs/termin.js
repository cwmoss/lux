import * as util from '../../util'

export default {
  type: 'document',
  name: 'termin',
  title: 'Termin',
  fields: [
      {
        name: 'datum',
        type: 'date',
        title: 'Datum',
        validation: Rule => Rule.required()
      },
    {
      name: 'title',
      type: 'string',
      title: 'Title',
    },
    {
        name: 'admission_is_free',
        type: 'boolean',
        description:
          'Einritt Frei?',
        title: 'Nein / Ja',
        initialValue: true
      },
      {
        name: 'admission_text',
        type: 'string',
        title: 'Alternativer Text zum Eintrittspreis',
      },
    {
      name: 'body',
      type: 'body_text',
      title: 'Body'
    }
  ],
  preview: {
    select: {
      title: 'title',
      datum: 'datum'
    },
    prepare ({title = 'Kein title', datum}) {
     // const dateSegment = format(publishedAt, 'YYYY/MM')
        
        
      return {
        title: util.nicedate(datum),
        subtitle: title,
        media:null 
      }
    }
  },
  orderings: [
    
    {
      name: 'DateDesc',
      title: 'Datum absteigend',
      by: [
        {
          field: 'datum',
          direction: 'desc'
        }
      ]
    },
    {
        name: 'DateAsc',
        title: 'Datum aufsteigend',
        by: [
          {
            field: 'datum',
            direction: 'asc'
          }
        ]
      },
  ],
}