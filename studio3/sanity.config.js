// sanity.config.js
import { defineConfig } from "sanity";
import { deskTool } from "sanity/desk";
import schemas from "./schemas/schema";
import { media } from "sanity-plugin-media";
import { visionTool } from "@sanity/vision";

import { colorInput } from "@sanity/color-input";
import deskStructure from "./deskStructure";
import DeployWebsiteWidget from "./plugins/deploy-website3";
import {
  dashboardTool,
  projectUsersWidget,
  projectInfoWidget,
} from "@sanity/dashboard";
import { documentListWidget } from "sanity-plugin-dashboard-widget-document-list";

export default defineConfig({
  title: "lux",
  projectId: "pna8s3iv",
  dataset: "production",
  plugins: [
    dashboardTool({
      widgets: [
        DeployWebsiteWidget({
          name: "deploy-website",
          layout: { height: "auto" },
          options: {
            site: {
              name: "lux",
              url: process.env.SANITY_STUDIO_DEPLOY_WEBSITE,
              token: process.env.SANITY_STUDIO_DEPLOY_TOKEN,
            },
          },
        }),
        projectInfoWidget(),
        projectUsersWidget(),
        documentListWidget({
          title: "Neueste Inhalte",
          order: "_createdAt desc",
          layout: { width: "medium" },
        }),
      ],
    }),

    deskTool({
      structure: deskStructure,
    }),
    media(),
    colorInput(),

    visionTool(),
  ],
  schema: {
    types: schemas,
  },
});
