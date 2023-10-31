import { GrGallery } from "react-icons/gr";

export default {
  name: 'gallery_page',
  type: 'document',
  title: 'Gallery',
  icon: GrGallery,
  fields: [
    {
      name: 'title',
      type: 'string',
      title: 'Title'
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
      name: 'gallery',
      title: 'Images',
      type: 'gallery'
    }
  ],
  preview: {
    select: {
      title: 'title',
      media: 'gallery.images.0'
    }
  }

}