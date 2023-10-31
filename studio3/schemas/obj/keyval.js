import { GoGear } from "react-icons/go"


export default {
  title: 'Properties',
  name: 'keyval',
  type: 'object',
  icon: GoGear,
  fields: [
    {
      name: 'key',
      type: 'string',
      title: 'The key used to turn off/on features in the front-end',
    },
    {
      name: 'val',
      type: 'string',
      title: 'Value',
    },
    {
      name: 'description',
      type: 'text',
      title: 'Description',
      description:
        'Description of this key',
    },
    {
      name: 'status',
      type: 'boolean',
      description:
        'Disable or enable the key',
      title: 'Enabled / disabled?',
    },
  ],
  preview: {
    select: {
      key: 'key',
      val: 'val'
    },
    prepare({ key, val }) {
      var title = key + ': ' + val
      return {
        title
      }
    }
  }
}