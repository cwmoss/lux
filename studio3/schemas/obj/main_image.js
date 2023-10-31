export default {
  name: "main_image",
  type: "image",
  title: "Image",
  options: {
    hotspot: true,
  },
  fields: [
    {
      name: "caption",
      type: "string",
      title: "Bildunterschrift",
    },
    {
      name: "alt",
      type: "string",
      title: "Alternativer text",
      description: "Für beeinträchtigte Menschen (Accessibility)",
    },
  ],
  preview: {
    select: {
      imageUrl: "asset.url",
      title: "caption",
    },
  },
};
