import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

const View = { template: '<router-view></router-view>' }

const routes = [
  {
    path: '/',
    component: () => import('@pages/Layout/DashboardLayout.vue'),
    redirect: 'dashboard',
    children: [
      {
        path: 'dashboard',
        name: 'dashboard',
        component: () => import('@pages/Dashboard.vue'),
        meta: { title: 'global.dashboard' }
      },
      {
        path: 'tasks',
        name: 'tasks.index',
        component: () => import('@cruds/Tasks/Index.vue'),
        meta: { title: 'cruds.task.title' }
      },
      {
        path: 'tasks/create',
        name: 'tasks.create',
        component: () => import('@cruds/Tasks/Create.vue'),
        meta: { title: 'cruds.task.title' }
      },
      {
        path: 'tasks/:id',
        name: 'tasks.show',
        component: () => import('@cruds/Tasks/Show.vue'),
        meta: { title: 'cruds.task.title' }
      },
      {
        path: 'tasks/:id/edit',
        name: 'tasks.edit',
        component: () => import('@cruds/Tasks/Edit.vue'),
        meta: { title: 'cruds.task.title' }
      },
      {
        path: 'comments',
        name: 'comments.index',
        component: () => import('@cruds/Comments/Index.vue'),
        meta: { title: 'cruds.comment.title' }
      },
      {
        path: 'comments/create',
        name: 'comments.create',
        component: () => import('@cruds/Comments/Create.vue'),
        meta: { title: 'cruds.comment.title' }
      },
      {
        path: 'comments/:id',
        name: 'comments.show',
        component: () => import('@cruds/Comments/Show.vue'),
        meta: { title: 'cruds.comment.title' }
      },
      {
        path: 'comments/:id/edit',
        name: 'comments.edit',
        component: () => import('@cruds/Comments/Edit.vue'),
        meta: { title: 'cruds.comment.title' }
      },
      {
        path: 'data-management',
        name: 'data_management',
        component: View,
        redirect: { name: 'projects.index' },
        children: [
          {
            path: 'projects',
            name: 'projects.index',
            component: () => import('@cruds/Projects/Index.vue'),
            meta: { title: 'cruds.project.title' }
          },
          {
            path: 'projects/create',
            name: 'projects.create',
            component: () => import('@cruds/Projects/Create.vue'),
            meta: { title: 'cruds.project.title' }
          },
          {
            path: 'projects/:id',
            name: 'projects.show',
            component: () => import('@cruds/Projects/Show.vue'),
            meta: { title: 'cruds.project.title' }
          },
          {
            path: 'projects/:id/edit',
            name: 'projects.edit',
            component: () => import('@cruds/Projects/Edit.vue'),
            meta: { title: 'cruds.project.title' }
          },
          {
            path: 'clients',
            name: 'clients.index',
            component: () => import('@cruds/Clients/Index.vue'),
            meta: { title: 'cruds.client.title' }
          },
          {
            path: 'clients/create',
            name: 'clients.create',
            component: () => import('@cruds/Clients/Create.vue'),
            meta: { title: 'cruds.client.title' }
          },
          {
            path: 'clients/:id',
            name: 'clients.show',
            component: () => import('@cruds/Clients/Show.vue'),
            meta: { title: 'cruds.client.title' }
          },
          {
            path: 'clients/:id/edit',
            name: 'clients.edit',
            component: () => import('@cruds/Clients/Edit.vue'),
            meta: { title: 'cruds.client.title' }
          }
        ]
      },
      {
        path: 'setting',
        name: 'setting',
        component: View,
        redirect: { name: 'project_types.index' },
        children: [
          {
            path: 'project-types',
            name: 'project_types.index',
            component: () => import('@cruds/ProjectTypes/Index.vue'),
            meta: { title: 'cruds.projectType.title' }
          },
          {
            path: 'project-types/create',
            name: 'project_types.create',
            component: () => import('@cruds/ProjectTypes/Create.vue'),
            meta: { title: 'cruds.projectType.title' }
          },
          {
            path: 'project-types/:id',
            name: 'project_types.show',
            component: () => import('@cruds/ProjectTypes/Show.vue'),
            meta: { title: 'cruds.projectType.title' }
          },
          {
            path: 'project-types/:id/edit',
            name: 'project_types.edit',
            component: () => import('@cruds/ProjectTypes/Edit.vue'),
            meta: { title: 'cruds.projectType.title' }
          },
          {
            path: 'statuses',
            name: 'statuses.index',
            component: () => import('@cruds/Statuses/Index.vue'),
            meta: { title: 'cruds.status.title' }
          },
          {
            path: 'statuses/create',
            name: 'statuses.create',
            component: () => import('@cruds/Statuses/Create.vue'),
            meta: { title: 'cruds.status.title' }
          },
          {
            path: 'statuses/:id',
            name: 'statuses.show',
            component: () => import('@cruds/Statuses/Show.vue'),
            meta: { title: 'cruds.status.title' }
          },
          {
            path: 'statuses/:id/edit',
            name: 'statuses.edit',
            component: () => import('@cruds/Statuses/Edit.vue'),
            meta: { title: 'cruds.status.title' }
          }
        ]
      },
      {
        path: 'user-management',
        name: 'user_management',
        component: View,
        redirect: { name: 'permissions.index' },
        children: [
          {
            path: 'permissions',
            name: 'permissions.index',
            component: () => import('@cruds/Permissions/Index.vue'),
            meta: { title: 'cruds.permission.title' }
          },
          {
            path: 'permissions/create',
            name: 'permissions.create',
            component: () => import('@cruds/Permissions/Create.vue'),
            meta: { title: 'cruds.permission.title' }
          },
          {
            path: 'permissions/:id',
            name: 'permissions.show',
            component: () => import('@cruds/Permissions/Show.vue'),
            meta: { title: 'cruds.permission.title' }
          },
          {
            path: 'permissions/:id/edit',
            name: 'permissions.edit',
            component: () => import('@cruds/Permissions/Edit.vue'),
            meta: { title: 'cruds.permission.title' }
          },
          {
            path: 'roles',
            name: 'roles.index',
            component: () => import('@cruds/Roles/Index.vue'),
            meta: { title: 'cruds.role.title' }
          },
          {
            path: 'roles/create',
            name: 'roles.create',
            component: () => import('@cruds/Roles/Create.vue'),
            meta: { title: 'cruds.role.title' }
          },
          {
            path: 'roles/:id',
            name: 'roles.show',
            component: () => import('@cruds/Roles/Show.vue'),
            meta: { title: 'cruds.role.title' }
          },
          {
            path: 'roles/:id/edit',
            name: 'roles.edit',
            component: () => import('@cruds/Roles/Edit.vue'),
            meta: { title: 'cruds.role.title' }
          },
          {
            path: 'users',
            name: 'users.index',
            component: () => import('@cruds/Users/Index.vue'),
            meta: { title: 'cruds.user.title' }
          },
          {
            path: 'users/create',
            name: 'users.create',
            component: () => import('@cruds/Users/Create.vue'),
            meta: { title: 'cruds.user.title' }
          },
          {
            path: 'users/:id',
            name: 'users.show',
            component: () => import('@cruds/Users/Show.vue'),
            meta: { title: 'cruds.user.title' }
          },
          {
            path: 'users/:id/edit',
            name: 'users.edit',
            component: () => import('@cruds/Users/Edit.vue'),
            meta: { title: 'cruds.user.title' }
          }
        ]
      }
    ]
  }
]

export default new VueRouter({
  mode: 'history',
  base: '/admin',
  routes
})
