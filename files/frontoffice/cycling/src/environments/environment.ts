// The file contents for the current environment will overwrite these during build.
// The build system defaults to the dev environment which uses `environment.ts`, but if you do
// `ng build --env=prod` then `environment.prod.ts` will be used instead.
// The list of which env maps to which file can be found in `.angular-cli.json`.

export const environment = {
  production: false,

  CyclingAPI: {
    url: 'http://127.0.0.1:8000/api',
    usersEndPoints: {
      get: '/users', // All users
      post: '/user',
      getspecific: '/user/', // Id behind it
      put: '/user',
      delete: '/user/', // Id behind it
    },
    productsEndPoints: {
      get: '/products', // All products
      post: '/product',
      getspecific: '/product/', // Id behind it
      put: '/product',
      delete: '/product/', // Id behind it
    },
    bidsEndPoints: {
      get: '/bids', // All bids
      post: '/bid',
      getspecific: '/bid/', // Id behind it
      put: '/bid',
      delete: '/bid/', // Id behind it
    },
    categoriesEndPoints: {
      get: '/categories', // All categories
      post: '/category',
      getspecific: '/category/', // Id behind it
      put: '/category',
      delete: '/category/', // Id behind it
    },
    auctionsEndPoints: {
      get: '/auctions', // Overview of all on-going auctions
      },
    authEndPoints: {
        login: '/login', // user authentication end point
        register: '/register' // user register end point
        },
  },
  Cycling: {
    url: 'http://127.0.0.1:8000',
  },

};
