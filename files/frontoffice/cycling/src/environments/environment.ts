// The file contents for the current environment will overwrite these during build.
// The build system defaults to the dev environment which uses `environment.ts`, but if you do
// `ng build --env=prod` then `environment.prod.ts` will be used instead.
// The list of which env maps to which file can be found in `.angular-cli.json`.

export const environment = {
  production: false,

  CyclingAPI: {
    url: 'http://127.0.0.1:8000/api',
    endPoints: {
      get: '/users', // All users
      post: '/user',
      getspecific: '/user/', // Id behind it
      put: '/user',
      delete: '/user/', // Id behind it

    }
  }
};
