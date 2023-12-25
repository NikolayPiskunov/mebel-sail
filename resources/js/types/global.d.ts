import {ErrorBag, Errors, PageProps as InertiaPageProps, Page} from '@inertiajs/core';
import { AxiosInstance } from 'axios';
import ziggyRoute, { Config as ZiggyConfig } from 'ziggy-js';
import {NavigationItem} from "@/Contracts/Base/navigation";


declare global {
  interface Window {
    axios: AxiosInstance;
  }

  var route: typeof ziggyRoute;
  var Ziggy: ZiggyConfig;
}

declare module 'vue' {
  interface ComponentCustomProperties {
    route: typeof ziggyRoute;
  }
}

declare module '@inertiajs/core' {
  interface PageProps extends Page<InertiaPageProps> {
    props: {
      errors: Errors & ErrorBag;
      auth: {
        user: {
          name: string,
        }
      },
      navigation: {
        left_drawer: NavigationItem[]
      },
      [key: string]: any;
    }
  }
}
